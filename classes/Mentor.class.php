<?php


class Mentor
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function getAllProgramsForTeacher($user_id){

        $sql ="SELECT * FROM programme inner join mentor on programme.programme_id=mentor.prog_id and mentor.user_id=$user_id";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function getNamesOfAllStudentsForProgramme($programme_id){
        $sql ="SELECT student.student_id,student.student_first_name,student.student_last_name,student.created_on from student inner join student_programme on student.student_id=student_programme.student_id where student_programme.programme_id=$programme_id";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;


    }

}