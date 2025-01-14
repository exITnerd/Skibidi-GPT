<?php
require_once __DIR__ . '/../src/Core/RouteManager.php';
require_once __DIR__ . '/../src/Controllers/ScheduleController.php';

use Exitn\ScheduleApp\Core\RouteManager;
use Exitn\ScheduleApp\Controllers\ScheduleController;

$routeManager = new RouteManager();
$routeManager->addRoute('/', ScheduleController::class, 'index');

try {
    $routeManager->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    http_response_code(500);
    echo 'Error: ' . $e->getMessage();
}
