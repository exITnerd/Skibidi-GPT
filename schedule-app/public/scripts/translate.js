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

        // Set today's date on the button
        const today = new Date().toISOString().split('T')[0];
        dateButton.textContent = today;


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
