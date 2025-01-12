<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonogram Semestralny</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .semester-schedule {
            max-width: 1000px;
            margin: 20px auto;
            border: 1px solid #959FCD;
            border-radius: 10px;
            background-color: #f0f2f7;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .semester-schedule-header {
            background-color: #959FCD;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        .daily-header {
            background-color: #DCE0F9;
            font-weight: bold;
            padding: 10px;
            border-bottom: 1px solid rgba(149, 159, 205, 0.5);
            text-align: center;
        }
        .schedule-body {
            padding: 10px;
        }
        .schedule-row {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 10px;
            border-bottom: 1px solid rgba(149, 159, 205, 0.3);
        }
        .schedule-row:last-child {
            border-bottom: none;
        }
        .time-slot {
            color: #959FCD;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
        }

        .task-slot {
            flex: 1;
            text-align: left;
            margin-left: 5px;
            margin-right: 5px;
            color: #2D419C;
            font-size: 16px;
            max-width: 300px;
            font-weight: bold;
        }

        .tutor {
            flex: 1;
            text-align: left;
            margin-left: 5px;
            margin-right: 5px;
            color: #2D419C;
            font-size: 13px;
            max-width: 250px;
        }

        .type-lab, .type-wyk, .type-aud, .type-lek, .type-pro {
            flex: 1;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;
        }
        .type-lab { background-color: #B3E6C9; }
        .type-wyk { background-color: #A6D8FF; }
        .type-aud { background-color: #FFD1A6; }
        .type-lek { background-color: #FFF4B3; }
        .type-pro { background-color: #D6B3FF; }

        .group, .room {
            flex: 1;
            text-align: left;
            color: #2D419C;
            font-size: 12px;
            max-width: 90px;
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="semester-schedule">
    <div class="semester-schedule-header">Harmonogram Semestralny</div>

    <!-- Monday -->
    <div class="daily-header">Poniedziałek</div>
    <div class="schedule-body">
        <div class="schedule-row">
            <div class="time-slot">8:15</div>
            <div class="task-slot">Analiza danych</div>
            <div class="tutor">dr inż. Anna Kowalska</div>
            <div class="type-lab">laboratorium</div>
            <div class="room">WI1 102</div>
            <div class="group">334</div>
        </div>
        <div class="schedule-row">
            <div class="time-slot">12:15</div>
            <div class="task-slot">Metody numeryczne</div>
            <div class="tutor">prof. Jan Nowak</div>
            <div class="type-wyk">wykład</div>
            <div class="room">WI1 202</div>
            <div class="group">5 sem</div>
        </div>
    </div>

    <!-- Tuesday -->
    <div class="daily-header">Wtorek</div>
    <div class="schedule-body">
        <div class="schedule-row">
            <div class="time-slot">8:15</div>
            <div class="task-slot">Zarządzanie informacją 2</div>
            <div class="tutor">dr hab. inż. Przemysław Korytkowski</div>
            <div class="type-lab">laboratorium</div>
            <div class="room">WI1 309</div>
            <div class="group">335</div>
        </div>
        <div class="schedule-row">
            <div class="time-slot">10:15</div>
            <div class="task-slot">Sztuczna inteligencja</div>
            <div class="tutor">dr mgr inż. Andrii Shekhovtsov</div>
            <div class="type-pro">projekt</div>
            <div class="room">WI1 302</div>
            <div class="group">312</div>
        </div>
    </div>

    <!-- Add other days as needed -->

</div>
</body>
</html>
