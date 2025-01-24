<?php

require_once __DIR__ . '/DataImportService.php';

use Exitn\ScheduleApp\Services\DataImportService;

//$db = new PDO('sqlite:' . __DIR__ . '/../database/schedule_db_sqlite.db');

$db = new PDO('sqlite:C:/Users/OMEN/Documents/GitHub/Skibidi-GPT/schedule-app/database/schedule_db_sqlite.db');

$jsonDirectory = __DIR__ . '/scrapped_data';

$importService = new DataImportService($db, $jsonDirectory);

$importService->importJsonFiles();

echo "Data import completed successfully.";
