<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Miesięczny</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #f0f2f7;
        }
        th, td {
            border: 5px solid #ffffff;
            padding: 10px;
            width: 14%;
            height: 150px;
            vertical-align: top;
            position: relative;
        }
        th {
            background-color: #ffffff;
            color: #959FCD;
            text-transform: uppercase;
            vertical-align: bottom;
            height: 20px;
            text-align: left;
            font-size: 14px;
            padding-top: 10px;
            padding-bottom: 1px;
            padding-left: 1px;
            padding-right: 50px;
            font-weight: normal;

        }
        .day {
            font-weight: bold;
            font-size: 14px;
            position: absolute;
            top: 5px;
            left: 5px;
        }
        .event {
            margin-top: 20px;
            font-size: 12px;
            padding: 5px;
            border-radius: 5px;
        }
        .type-lab {
            background-color: #B3E6C9;
            color: #2D419C;
        }
        .type-pro {
            background-color: #D6B3FF;
            color: #2D419C;
        }
        .type-lek {
            background-color: #FFF4B3;
            color: #2D419C;
        }
        .type-wyk {
            background-color: #A6D8FF;
            color: #2D419C;
        }
        .box {
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #959FCD;
            border-radius: 10px;
            background-color: transparent;
            text-align: center;
            color: #959FCD;
        }
    </style>
</head>
<body>
<table>
    <tr class="header-row">
        <th>Poniedziałek</th>
        <th>Wtorek</th>
        <th>Środa</th>
        <th>Czwartek</th>
        <th>Piątek</th>
        <th>Sobota</th>
        <th>Niedziela</th>
    </tr>
    <tr>
        <td><span class="day">1</span>
            <div class="event type-wyk">18:15 WYKŁAD ZI2</div>
        </td>
        <td><span class="day">2</span>
            <div class="event type-lab">08:30 LABY ZI 2</div>
            <div class="event type-lab">10:15 LABY SI</div>
            <div class="event type-lab">12:15 LABY SK</div>
        </td>
        <td><span class="day">3</span>
            <div class="event type-lab">10:15 LABY POI</div>
            <div class="event type-wyk">14:15 WYKŁAD POI</div>
            <div class="event type-lek">16:15 LEKTORAT ANG</div>
            <div class="event type-wyk">18:15 WYKŁAD SI</div>
        </td>
        <td><span class="day">4</span>
            <div class="event type-lab">08:15 LABY GRY KOMPUTEROWE</div>
            <div class="event type-wyk">14:15 WYKŁAD POI</div>
            <div class="event type-wyk">16:15 WYKŁAD GRY KOMPUTEROWE</div>
            <div class="event type-wyk">18:15 WYKŁAD ZI2</div>
        </td>
        <td><span class="day">5</span>
            <div class="event type-lab">14:15 LABY APLIKACJE INTERNETOWE</div>
        </td>
        <td><span class="day">6</span></td>
        <td><span class="day">7</span></td>
    </tr>
    <tr>
        <td><span class="day">8</span></td>
        <td><span class="day">9</span>
            <div class="event type-wyk">16:15 WYKŁAD GRY KOMPUTEROWE</div>
            <div class="event type-wyk">18:15 WYKŁAD ZI2</div>
        </td>
        <td><span class="day">10</span></td>
        <td><span class="day">11</span></td>
        <td><span class="day">12</span>
            <div class="event type-lab">14:15 LABY POI</div>
            <div class="event type-wyk">16:15 WYKŁAD ZI2</div>
            <div class="event type-lab">18:15 LABY ZI2</div>
        </td>
        <td><span class="day">13</span></td>
        <td><span class="day">14</span></td>
    </tr>
    <tr>
        <td><span class="day">15</span></td>
        <td><span class="day">16</span></td>
        <td><span class="day">17</span>
            <div class="event type-lab">08:15 LABY GRY KOMPUTEROWE</div>
        </td>
        <td><span class="day">18</span></td>
        <td><span class="day">19</span></td>
        <td><span class="day">20</span></td>
        <td><span class="day">21</span></td>
    </tr>
    <tr>
        <td><span class="day">22</span></td>
        <td><span class="day">23</span></td>
        <td><span class="day">24</span></td>
        <td><span class="day">25</span></td>
        <td><span class="day">26</span>
            <div class="event type-pro">08:15 PROJEKT IPZ</div>
        </td>
        <td><span class="day">27</span></td>
        <td><span class="day">28</span></td>
    </tr>
    <tr>
        <td><span class="day">29</span></td>
        <td><span class="day">30</span></td>
        <td><span class="day">31</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<div class="box">
    Tu będą statystyki
</div>
</body>
</html>
