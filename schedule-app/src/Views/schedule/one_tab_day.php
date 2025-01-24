<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Dzienny</title>
    <link rel="stylesheet" type="text/css" href="/styles/schedule-styles/one_tab_day_style.css">
</head>
<body>
<div class="daily-schedule" >
    <div class="daily-schedule-header">
    </div>
    <div class="daily-schedule-body" id="daily-schedule-body">
    </div>
</div>

<script>
/*
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

                const calendarContainer = document.getElementById('daily-schedule-body');
                calendarContainer.innerHTML = '';
                if (data.length === 0 || data[1].length === 0) {
                    calendarContainer.innerHTML = '<p>Brak zajęć w podanym okresie.</p>';
                    return;
                }

                data.forEach((item, index) => {
                    if (index === 0) return;

                    const fullDateTime = new Date(item.start);
                    const formattedTime = fullDateTime.toLocaleTimeString('pl-PL', { hour: '2-digit', minute: '2-digit' });

                    const lessonDiv = document.createElement('div');
                    lessonDiv.classList.add('daily-schedule-row');

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
                        <div class="time-slot">${formattedTime}</div>
                        <div class="task-slot">${item.subject}</div>
                        <div class="tutor">${item.worker_title}</div>
                        <div class="${typeClass}">${item.lesson_status}</div>
                        <div class="room">${item.room}</div>
                        <div class="group">${item.group_name}</div>
                    `;
                    calendarContainer.appendChild(lessonDiv);
                });
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
                alert('Nie udało się pobrać danych. Spróbuj ponownie później.');
            });
    });

 */
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const headerDiv = document.querySelector('.daily-schedule-header');
        const currentDate = new Date();

        const formattedDate = currentDate.toLocaleDateString('pl-PL', {
            weekday: 'long',
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });

        headerDiv.textContent = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
    });
</script>

<script>
    document.getElementById('search').addEventListener('click', function () {
        const fullName = document.getElementById('lecturer-name').value.trim();
        const indexNumber = document.getElementById('index-number').value.trim();
        const calendarContainer = document.getElementById('daily-schedule-body');

        calendarContainer.innerHTML = '';

        if (indexNumber && fullName) {
            alert('Wprowadź albo dane studenta, albo dane wykładowcy – nie oba naraz.');
            return;
        }



        if (indexNumber) {
            const currentDate = new Date();
            const startDate = currentDate.toISOString().split('T')[0];
            const endDate = new Date(currentDate.getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0];

            const url = `http://localhost:8000/schedule-proxy.php?number=${indexNumber}&start=${startDate}&end=${endDate}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error('Błąd podczas pobierania danych.');
                    return response.json();
                })
                .then(data => renderSchedule(data, calendarContainer))
                .catch(error => {
                    console.error('Wystąpił błąd:', error);
                    alert('Nie udało się pobrać danych dla studenta.');
                });

        } else if (fullName) {
            const nameParts = fullName.split(' ');
            if (nameParts.length < 2) {
                alert('Wprowadź zarówno imię, jak i nazwisko.');
                return;
            }

            const firstName = nameParts[0];
            const lastName = nameParts.slice(1).join(' ');

            const currentDate = new Date();
            const startDate = currentDate.toISOString().split('T')[0];
            const endDate = new Date(currentDate.getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0];

            const url = `http://localhost:8000/lecturer-schedule.php?first_name=${encodeURIComponent(firstName)}&last_name=${encodeURIComponent(lastName)}&start=${encodeURIComponent(startDate)}&end=${encodeURIComponent(endDate)}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error('Błąd podczas pobierania danych.');
                    return response.json();
                })
                .then(data => renderSchedule(data, calendarContainer))
                .catch(error => {
                    console.error('Wystąpił błąd:', error);
                    alert('Nie udało się pobrać danych dla wykładowcy.');
                });

        } else {
            alert('Wprowadź dane: numer albumu studenta albo imię i nazwisko wykładowcy.');
        }
    });

    function renderSchedule(data, container) {
        if (!data || data.length === 0) {
            container.innerHTML = '<p>Brak zajęć w podanym okresie.</p>';
            return;
        }
        const indexNumber = document.getElementById('index-number').value.trim();

        data.forEach((item, index) => {
            const lessonDiv = document.createElement('div');
            lessonDiv.classList.add('daily-schedule-row');

            const fullDateTime = new Date(item.start || item._start);
            const formattedTime = fullDateTime.toLocaleTimeString('pl-PL', { hour: '2-digit', minute: '2-digit' });
            if(indexNumber) {
                if (index === 0) return;
            }
            lessonDiv.innerHTML = `
            <div class="time-slot">${formattedTime}</div>
            <div class="task-slot">${item.subject}</div>
            <div class="tutor">${item.worker_title || ''}</div>
            <div class="room">${item.room}</div>
            <div class="group">${item.group_name}</div>
        `;
            container.appendChild(lessonDiv);
        });
    }


</script>
</body>
</html>
