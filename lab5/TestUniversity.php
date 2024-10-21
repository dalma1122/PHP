<?php
include "University.php";
include "Student.php";
include "NincsHallgatoKivetel.php";

$university = new University();
$subject1 = $university->addSubject("111","Php");
$subject2 = $university->addSubject("222","Java");
$subject3 = $university->addSubject("333","Python");

$student1 = new Student("101", "Janos");
$student2 = new Student("102","Anna");
$student3 = new Student("103","Bela");

$university->addStudentOnSubject("111",$student1);
$university->addStudentOnSubject("222",$student2);
$university->addStudentOnSubject("222",$student3);

echo "Total students: " . $university->getNumberOfStudents() . "<br>";
$university->print();

$student1->addGrdes($subject1, 8);
$student1->addGrdes($subject1, 4);
$student1->addGrdes($subject1, 10);

$student2->addGrdes($subject2,10);
$student2->addGrdes($subject2,2);
$student2->addGrdes($subject2,3);

$student3->addGrdes($subject2,8);
$student3->addGrdes($subject2,5);
$student3->addGrdes($subject2,5);

$student1->printGrades();
$student2->printGrades();

// echo $student1->getName() . " jegyatlaga: " . $student1->getAvgGrade() . "<br>";
// echo $student2->getName() . " jegyatlaga: " . $student2->getAvgGrade() . "<br>";

$students = [$student1, $student2, $student3];
$sortedStudents = $university->sortStudentsByAvgGrade($students);
foreach ( $sortedStudents as $student ) {
    echo $student->getName() . " - jegyatlaga: " . $student->getAvgGrade() . "<br>";
}

$subject1->deleteStudent("102");

try {
    $university->deleteSubject($subject1);
} catch (NincsHallgatoKivetel $e) {
    echo $e->getMessage() ."<br>";
}


?>