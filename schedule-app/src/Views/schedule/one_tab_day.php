<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Dzienny</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .daily-schedule {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #959FCD;
            border-radius: 10px;
            background-color: #f0f2f7;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .daily-schedule-header {
            background-color: #959FCD;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .daily-schedule-body {
            padding: 10px;
        }
        .daily-schedule-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        .daily-schedule-row:last-child {
            border-bottom: none;
        }
        .time-slot {
            color: #959FCD;
            font-size: 14px;
            font-weight: bold;
        }
        .task-slot {
            flex: 1;
            text-align: left;
            margin-left: 10px;
            color: #000;
        }
    </style>
</head>
<body>
<div class="daily-schedule">
    <div class="daily-schedule-header">
        Czwartek, 04.01.2025
    </div>
    <div class="daily-schedule-body">
        <div class="daily-schedule-row">
            <div class="time-slot">8:15</div>
            <div class="task-slot">Matematyka</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">10:15</div>
            <div class="task-slot">Fizyka</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">12:15</div>
            <div class="task-slot">Język Angielski</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">14:15</div>
            <div class="task-slot">Chemia</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">16:15</div>
            <div class="task-slot">Historia</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">18:15</div>
            <div class="task-slot">Programowanie</div>
        </div>
    </div>
</div>
</body>
</html>
