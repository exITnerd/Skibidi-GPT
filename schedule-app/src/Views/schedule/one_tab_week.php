<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Tygodniowy</title>
    <link rel="stylesheet" type="text/css" href="/styles/schedule-styles/one_tab_week_style.css">
</head>
<body>
<table>
    <tr>
        <th></th>
        <th>
            poniedziałek
            <span class="date"></span>
        </th>
        <th>
            wtorek
            <span class="date"></span>
        </th>
        <th>
            środa
            <span class="date"></span>
        </th>
        <th>
            czwartek
            <span class="date"></span>
        </th>
        <th>
            piątek
            <span class="date"></span>
        </th>
        <th>
            sobota
            <span class="date"></span>
        </th>
        <th>
            niedziela
            <span class="date"></span>
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
    <tr>
        <td class="row-header">20:15</td>
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

<script>
    const dateButton = document.getElementById('date-button');
    const calendarTable = document.querySelector('table');
    const leftArrow = document.getElementById('left_arrow');
    const rightArrow = document.getElementById('right_arrow');
    const searchButton = document.getElementById('search');
    const indexInput = document.getElementById('index-number');

    function setWeekDates(baseDate) {
        const base = new Date(baseDate);
        const dayOfWeek = base.getDay();
        const mondayOffset = dayOfWeek === 0 ? -6 : 1 - dayOfWeek;

        const weekDates = [];
        for (let i = 0; i < 7; i++) {
            const date = new Date(base);
            date.setDate(base.getDate() + mondayOffset + i);
            weekDates.push(date);
        }

        const headers = calendarTable.querySelectorAll('th .date');
        headers.forEach((header, index) => {
            if (weekDates[index]) {
                header.textContent = weekDates[index].toLocaleDateString('pl-PL');
            }
        });

        return { start: weekDates[0].toISOString().split('T')[0], end: weekDates[6].toISOString().split('T')[0] };
    }

    function fetchSchedule(indexNumber, startDate, endDate) {
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

                const rows = calendarTable.querySelectorAll('tr');
                rows.forEach(row => {
                    const cells = row.querySelectorAll('td:not(.row-header)');
                    cells.forEach(cell => (cell.innerHTML = ''));
                });

                if (data.length === 0 || data[1].length === 0) {
                    alert('Brak zajęć w wybranym tygodniu.');
                    return;
                }

                data.forEach(item => {
                    const lessonDate = new Date(item.start);
                    const dayIndex = lessonDate.getDay() === 0 ? 6 : lessonDate.getDay() - 1;
                    const time = lessonDate.toLocaleTimeString('pl-PL', { hour: '2-digit', minute: '2-digit' });

                    const rowIndex = lessonDate.getHours() - 8 + (lessonDate.getMinutes() >= 15 ? 1 : 0);
                    const cells = rows[rowIndex]?.querySelectorAll('td');
                    const targetCell = cells ? cells[dayIndex + 1] : null;

                    if (targetCell) {
                        const lessonDiv = document.createElement('div');
                        lessonDiv.classList.add('daily-schedule-row');

                        let typeClass = '';
                        switch (item.lesson_status.toLowerCase()) {
                            case 'laboratorium':
                                typeClass = 'type lab';
                                break;
                            case 'wykład':
                                typeClass = 'type wyk';
                                break;
                            case 'audytoryjne':
                                typeClass = 'type aud';
                                break;
                            case 'lektorat':
                                typeClass = 'type lek';
                                break;
                            case 'projekt':
                                typeClass = 'type pro';
                                break;
                            default:
                                typeClass = 'type other';
                        }

                        lessonDiv.innerHTML = `
                            <div class="subject">${item.subject}</div>
                            <div class="tutor">${item.worker_title}</div>
                            <div class="${typeClass}">${item.lesson_status}</div>
                        `;
                        targetCell.appendChild(lessonDiv);
                    }
                });
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
                //alert('Nie udało się pobrać danych. Spróbuj ponownie później.');
            });
    }

    let currentBaseDate = new Date();
    dateButton.textContent = currentBaseDate.toLocaleDateString('pl-PL');

    let { start, end } = setWeekDates(currentBaseDate);

    leftArrow.addEventListener('click', function () {
        currentBaseDate.setDate(currentBaseDate.getDate() - 7);
        dateButton.textContent = currentBaseDate.toLocaleDateString('pl-PL');
        const dates = setWeekDates(currentBaseDate);
        start = dates.start;
        end = dates.end;
        fetchScheduleFromInput(start, end);
    });

    rightArrow.addEventListener('click', function () {
        currentBaseDate.setDate(currentBaseDate.getDate() + 7);
        dateButton.textContent = currentBaseDate.toLocaleDateString('pl-PL');
        const dates = setWeekDates(currentBaseDate);
        start = dates.start;
        end = dates.end;
        fetchScheduleFromInput(start, end);
    });

    searchButton.addEventListener('click', function () {
        const indexNumber = indexInput.value.trim();
        if (indexNumber === "") {
            alert("Proszę wprowadzić numer albumu.");
            return;
        }
        fetchScheduleFromInput(start, end, indexNumber);
    });

    function fetchScheduleFromInput(start, end, indexNumber) {
        if (!indexNumber) {
            indexNumber = indexInput.value.trim();
        }
        fetchSchedule(indexNumber, start, end);
    }

    const indexNumber = indexInput.value.trim();
    if (indexNumber) fetchSchedule(indexNumber, start, end);
</script>



</body>
</html>
