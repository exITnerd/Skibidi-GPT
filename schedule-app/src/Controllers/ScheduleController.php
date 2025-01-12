<?php
namespace Exitn\ScheduleApp\Controllers;

class ScheduleController {
    public function index() {
        // View and layout paths
        $viewPath = __DIR__ . '/../Views/schedule/one_tab_week.php';
        $layoutPath = __DIR__ . '/../Views/layouts/default_layout.php';

        // View caching
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // Layout loading
        require $layoutPath;
    }

    public function search() {
        echo "Searching the timetable...";
    }
}
