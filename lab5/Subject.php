<?php
class Subject
{
    private string $code;
    private string $name;
    private $students = [];

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = [];
    }

    public function getCode(): string
    {
        return $this->code;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getStudents(): array
    {
        return $this->students;
    }
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setStudents(array $students): void
    {
        $this->students = $students;
    }
    public function __toString() {
        return "Subject Code: " . $this->code . ", Subject Name: " . $this->name;
    }

    public function isStudentExists($studentNumber): bool
    {
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student){
            if ($student->getStudentNumber() == $studentNumber) return true;
        }
        return false;
    }

    
    public function addStudent(string $name, int $studentNumber): Student
    {
        if (!$this->isStudentExists($studentNumber)) {
            $student = new Student($studentNumber,$name);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Nincs ilyen!");
        }
    }

    public function deleteStudent(string $studentNumber): bool {
        foreach ($this->students as $student){
            if ($student->getStudentNumber() == $studentNumber) {
                unset( $this->students[$studentNumber] );
                return true;
            }
        }
        return false;
    }
}
?>