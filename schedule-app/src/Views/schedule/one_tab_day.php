<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Dzienny</title>
    <link rel="stylesheet" type="text/css" href="/styles/schedule-styles/one_tab_day_style.css">
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

<script>
    document.getElementById('search').addEventListener('click', function () {

        const indexNumber = document.getElementById('index-number').value.trim();
        if (!indexNumber) {
            alert('Wprowadź numer albumu.');
            return;
        }

        const currentDate = new Date();
        const startDate = currentDate.toISOString().split('T')[0];
        const endDate = new Date(currentDate.getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0];

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

                const calendarContainer = document.getElementById('calendar');
                calendarContainer.innerHTML = '';
                if (data.length === 0 || data[1].length === 0) {
                    calendarContainer.innerHTML = '<p>Brak zajęć w podanym okresie.</p>';
                    return;
                }

                data.forEach((item, index) => {
                    if (index === 0) return;

                    const lessonDiv = document.createElement('div');
                    lessonDiv.classList.add('lesson');
                    lessonDiv.innerHTML = `
                        <h3>${item.title}</h3>
                        <p>${item.description}</p>
                        <p><strong>Prowadzący:</strong> ${item.worker_title}</p>
                        <p><strong>Sala:</strong> ${item.room}</p>
                        <p><strong>Data i godzina:</strong> ${item.start} - ${item.end}</p>
                    `;
                    calendarContainer.appendChild(lessonDiv);
                });
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
                //alert('Nie udało się pobrać danych. Spróbuj ponownie później.');
            });
    });
</script>

</body>
</html>
