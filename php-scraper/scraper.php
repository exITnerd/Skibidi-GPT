<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');


mb_internal_encoding("UTF-8");
ini_set('default_charset', 'UTF-8');

if ($argc < 3) {
    die("Usage: php scraper.php <start_letter> <end_letter>\n");
}

$start_letter = $argv[1];
$end_letter = $argv[2];

echo "Start letter: $start_letter\n";
echo "End letter: $end_letter\n";

if (!$start_letter || !$end_letter) {
    die("You need to pass a range of letters! Usage: php scraper.php A C\n");
}

echo "Downloading teachers from $start_letter to $end_letter\n";

function fetch_teachers($letter) {
    $url = "https://plan.zut.edu.pl/schedule.php";
    $params = ["kind" => "teacher", "query" => $letter];
    $response = http_request($url, $params);
    if ($response !== false) {
        $data = json_decode($response, true);
        if (is_array($data)) {
            return array_map(function($teacher) {
                return $teacher['item'] ?? null;
            }, $data);
        } else {
            error_log("Invalid response for letter $letter");
            return [];
        }
    } else {
        error_log("Error fetching teachers for letter $letter");
        return [];
    }
}

function fetch_schedule($teacher_name, $start_date, $end_date) {
    $url = "https://plan.zut.edu.pl/schedule_student.php";
    $params = [
        "teacher" => $teacher_name,
        "start" => $start_date,
        "end" => $end_date
    ];
    $response = http_request($url, $params);
    if ($response === false) {
        echo "No answer for the teacher: $teacher_name\n";
        return [];
    }

    $data = json_decode($response, true);
    if (empty($data)) {
        echo "No data in the teacher's plan: $teacher_name\n";
        return [];
    }

    $filtered_schedule = array_filter($data, function($lesson) {
        return !empty($lesson["subject"]) && !empty($lesson["room"]);
    });

    return array_map(function($lesson) {
        return [
            "subject" => $lesson["subject"] ?? "",
            "room" => $lesson["room"] ?? "",
            "start" => $lesson["start"] ?? "",
            "end" => $lesson["end"] ?? "",
            "group_name" => $lesson["group_name"] ?? "",
            "lesson_form" => $lesson["lesson_form"] ?? "",
            "teacher" => $lesson["worker_title"] ?? "",
            "lesson_status" => $lesson["lesson_status"] ?? "",
            "lesson_status_short" => $lesson["lesson_status_short"] ?? "",
            "status_item" => $lesson["status_item"] ?? ""
        ];
    }, $filtered_schedule);
}


function http_request($url, $params) {
    $query_string = http_build_query($params);
    $ch = curl_init($url . '?' . $query_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log("cURL error: " . curl_error($ch));
        curl_close($ch);
        return false;
    }

    curl_close($ch);
    return $response;
}

function http_multi_request($urls) {
    $multi_curl = curl_multi_init();
    $curl_handles = [];

    foreach ($urls as $key => $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $curl_handles[$key] = $ch;
        curl_multi_add_handle($multi_curl, $ch);
    }

    $running = null;
    do {
        curl_multi_exec($multi_curl, $running);
    } while ($running);

    $responses = [];
    foreach ($curl_handles as $key => $ch) {
        $responses[$key] = curl_multi_getcontent($ch);
        curl_multi_remove_handle($multi_curl, $ch);
    }

    curl_multi_close($multi_curl);
    return $responses;
}

function scrape_data($start_letter, $end_letter) {
    $start_date = "2024-10-01";
    $end_date = "2025-01-31";
    $current_date = $start_date;

    $polish_letters = [
        'A', 'B', 'C', 'Ć', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 
        'Ł', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 
        'X', 'Y', 'Z', 'Ź', 'Ż'
    ];
    
    //$letters = range(mb_strtoupper($start_letter, 'UTF-8'), mb_strtoupper($end_letter, 'UTF-8'));
    //$letters = range($start_letter, $end_letter);
    //print_r($letters);

    $start_index = array_search(mb_strtoupper($start_letter, 'UTF-8'), $polish_letters);
        $end_index = array_search(mb_strtoupper($end_letter, 'UTF-8'), $polish_letters);

    if ($start_index === false || $end_index === false) {
        die("Incorrect letters! Check the range of letters.\n");
    }

    $letters = array_slice($polish_letters, $start_index, $end_index - $start_index + 1);

    print_r($letters);


    if (empty($letters)) {
        die("Incorrect letter range: $start_letter-$end_letter\n");
    }

    foreach ($letters as $letter) {
        echo "Processing letter: $letter\n";
        while (strtotime($current_date) <= strtotime($end_date)) {
            $month_start = date("Y-m-01", strtotime($current_date));
            $month_end = date("Y-m-t", strtotime($month_start));

            if (strtotime($month_end) > strtotime($end_date)) {
                $month_end = $end_date;
            }

            echo "Scraping data for letter $letter from $month_start to $month_end\n";

            $teachers = fetch_teachers($letter);
            $month_data = [];
			
            foreach ($teachers as $teacher_name) {
                $schedule = fetch_schedule($teacher_name, $month_start, $month_end);
            
                if (empty($schedule) || !array_filter($schedule, function($lesson) {
                    return !empty($lesson['subject']) || !empty($lesson['room']) || !empty($lesson['start']);
                })) {
                    echo "Skipping teacher: $teacher_name (no data)\n";
                    continue;
                }
            
                $month_data[] = ["teacher" => $teacher_name, "schedule" => $schedule];
            }
            



            usort($month_data, function ($a, $b) {
                return strcasecmp($a["teacher"], $b["teacher"]);
            });

            if (!empty($month_data)) {
                $month_filename = __DIR__ . "/sch_teacher_" . date("Y-m", strtotime($month_start)) . "_$letter.json";
                save_to_file($month_data, $month_filename);
            } else {
                echo "No data to save for letter $letter, file not created.\n";
            }

            //$month_filename = __DIR__ . "/sch_teacher_" . date("Y-m", strtotime($month_start)) . "_$letter.json";
            //save_to_file($month_data, $month_filename);

            $current_date = date("Y-m-d", strtotime("$month_end +1 day"));
        }


        $current_date = $start_date;
    }

    echo "The entire letter range from $start_letter to $end_letter has been processed. Operation successfully completed!\n";
}

function save_to_file($data, $filename = "schedule.json") {
    file_put_contents($filename, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    echo "Data saved to file $filename\n";
}

scrape_data($start_letter, $end_letter);

?>
