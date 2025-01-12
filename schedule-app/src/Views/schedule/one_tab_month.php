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
            border: 1px solid #ffffff;
            table-layout: fixed;
        }
        th, td {
            border: 5px solid #ffffff;
            padding: 10px;
            width: 14.28%; /* 7 dni tygodnia */
            height: 100px;
            text-align: center;
        }
        th {
            background-color: #ffffff;
            font-weight: bold;
            color: #000000;
            text-transform: uppercase;
            font-size: 12px;
        }
        td {
            background-color: #ffffff;
            color: #959FCD;
            font-size: 14px;
            vertical-align: top;
            padding: 5px;
        }
        .header-row th {
            font-size: 16px;
            color: #959FCD;
            text-transform: capitalize;
        }
        .day {
            font-weight: bold;
            color: #000000;
        }
        .box {
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #959FCD;
            border-radius: 10px;
            background-color: transparent;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        <td><span class="day">1</span></td>
        <td><span class="day">2</span></td>
        <td><span class="day">3</span></td>
        <td><span class="day">4</span></td>
        <td><span class="day">5</span></td>
        <td><span class="day">6</span></td>
        <td><span class="day">7</span></td>
    </tr>
    <tr>
        <td><span class="day">8</span></td>
        <td><span class="day">9</span></td>
        <td><span class="day">10</span></td>
        <td><span class="day">11</span></td>
        <td><span class="day">12</span></td>
        <td><span class="day">13</span></td>
        <td><span class="day">14</span></td>
    </tr>
    <tr>
        <td><span class="day">15</span></td>
        <td><span class="day">16</span></td>
        <td><span class="day">17</span></td>
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
        <td><span class="day">26</span></td>
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
