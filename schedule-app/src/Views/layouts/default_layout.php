    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plan ZUT</title>
        <link rel="stylesheet" href="styles/default_style.css">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="logo">
            <span class="plan" data-pl="PLAN" data-en="SCHEDULE">PLAN</span>
            <span class="zut" data-pl="ZUT" data-en="SCHEDULE">ZUT</span>
        </div>

        <img src="/images/logo-zut.svg" alt="Logo ZUT">

    </header>
    <div class="sidebar">
        <div class="icon"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                    <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                </svg></button></div>
        <div class="icon"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                </svg></button></div>
        <!-- Przycisk zmiany języka -->
        <div class="icon"><button onclick="toggleLanguage()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                    <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                </svg></button></div>
        <div class="icon"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                </svg></button></div>
        <div class="icon"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                </svg></button></div>
    </div>
    <div class="content">
        <div class="buttons-container">
            <input type="text" placeholder="Wykładowca" data-pl="Wykładowca" data-en="Lecturer">
            <input type="text" placeholder="Sala/Budynek" data-pl="Sala/Budynek" data-en="Room/Building">
            <input type="text" placeholder="Przedmiot" data-pl="Przedmiot" data-en="Subject">
            <input type="text" placeholder="Grupa" data-pl="Grupa" data-en="Group">
            <input type="text" placeholder="Numer Albumu" data-pl="Numer Albumu" data-en="Album Number">
            <button data-pl="Wyczyść filtry" data-en="Clear filters">Wyczyść filtry</button>
        </div>

        <div class="filters">
            <button data-pl="Laboratorium" data-en="Laboratory">Laboratorium</button>
            <button data-pl="Audytorium" data-en="Auditorium">Audytorium</button>
            <button data-pl="Wykład" data-en="Lecture">Wykład</button>
            <button data-pl="Lektorat" data-en="Language Class">Lektorat</button>
            <button data-pl="Projekt" data-en="Project">Projekt</button>
        </div>

        <div class="bottom-buttons">
            <button id="date-button">Select Date</button>
            <div class="control-buttons">
                <button id="day-view" data-pl="Dzień" data-en="Day">Dzień</button>
                <button id="week-view" class="active" data-pl="Tydzień" data-en="Week">Tydzień</button>
                <button id="month-view" data-pl="Miesiąc" data-en="Month">Miesiąc</button>
                <button id="semester-view" data-pl="Semestr" data-en="Semester">Semestr</button>
            </div>


            <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg></button>
            <div id="calendar-container">
                <div id="calendar"></div>
                <div class="month-list" id="month-list" style="display: none;">
                    <ul>
                        <li data-month="01">Styczeń</li>
                        <li data-month="02">Luty</li>
                        <li data-month="03">Marzec</li>
                        <li data-month="04">Kwiecień</li>
                        <li data-month="05">Maj</li>
                        <li data-month="06">Czerwiec</li>
                        <li data-month="07">Lipiec</li>
                        <li data-month="08">Sierpień</li>
                        <li data-month="09">Wrzesień</li>
                        <li data-month="10">Październik</li>
                        <li data-month="11">Listopad</li>
                        <li data-month="12">Grudzień</li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
    <div class="semester-info">
        <strong data-pl="Semestr Zimowy" data-en="Winter Semester">Semestr Zimowy</strong>: 01.10.2024 r. – 28.02.2025 r.<br>
        <strong data-pl="Semestr Letni" data-en="Summer Semester">Semestr Letni</strong>: 01.03.2025 r. – 30.09.2025 r.
    </div>



    <main>
        <?php echo $content; ?> <!-- Here, a view is dynamically inserted from: src\Views\schedule\ -->
    </main>

    <footer>
        <p>&copy; 2025 Plan Zajęć. Wszystkie prawa zastrzeżone.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        function toggleLanguage() {
            const elements = document.querySelectorAll("[data-pl][data-en]");
            const currentLang = document.documentElement.lang;
            const newLang = currentLang === "pl" ? "en" : "pl";

            document.documentElement.lang = newLang;
            elements.forEach(element => {
                const newText = element.getAttribute(`data-${newLang}`);
                if (element.tagName === "INPUT") {
                    element.placeholder = newText;
                } else {
                    element.textContent = newText;
                }
            });
        }

        // Obserwowanie zmian w elemencie <main> i automatyczne tłumaczenie
        const mainElement = document.querySelector('main');
        const observer = new MutationObserver(() => {
            toggleLanguage();
        });

        observer.observe(mainElement, { childList: true, subtree: true });

        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const dateButton = document.getElementById('date-button');
            const calendarContainer = document.getElementById('calendar-container');
            const monthList = document.getElementById('month-list');
            const dayViewButton = document.getElementById('day-view');
            const weekViewButton = document.getElementById('week-view');
            const monthViewButton = document.getElementById('month-view');
            const semesterViewButton = document.getElementById('semester-view');

            let viewMode = 'day'; // Default view mode

            // Initialize FullCalendar
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                contentHeight: 400, // Wysokość widoku
                aspectRatio: 24,   // Proporcje szerokości do wysokości
                dateClick: function (info) {
                    if (viewMode === 'day') {
                        dateButton.textContent = info.dateStr;
                        calendarContainer.style.display = 'none';
                    } else if (viewMode === 'week') {
                        const startOfWeek = new Date(info.date);
                        startOfWeek.setDate(info.date.getDate() - info.date.getDay());
                        const endOfWeek = new Date(startOfWeek);
                        endOfWeek.setDate(startOfWeek.getDate() + 6);
                        dateButton.textContent = `${startOfWeek.toISOString().split('T')[0]} - ${endOfWeek.toISOString().split('T')[0]}`;
                        calendarContainer.style.display = 'none';
                    }
                }
            });
            calendar.render();

            // Set today's date on the button
            const today = new Date().toISOString().split('T')[0];
            dateButton.textContent = today;

            dateButton.addEventListener('click', function () {
                const isCalendarVisible = calendarContainer.classList.contains('visible');

                if (!isCalendarVisible) {
                    // Pobranie pozycji przycisku
                    const rect = dateButton.getBoundingClientRect();

                    // Ustawienie pozycji kalendarza
                    calendarContainer.style.top = `${rect.bottom + window.scrollY}px`;
                    calendarContainer.style.left = `${rect.left + window.scrollX}px`;

                    // Ustaw maksymalną szerokość kalendarza
                    calendarContainer.style.maxWidth = '300px';

                    // Wyświetlenie kalendarza
                    calendarContainer.classList.add('visible');
                    calendarContainer.style.display = 'block';

                    // Wymuszenie odświeżenia widoku kalendarza
                    calendar.updateSize();
                } else {
                    // Ukrycie kalendarza
                    calendarContainer.classList.remove('visible');
                    calendarContainer.style.display = 'none';
                }
            });



            dayViewButton.addEventListener('click', function () {
                viewMode = 'day';
                calendarContainer.style.display = 'none';
                monthList.style.display = 'none';
                dayViewButton.classList.add('active');
                weekViewButton.classList.remove('active');
                monthViewButton.classList.remove('active');
                semesterViewButton.classList.remove('active');
            });

            weekViewButton.addEventListener('click', function () {
                viewMode = 'week';
                calendarContainer.style.display = 'none';
                monthList.style.display = 'none';
                weekViewButton.classList.add('active');
                dayViewButton.classList.remove('active');
                monthViewButton.classList.remove('active');
                semesterViewButton.classList.remove('active');
            });

            monthViewButton.addEventListener('click', function () {
                const isMonthListVisible = monthList.classList.contains('visible');

                if (!isMonthListVisible) {
                    monthList.classList.add('visible');
                    calendarContainer.classList.remove('visible');
                } else {
                    monthList.classList.remove('visible');
                }

                dayViewButton.classList.remove('active');
                weekViewButton.classList.remove('active');
                monthViewButton.classList.add('active');
                semesterViewButton.classList.remove('active');
            });

            semesterViewButton.addEventListener('click', function () {
                viewMode = 'semester';
                calendarContainer.style.display = 'none';
                monthList.style.display = 'none';

                dayViewButton.classList.remove('active');
                weekViewButton.classList.remove('active');
                monthViewButton.classList.remove('active');
                semesterViewButton.classList.add('active');
            });

            monthList.addEventListener('click', function (event) {
                if (event.target.tagName === 'LI') {
                    const selectedMonth = event.target.getAttribute('data-month');
                    const year = new Date().getFullYear();

                    dateButton.textContent = `${year}-${selectedMonth}`;
                    monthList.classList.remove('visible');
                }
            });
        });

        document.querySelectorAll('.filters button').forEach(button => {
            button.addEventListener('click', () => {
                // Przełączanie klasy 'active' na klikniętym przycisku
                button.classList.toggle('active');
            });
        });

    </script>

    </body>
    </html>
