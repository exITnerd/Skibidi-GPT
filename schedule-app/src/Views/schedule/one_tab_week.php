<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Tygodniowy</title>
</head>
<body>
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
        max-width: 1500px;
        margin-right: 40px;
        margin-left: -40px;
        background-color: #f0f2f7;
        border: 1px solid #ffffff;
        table-layout: fixed;
    }
    th, td {
        border: 5px solid #ffffff;
        padding: 10px;
        width: 100px;
        height: 70px;
    }
    th {
        background-color: #ffffff;
        font-weight: bold;
        color: #000000;
        text-align: left;
        text-transform: uppercase;
        font-size: 10px;
        padding-top: 10px;
        padding-bottom: 1px;
        padding-left: 1px;
        padding-right: 50px;
    }

    th .date {
        font-size: 10px; /* Rozmiar tekstu dla daty */
        text-transform: none; /* Wyłączenie drukowanych liter dla daty */
        color: #959FCD; /* Inny kolor dla daty */
    }

    .row-header {
        background-color: #ffffff;
        font-weight: bold;
        color: #959FCD;
        text-align: right;
        font-size: 10px;
        padding-top: 50px;
        padding-bottom: 1px;
        padding-left: 50px;
        padding-right: 1px;
    }
    .box {
        width: 300px;
        margin: 20px 40px 0 auto;
        padding: 15px;
        border: 1px solid #959FCD;
        border-radius: 10px;
        background-color: transparent;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        color: #959FCD;
    }
</style>
<table>
    <tr>
        <th></th>
        <th>
            poniedziałek
            <span class="date">01.01.2025</span>
        </th>
        <th>
            wtorek
            <span class="date">02.01.2025</span>
        </th>
        <th>
            środa
            <span class="date">03.01.2025</span>
        </th>
        <th>
            czwartek
            <span class="date">04.01.2025</span>
        </th>
        <th>
            piątek
            <span class="date">05.01.2025</span>
        </th>
        <th>
            sobota
            <span class="date">06.01.2025</span>
        </th>
        <th>
            niedziela
            <span class="date">07.01.2025</span>
        </th>
    </tr>
    <tr>
        <td class="row-header">8:15</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-header">10:15</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-header">12:15</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-header">14:15</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-header">16:15</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-header">18:15</td>
        <td></td>
        <td></td>
        <td></td>
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
