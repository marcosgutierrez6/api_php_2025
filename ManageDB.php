<?php
include_once 'DB.php';

class ManageBD extends DB {
    public function getQueries() {
        $conn = $this->connect();

        $course = $conn->query('SELECT * FROM course');
        $department = $conn->query('SELECT * FROM department');
        $instructor = $conn->query('SELECT * FROM instructor');
        $instructor_view = $conn->query('SELECT * FROM instructor_view');
        $profesor = $conn->query('SELECT * FROM profesor');
        $student = $conn->query('SELECT * FROM student');
        $takes = $conn->query('SELECT * FROM takes');
        $teaches = $conn->query('SELECT * FROM teaches');

        $students_and_professors = $conn->query('
            SELECT id, name FROM student
            UNION
            SELECT id, name FROM profesor
        ');

        $professors_instructors = $conn->query('
            SELECT p.id, p.name 
            FROM profesor p
            INNER JOIN instructor i ON p.id = i.id
        ');

        $queries = array(
            "course" => $course,
            "department" => $department,
            "instructor" => $instructor,
            "instructor_view" => $instructor_view,
            "profesor" => $profesor,
            "student" => $student,
            "takes" => $takes,
            "teaches" => $teaches,
            "students_and_professors" => $students_and_professors,  // Unión
            "professors_instructors" => $professors_instructors  // Intersección
        );

        return $queries;
    }
}
?>
