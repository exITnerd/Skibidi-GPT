import requests
import string
import json
from datetime import datetime, timedelta
from concurrent.futures import ThreadPoolExecutor, as_completed
import logging

logging.basicConfig(level=logging.INFO, format="%(asctime)s - %(levelname)s - %(message)s")

def fetch_teachers(letter):
    url = f"https://plan.zut.edu.pl/schedule.php"
    params = {"kind": "teacher", "query": letter}
    try:
        response = requests.get(url, params=params, timeout=10)  # Dodano timeout
        if response.status_code == 200:
            data = response.json()
            if isinstance(data, list):  # Sprawdzamy, czy odpowiedź to lista
                return [teacher.get('item') for teacher in data if 'item' in teacher]
            else:
                logging.warning(f"Nieprawidłowa odpowiedź API dla litery {letter}: {data}")
                return []
        else:
            logging.error(f"Błąd pobierania nauczycieli dla litery {letter}: {response.status_code}")
            return []
    except requests.exceptions.RequestException as e:
        logging.error(f"Problem z połączeniem dla litery {letter}: {e}")
        return []
    except ValueError:
        logging.error(f"Nie udało się sparsować odpowiedzi JSON dla litery {letter}")
        return []

def fetch_schedule(teacher_name, start_date, end_date):
    url = f"https://plan.zut.edu.pl/schedule_student.php"
    params = {
        "teacher": teacher_name,
        "start": start_date.isoformat(),
        "end": end_date.isoformat()
    }
    response = requests.get(url, params=params)
    if response.status_code == 200:
        try:
            data = response.json()
            return [
                {
                    "subject": lesson.get("subject"),
                    "room": lesson.get("room"),
                    "start": lesson.get("start"),
                    "end": lesson.get("end"),
                    "group_name": lesson.get("group_name"),
                    "lesson_form": lesson.get("lesson_form"),
                    "teacher": lesson.get("worker_title"),
                    "lesson_status": lesson.get("lesson_status"),
                    "lesson_status_short": lesson.get("lesson_status_short"),
                    "status_item": lesson.get("status_item"),
                }
                for lesson in data if lesson
            ]
        except ValueError:
            logging.error(f"Nie udało się sparsować planu zajęć dla {teacher_name}")
            return []
    else:
        logging.error(f"Błąd pobierania planu zajęć dla {teacher_name}: {response.status_code}")
        return []

def scrape_data():
    start_date = datetime(2024, 10, 1)  # Początek semestru
    end_date = datetime(2025, 1, 31)   # Koniec semestru
    current_date = start_date

    while current_date < end_date:
        month_start = current_date.replace(day=1)
        next_month = month_start + timedelta(days=31)
        month_end = next_month.replace(day=1) - timedelta(days=1)

        if month_end > end_date:
            month_end = end_date

        logging.info(f"Scrapowanie danych od {month_start.date()} do {month_end.date()}")

        month_data = []
        with ThreadPoolExecutor(max_workers=50) as executor:
            teacher_futures = {executor.submit(fetch_teachers, letter): letter for letter in string.ascii_uppercase}
            
            for future in as_completed(teacher_futures):
                letter = teacher_futures[future]
                try:
                    teachers = future.result()
                    logging.info(f"Pobrano nauczycieli dla litery '{letter}': {len(teachers)} nauczycieli")

                    schedule_futures = {
                        executor.submit(fetch_schedule, teacher, month_start, month_end): teacher for teacher in teachers
                    }

                    for schedule_future in as_completed(schedule_futures):
                        teacher_name = schedule_futures[schedule_future]
                        try:
                            schedule = schedule_future.result()
                            logging.info(f"Pobrano plan zajęć dla nauczyciela: {teacher_name}")
                            month_data.append({"teacher": teacher_name, "schedule": schedule})
                        except Exception as e:
                            logging.error(f"Błąd podczas pobierania planu dla nauczyciela {teacher_name}: {e}")
                except Exception as e:
                    logging.error(f"Błąd podczas pobierania nauczycieli dla litery '{letter}': {e}")

        # Sortowanie danych alfabetycznie po nazwiskach nauczycieli
        month_data.sort(key=lambda x: x["teacher"].lower())

        month_filename = f"sch_teacher_{month_start.strftime('%Y-%m')}.json"
        save_to_file(month_data, filename=month_filename)

        current_date = month_end + timedelta(days=1)

def save_to_file(data, filename="schedule.json"):
    with open(filename, "w", encoding="utf-8") as file:
        json.dump(data, file, ensure_ascii=False, indent=4)
    logging.info(f"Dane zapisano do pliku {filename}")

if __name__ == "__main__":
    scrape_data()
