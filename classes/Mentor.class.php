<?php


class Mentor
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function getAllProgramsForTeacher($user_id){

        $sql ="SELECT * FROM programme inner join mentor_programme on programme.programme_id=mentor_programme.programme_id where mentor_programme.user_id=$user_id";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

}