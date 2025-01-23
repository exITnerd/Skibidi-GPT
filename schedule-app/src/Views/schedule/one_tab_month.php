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
            max-width: 1350px;
            margin-left: 100px;
            background-color: #f0f2f7;
            border: 1px solid #ffffff;
            table-layout: fixed;
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
            margin: 20px 35px 0 auto;
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
        <th>Aktualny miesiąc #TODO</th>
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

<script>
    document.getElementById('search').addEventListener('click', function () {

        const indexNumber = document.getElementById('index-number').value.trim();
        if (!indexNumber) {
            alert('Wprowadź numer albumu.');
            return;
        }

        const currentDate = new Date();
        const startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).toISOString().split('T')[0]; // Pierwszy dzień miesiąca
        const endDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).toISOString().split('T')[0]; // Ostatni dzień miesiąca

        const url = `http://localhost:8000/schedule-proxy.php?number=${indexNumber}&start=${startDate}&end=${endDate}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Błąd podczas pobierania danych.');
                }
                return response.json();
            })
            .then(data => {
                console.log('Pobrane dane:', data);

                const calendarContainer = document.getElementById('monthly-schedule-body');
                calendarContainer.innerHTML = '';
                if (data.length === 0 || data[1].length === 0) {
                    calendarContainer.innerHTML = '<p>Brak zajęć w podanym okresie.</p>';
                    return;
                }

                // Tworzymy tablicę dni w miesiącu
                const monthSchedule = Array(31).fill(null).map(() => []); // 31 dni w miesiącu

                // Przypisujemy zajęcia do odpowiednich dni
                data.forEach((item) => {
                    const fullDateTime = new Date(item.start);
                    const day = fullDateTime.getDate() - 1; // Numer dnia (1-31), więc odejmujemy 1

                    const lessonDiv = document.createElement('div');
                    lessonDiv.classList.add('event');

                    let typeClass = '';
                    switch (item.lesson_status.toLowerCase()) {
                        case 'laboratorium':
                            typeClass = 'type-lab';
                            break;
                        case 'wykład':
                            typeClass = 'type-wyk';
                            break;
                        case 'audytoryjne':
                            typeClass = 'type-aud';
                            break;
                        case 'lektorat':
                            typeClass = 'type-lek';
                            break;
                        case 'projekt':
                            typeClass = 'type-pro';
                            break;
                        default:
                            typeClass = 'type-other';
                    }

                    lessonDiv.innerHTML = `
                    <div class="time-slot">${fullDateTime.toLocaleTimeString('pl-PL', { hour: '2-digit', minute: '2-digit' })}</div>
                    <div class="task-slot">${item.subject}</div>
                    <div class="tutor">${item.worker_title}</div>
                    <div class="${typeClass}">${item.lesson_status}</div>
                    <div class="room">${item.room}</div>
                    <div class="group">${item.group_name}</div>
                `;

                    monthSchedule[day].push(lessonDiv);
                });

                // Wyświetlamy zajęcia w tabeli
                const tableRows = document.querySelectorAll('.monthly-schedule-row');
                tableRows.forEach((row, rowIndex) => {
                    const dayIndex = rowIndex * 7; // Indeks dni w miesiącu
                    row.querySelectorAll('td').forEach((cell, cellIndex) => {
                        const day = dayIndex + cellIndex;
                        if (monthSchedule[day]) {
                            monthSchedule[day].forEach(lesson => {
                                cell.appendChild(lesson);
                            });
                        }
                    });
                });
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
                alert('Nie udało się pobrać danych. Spróbuj ponownie później.');
            });
    });

</script>

</body>
</html>
