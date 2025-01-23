<?php

namespace Exitn\ScheduleApp\Services;

use PDO;

class DataImportService
{
    private PDO $db;
    private string $jsonDirectory;

    public function __construct(PDO $db, string $jsonDirectory)
    {
        $this->db = $db;
        $this->jsonDirectory = $jsonDirectory;
    }

    public function importJsonFiles(): void
    {
        echo "Import started...\n";
        echo "JSON Directory: " . $this->jsonDirectory . "\n";
        $files = glob($this->jsonDirectory . '/*.json');
        echo "Found " . count($files) . " JSON files.\n";

        foreach ($files as $file) {
            $jsonData = file_get_contents($file);
            $teachers = json_decode($jsonData, true);

            foreach ($teachers as $teacherData) {
                $this->importTeacherSchedule($teacherData);
            }
        }
    }

    private function importTeacherSchedule(array $teacherData): void
    {
        $teacherName = $teacherData['teacher'];
        $teacherId = $this->insertOrGetTeacher($teacherName);

        foreach ($teacherData['schedule'] as $lesson) {
            $subjectId = $this->insertOrGetSubject($lesson['subject'], $lesson['lesson_form']);
            $roomId = $this->insertOrGetRoom($lesson['room']);
            $groupId = $this->insertOrGetGroup($lesson['group_name']);

            $this->insertLesson(
                $subjectId,
                $teacherId,
                $roomId,
                $groupId,
                $lesson['start'],
                $lesson['end'],
                $lesson['lesson_status'],
                $lesson['status_item']
            );
        }
    }

    private function insertOrGetTeacher(string $fullName): int
    {
        [$title, $firstName, $lastName] = $this->splitTeacherName($fullName);

        // Sprawdzanie, czy nauczyciel już istnieje w bazie
        $stmt = $this->db->prepare("SELECT teacher_id FROM teachers WHERE first_name = ? AND last_name = ? AND title = ?");
        $stmt->execute([$firstName, $lastName, $title]);
        $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($teacher) {
            return (int)$teacher['teacher_id'];
        }

        // Wstawianie nowego nauczyciela
        $stmt = $this->db->prepare("INSERT INTO teachers (first_name, last_name, title) VALUES (?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $title]);

        return (int)$this->db->lastInsertId();
    }


    private function insertOrGetSubject(string $subjectName, string $lessonForm): int
    {
        $stmt = $this->db->prepare("SELECT subject_id FROM subjects WHERE subject_name = ? AND lesson_form = ?");
        $stmt->execute([$subjectName, $lessonForm]);
        $subject = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($subject) {
            return (int)$subject['subject_id'];
        }

        $stmt = $this->db->prepare("INSERT INTO subjects (subject_name, lesson_form) VALUES (?, ?)");
        $stmt->execute([$subjectName, $lessonForm]);

        return (int)$this->db->lastInsertId();
    }

    private function insertOrGetRoom(string $roomName): int
    {
        $stmt = $this->db->prepare("SELECT room_id FROM rooms WHERE room_name = ?");
        $stmt->execute([$roomName]);
        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($room) {
            return (int)$room['room_id'];
        }

        $stmt = $this->db->prepare("INSERT INTO rooms (room_name) VALUES (?)");
        $stmt->execute([$roomName]);

        return (int)$this->db->lastInsertId();
    }

    private function insertOrGetGroup(string $groupName): int
    {
        $stmt = $this->db->prepare("SELECT group_id FROM groups WHERE group_name = ?");
        $stmt->execute([$groupName]);
        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($group) {
            return (int)$group['group_id'];
        }

        $stmt = $this->db->prepare("INSERT INTO groups (group_name) VALUES (?)");
        $stmt->execute([$groupName]);

        return (int)$this->db->lastInsertId();
    }

    private function insertLesson($subjectId, $teacherId, $roomId, $groupId, $startTime, $endTime, $lessonStatus, $statusItem): void
    {
        $stmt = $this->db->prepare("SELECT lesson_id FROM lessons WHERE subject_id = ? AND teacher_id = ? AND room_id = ? AND group_id = ? AND start_time = ?");
        $stmt->execute([$subjectId, $teacherId, $roomId, $groupId, $startTime]);
        $lesson = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($lesson) {
            return;
        }

        $stmt = $this->db->prepare("INSERT INTO lessons (subject_id, teacher_id, room_id, group_id, start_time, end_time, lesson_status, status_item) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$subjectId, $teacherId, $roomId, $groupId, $startTime, $endTime, $lessonStatus, $statusItem]);
    }

    private function splitTeacherName(string $fullName): array
    {
        $parts = explode(' ', $fullName);

        $possibleTitles = ['dr', 'dr.', 'dr hab.', 'prof.', 'prof.', 'mgr', 'inż.', 'inż'];

        $titleParts = [];
        $nameParts = [];

        foreach ($parts as $part) {
            if (in_array($part, $possibleTitles)) {
                $titleParts[] = $part;
            } else {
                $nameParts[] = $part;
            }
        }

        $title = implode(' ', $titleParts);

        if (count($nameParts) >= 2) {
            $firstName = implode(' ', array_slice($nameParts, 0, -1));
            $lastName = array_pop($nameParts);
        } else {
            $firstName = implode(' ', $nameParts);
            $lastName = '';
        }

        return [$firstName, $lastName, $title]; // Imię, nazwisko, tytuł
    }


}
