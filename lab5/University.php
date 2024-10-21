<?php
require "AbstractUniversity.php";
include "Subject.php";

class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        $subject = new Subject($code, $name);
        $this->subjects[$code] = $subject; 
        return $subject;    
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        if (!isset($this->subjects[$subjectCode])) {
            throw new Exception("Subject not found with code: $subjectCode");
        }
        $this->subjects[$subjectCode]->addStudent($student->getName(), $student->getStudentNumber());
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        if (!isset($this->subjects[$subjectCode])) {
            throw new Exception("Subject not found with code: $subjectCode");
        }
        return $this->subjects[$subjectCode]->getStudents();
    }
    public function getNumberOfStudents(): int
    {
        $totalStudents = 0;
        foreach ($this->subjects as $subject) {
            $totalStudents += count($subject->getStudents());
        }
        return $totalStudents;
    }
    public function print()
    {
        foreach ($this->subjects as $subject) {
            echo $subject->getName() . "<br>" . str_repeat("-",25) . "<br>";
            foreach ($subject->getStudents() as $student) {
                echo "Name: " . $student->getName() . " Number: " . $student->getStudentNumber() . "<br>";
            }
        }
    }

    public function deleteSubject(Subject $subject) {
        if (count($subject->getStudents()) > 0) {
            throw new NincsHallgatoKivetel("Nem lehet torolni a kovetkezo kurzust: '{$subject->getName()}', mert hallgato van hozza rendelve");
        }
        unset( $this->subjects[$subject->getCode()]);
    }

    function sortStudentsByAvgGrade(array $students): array
    {
        usort($students, function (Student $a, Student $b) {
            return $b->getAvgGrade() <=> $a->getAvgGrade();
        });
        return $students;
    }
}
?>