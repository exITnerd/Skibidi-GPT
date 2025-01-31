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

<!-- Day & date header load -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateButton = document.getElementById('date-button');
        const headerDiv = document.querySelector('.daily-schedule-header');

        function updateHeaderFromButton() {
            const buttonDate = dateButton.textContent.trim();
            if (buttonDate) {
                const formattedDate = new Date(buttonDate).toLocaleDateString('pl-PL', {
                    weekday: 'long',
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                });
                headerDiv.textContent = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
            }
        }

        const observer = new MutationObserver(() => {
            updateHeaderFromButton();
        });

        observer.observe(dateButton, { childList: true, subtree: true });

        updateHeaderFromButton();


    });
</script>


<script>
    document.getElementById('search').addEventListener('click', function () {
        const fullName = document.getElementById('lecturer-name').value.trim();
        const indexNumber = document.getElementById('index-number').value.trim();
        const calendarContainer = document.getElementById('daily-schedule-body');

        const headerDiv = document.querySelector('.daily-schedule-header');
        const headerDateText = headerDiv.textContent.trim();

        const dateParts = headerDateText.split(',')[1]?.trim() || headerDateText;
        const [day, month, year] = dateParts.split('.');

        const headerDate = new Date(`${year}-${month}-${day}`);

        if (isNaN(headerDate)) {
            alert('Nieprawidłowa data w nagłówku. Upewnij się, że jest poprawna.');
            return;
        }

        const startDate = headerDate.toISOString().split('T')[0];
        const endDate = new Date(headerDate.getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0];

        calendarContainer.innerHTML = '';

        if (indexNumber && fullName) {
            alert('Wprowadź albo dane studenta, albo dane wykładowcy – nie oba naraz.');
            return;
        }

        if (indexNumber) {
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
