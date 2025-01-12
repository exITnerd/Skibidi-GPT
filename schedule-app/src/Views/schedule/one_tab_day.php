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
            max-width: 1000px;
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
            justify-content: flex-start;
            padding: 10px;
            border-bottom: 1px solid rgba(149, 159, 205, 0.3);
        }
        .daily-schedule-row:last-child {
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
        min-width: 50px;}

        .task-slot {
            flex: 1;
            text-align: left;
            margin-left: 5px;
            margin-right: 5px;
            color: #2D419C;
            font-size: 16px;
            max-width: 300px;
            border: 0px solid #2D419C;
            font-weight: bold;


        }

        .tutor {
            flex: 1;
            text-align: left;
            margin-left: 5px;
            margin-right: 5px;
            color: #2D419C;
            font-size: 13px;
            border: 0px solid #2D419C;
            padding: 5px 10px;
            max-width: 250px;

        }

        .type-lab {
            flex: 1;
            text-align: center;
            font-size: 12px;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            padding: 5px 10px;
            background-color: #B3E6C9;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;
        }
        .type-wyk {
            flex: 1;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            background-color: #A6D8FF;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;}

        .type-aud {
            flex: 1;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            background-color: #FFD1A6;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;}

        .type-lek {
            flex: 1;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            background-color: #FFF4B3;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;}

        .type-pro {
            flex: 1;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            background-color: #D6B3FF;
            color: #2D419C;
            border: 1px solid #2D419C;
            border-radius: 7px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;}

        .group {
            flex: 1;
            text-align: left;
            margin-left: 20px;
            white-space: nowrap;
            color: #2D419C;
            font-size: 12px;
            justify-content: right;
            border: 0px solid #2D419C;
            padding: 5px 10px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 70px;
        }

        .room {
            flex: 1;
            text-align: left;
            margin-left: 20px;
            white-space: nowrap;
            color: #2D419C;
            font-size: 12px;
            justify-content: right;
            border: 0px solid #2D419C;
            padding: 5px 10px;
            margin-left: 5px;
            margin-right: 5px;
            max-width: 90px;
        }
    </style>
</head>
<body>
<div class="daily-schedule">
    <div class="daily-schedule-header">
        Wtorek, 07.01.2025
    </div>
    <div class="daily-schedule-body">
        <div class="daily-schedule-row">
            <div class="time-slot">8:15</div>
            <div class="task-slot">Zarządzanie informacją 2</div>
            <div class="tutor">dr hab. inż. Przemysław Korytkowski</div>
            <div class="type-lab">laboratorium</div>
            <div class="room">WI1 309</div>
            <div class="group">335</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">10:15</div>
            <div class="task-slot">Sztuczna inteligencja</div>
            <div class="tutor">dr mgr inż. Andrii Shekhovtsov</div>
            <div class="type-pro">projekt</div>
            <div class="room">WI1 302</div>
            <div class="group">312</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">12:15</div>
            <div class="task-slot">Sieci komputerowe</div>
            <div class="tutor">dr inż. Grzegorz Śliwiński</div>
            <div class="type-lek">lektorat</div>
            <div class="room">WI1 308</div>
            <div class="group">335</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">14:15</div>
            <div class="task-slot"></div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">16:15</div>
            <div class="task-slot">Sieci komputerowe</div>
            <div class="tutor">dr inż. Grzegorz Śliwiński</div>
            <div class="type-wyk">wykład</div>
            <div class="room">WI1 215</div>
            <div class="group">5 sem</div>
        </div>
        <div class="daily-schedule-row">
            <div class="time-slot">18:15</div>
            <div class="task-slot"></div>
        </div>
    </div>
</div>
</body>
</html>
