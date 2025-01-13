<?php
namespace Exitn\ScheduleApp\Controllers;

class ScheduleController {
    public function index() {
        $viewType = $_GET['view'] ?? 'day';

        // View and layout paths
        $viewPath = match ($viewType) {
            'week' => __DIR__ . '/../Views/schedule/one_tab_week.php',
            'month' => __DIR__ . '/../Views/schedule/one_tab_month.php',
            'semester' => __DIR__ . '/../Views/schedule/one_tab_semester.php',
            default => __DIR__ . '/../Views/schedule/one_tab_day.php',
        };

        $layoutPath = __DIR__ . '/../Views/layouts/default_layout.php';

        // View caching
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // Layout loading
        require $layoutPath;
    }
}
