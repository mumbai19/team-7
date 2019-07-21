<?php


class Activity
{

    private $conn;
    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function getActivitiesForProgramme($user_id){
        $sql ="
select * from users inner join mentor on users.user_id=mentor.user_id inner join activity_programme on mentor.prog_id=activity_programme.programme_id inner join activity on activity_programme.activity_id=activity.activity_id where users.user_id=$user_id";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}