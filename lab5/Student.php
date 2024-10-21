<?php
class Student
{
    private string $studentNumber;
    private string $name;
    private array $grades = [];

    public function __construct(string $studentNumber, string $name)
    {
        $this->studentNumber = $studentNumber;
        $this->name = $name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __tostring(): string
    {
        return $this->studentNumber ." ". $this->name;
    }

    public function addGrdes(Subject $subject, int $grade): void{
        $subjectCode = $subject->getCode();
        if (!isset($this->grades[$subjectCode])) {
            $this->grades[$subjectCode] = [];
        }
        $this->grades[$subjectCode][] = $grade;
    }

    public function getAvgGrade(): float
    {
        $totalGrades = 0; 
        $totalCount = 0;   
        foreach ($this->grades as $courseGrades) {
            if (is_array($courseGrades)) {
                $totalGrades += array_sum($courseGrades);
                $totalCount += count($courseGrades);     
            }
        }
        return $totalCount > 0 ? $totalGrades / $totalCount : 0.0;
    }

    public function printGrades() {
        foreach ($this->grades as $courseCode => $courseGrades) {
            echo "Kurzus nev: $courseCode, kurzus jegyek: ";
            echo implode(", ", $courseGrades) . "<br>"; 
            echo "Hallgato neve: " . $this->getName() . ", kodja: " . $this->getStudentNumber() . "<br>";
        }
    }
    
}
?>