<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonogram Semestralny</title>
    <link rel="stylesheet" type="text/css" href="/styles/schedule-styles/one_tab_semester_style.css">
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

<script>
    document.getElementById('search').addEventListener('click', function () {

        const indexNumber = document.getElementById('index-number').value.trim();
        if (!indexNumber) {
            alert('Wprowadź numer albumu.');
            return;
        }

        const startDate = "2024-10-01"
        const endDate = "2025-02-28"

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

                const semesterContainer = document.getElementById('semester-schedule');
                semesterContainer.innerHTML = '';
                if (data.length === 0 || data[1].length === 0) {
                    semesterContainer.innerHTML = '<p>Brak zajęć w podanym okresie.</p>';
                    return;
                }

                data.forEach((item) => {
                    const fullDateTime = new Date(item.start);
                    const formattedDate = fullDateTime.toLocaleDateString('pl-PL', { weekday: 'long', day: '2-digit', month: '2-digit', year: 'numeric' });
                    const formattedTime = fullDateTime.toLocaleTimeString('pl-PL', { hour: '2-digit', minute: '2-digit' });

                    const lessonDiv = document.createElement('div');
                    lessonDiv.classList.add('semester-schedule-row');

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
                        <div class="date-slot">${formattedDate}</div>
                        <div class="time-slot">${formattedTime}</div>
                        <div class="task-slot">${item.subject}</div>
                        <div class="tutor">${item.worker_title}</div>
                        <div class="${typeClass}">${item.lesson_status}</div>
                        <div class="room">${item.room}</div>
                        <div class="group">${item.group_name}</div>
                    `;
                    semesterContainer.appendChild(lessonDiv);
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
