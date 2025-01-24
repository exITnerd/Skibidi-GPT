<?php
header('Content-Type: application/json');

$dbPath = 'C:/Users/OMEN/Documents/GitHub/Skibidi-GPT/schedule-app/database/schedule_db_sqlite.db';

try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $firstName = $_GET['first_name'] ?? '';
    $lastName = $_GET['last_name'] ?? '';

    $start = $_GET['start'] ?? '';
    //$end = $_GET['end'] ?? '';

    if (empty($firstName) || empty($lastName)) {
        echo json_encode(['error' => 'Imię i nazwisko wykładowcy są wymagane.']);
        exit;
    }

    $query = "
        SELECT
            l.lesson_id,
            t.first_name,
            t.last_name,
            t.title AS worker_title,
            s.subject_name AS subject,
            s.lesson_form AS lesson_status,
            r.room_name AS room,
            g.group_name AS group_name,
            l.start_time AS _start,
            l.end_time AS _end
        FROM
            lessons l
            JOIN teachers t ON l.teacher_id = t.teacher_id
            JOIN subjects s ON l.subject_id = s.subject_id
            JOIN rooms r ON l.room_id = r.room_id
            JOIN `groups` g ON l.group_id = g.group_id
        WHERE
            t.first_name = :first_name AND t.last_name = :last_name AND DATE(_start) = DATE(:start);
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':start' => $start,
        //':end' => $end,
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Błąd połączenia z bazą danych: ' . $e->getMessage()]);
}
?>
