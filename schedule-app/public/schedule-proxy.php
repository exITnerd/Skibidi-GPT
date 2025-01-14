<?php
if (isset($_GET['number']) && isset($_GET['start']) && isset($_GET['end'])) {
    $number = $_GET['number'];
    $start = $_GET['start'];
    $end = $_GET['end'];

    $url = "https://plan.zut.edu.pl/schedule_student.php?number=$number&start=$start&end=$end";

    $response = file_get_contents($url);

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    echo $response;
}