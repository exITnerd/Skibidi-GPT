    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plan ZUT</title>
        <link rel="icon" href="/images/icon.svg" type="image/svg+xml">
        <link id="theme-stylesheet" rel="stylesheet" href="styles/default_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="logo">
            <span class="plan" data-pl="PLAN" data-en="SCHEDULE">PLAN</span>
            <span class="zut" data-pl="ZUT" data-en="ZUT">ZUT</span>
        </div>

        <img src="/images/logo-zut.svg" alt="Logo ZUT">

    </header>
    <div class="sidebar">
        <div class="icon">    <button id="dark-mode-button" data-tooltip="Tryb ciemny">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                    <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                </svg></button></div>
        <div class="icon"><button id="default-mode-button" data-tooltip="Tryb jasny"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
                </svg></button></div>
        <!-- Przycisk zmiany języka -->
        <div class="icon"><button data-tooltip="Zmień język" onclick="toggleLanguage()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                    <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                </svg></button></div>
        <div class="icon"><button data-tooltip="Porównaj plany"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                    <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                </svg></button></div>
        <div class="icon"><button data-tooltip="Skopiuj łącze"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                </svg></button></div>
        <div class="icon"><button data-tooltip="Dodaj do ulubionych"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                </svg></button></div>
    </div>
    <div class="content">
        <div class="buttons-container">
            <input id="lecturer-name" type="text" placeholder="Wykładowca (Imię i Nazwisko)" data-pl="Wykładowca (Imię i Nazwisko)" data-en="Lecturer (First and Last Name)">
            <input type="text" placeholder="Sala/Budynek" data-pl="Sala/Budynek" data-en="Room/Building">
            <input type="text" placeholder="Przedmiot" data-pl="Przedmiot" data-en="Subject">
            <input type="text" placeholder="Grupa" data-pl="Grupa" data-en="Group">
            <input id="index-number" type="text" placeholder="Numer Albumu" data-pl="Numer Albumu" data-en="Album Number">
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

            <div class="control-buttons">
                <?php $viewType = $_GET['view'] ?? 'day'; ?>

                <button id="day-view" class="<?= $viewType === 'day' ? 'active' : '' ?>"
                        data-pl="Dzień" data-en="Day"
                        onclick="window.location.href='?view=day'">Dzień</button>

                <button id="week-view" class="<?= $viewType === 'week' ? 'active' : '' ?>"
                        data-pl="Tydzień" data-en="Week"
                        onclick="window.location.href='?view=week'">Tydzień</button>

                <button id="month-view" class="<?= $viewType === 'month' ? 'active' : '' ?>"
                        data-pl="Miesiąc" data-en="Month"
                        onclick="window.location.href='?view=month'">Miesiąc</button>

                <button id="semester-view" class="<?= $viewType === 'semester' ? 'active' : '' ?>"
                        data-pl="Semestr" data-en="Semester"
                        onclick="window.location.href='?view=semester'">Semestr</button>

                <button id="left_arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                    </svg></button>

                <button id="date-button"></button>

                <button id="right_arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                    </svg></button>
                <button id="search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg></button>
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
        <p data-pl="&copy; 2025 Plan Zajęć ZUT. Wszystkie prawa zastrzeżone." data-en="&copy; 2025 ZUT Schedule. All rights reserved.">&copy; 2025 Plan Zajęć. Wszystkie prawa zastrzeżone.</p>
    </footer>


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
            const dateButton = document.getElementById('date-button');
            const dayViewButton = document.getElementById('day-view');
            const weekViewButton = document.getElementById('week-view');
            const monthViewButton = document.getElementById('month-view');
            const semesterViewButton = document.getElementById('semester-view');
            const leftArrow = document.getElementById('left_arrow');
            const rightArrow = document.getElementById('right_arrow');

            let currentView = localStorage.getItem('currentView') || 'day'; // default view
            let currentDate = new Date();

            function formatDate(date) {
                return date.toISOString().split('T')[0];
            }

            function getWeekRange(date) {
                const day = date.getDay();
                const diffToMonday = (day === 0 ? -6 : 1) - day; // calculate Monday
                const monday = new Date(date);
                monday.setDate(date.getDate() + diffToMonday);

                const sunday = new Date(monday);
                sunday.setDate(monday.getDate() + 6);

                return `${formatDate(monday)} - ${formatDate(sunday)}`;
            }

            function formatMonthAndYear(date) {
                const month = date.toLocaleString('default', { month: 'long' });
                const year = date.getFullYear();
                return `${month} ${year}`;
            }

            function updateDateButton() {
                if (currentView === 'day') {
                    dateButton.textContent = formatDate(currentDate);
                } else if (currentView === 'week') {
                    dateButton.textContent = getWeekRange(currentDate);
                } else if (currentView === 'month') {
                    dateButton.textContent = formatMonthAndYear(currentDate);
                } else if (currentView === 'semester') {
                    dateButton.textContent = 'Semester View'; // Placeholder text for semester view
                }
            }

            function updateViewButtons() {
                dayViewButton.classList.toggle('active', currentView === 'day');
                weekViewButton.classList.toggle('active', currentView === 'week');
                monthViewButton.classList.toggle('active', currentView === 'month');
                semesterViewButton.classList.toggle('active', currentView === 'semester');
            }

            function setCurrentView(view) {
                currentView = view;
                localStorage.setItem('currentView', currentView); // Save current view in localStorage
                updateViewButtons();
                updateDateButton();
            }

            dayViewButton.addEventListener('click', function () {
                setCurrentView('day');
            });

            weekViewButton.addEventListener('click', function () {
                setCurrentView('week');
            });

            monthViewButton.addEventListener('click', function () {
                setCurrentView('month');
            });

            semesterViewButton.addEventListener('click', function () {
                setCurrentView('semester');
            });

            leftArrow.addEventListener('click', function () {
                if (currentView === 'day') {
                    currentDate.setDate(currentDate.getDate() - 1);
                } else if (currentView === 'week') {
                    currentDate.setDate(currentDate.getDate() - 7);
                } else if (currentView === 'month') {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                }
                updateDateButton();
            });

            rightArrow.addEventListener('click', function () {
                if (currentView === 'day') {
                    currentDate.setDate(currentDate.getDate() + 1);
                } else if (currentView === 'week') {
                    currentDate.setDate(currentDate.getDate() + 7);
                } else if (currentView === 'month') {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                }
                updateDateButton();
            });

            // Initialize the view and date button
            updateViewButtons();
            updateDateButton();

            // Dodanie obsługi kliknięcia na filtry
            document.querySelectorAll('.filters button').forEach(button => {
                button.addEventListener('click', () => {
                    // Przełączanie klasy 'active' na klikniętym przycisku
                    button.classList.toggle('active');
                });
            });
        });

        // Obsługa stylów
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('selectedTheme');
            const themeStylesheet = document.getElementById('theme-stylesheet');

            if (savedTheme) {
                themeStylesheet.setAttribute('href', savedTheme);
            }

            const setTheme = (theme) => {
                themeStylesheet.setAttribute('href', theme);
                localStorage.setItem('selectedTheme', theme); // Zapisz styl w localStorage
            };

            document.getElementById('dark-mode-button').addEventListener('click', () => {
                setTheme('styles/darkmode_style.css');
            });

            document.getElementById('default-mode-button').addEventListener('click', () => {
                setTheme('styles/default_style.css');
            });
        });

    </script>

    </body>
    </html>
