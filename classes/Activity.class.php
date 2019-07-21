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

    public function getDetail($id){
        $sql = "select * from activity where activity_id=$id";
        $ps = $this->conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetch();
        return $result;
    }

    public function insertActivity($data){
        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));


        // $data = array("theme_id"=>$_POST['theme'],"mentor_id"=>$_POST['user'],"student_id"=>$_POST['stud'],"parameter_id"=>$_POST['par'],"programme_id"=>$program['prog_id']);        
        // $sql = "DELETE FROM activity where activity_id=".$data['activity_id'];
        $sql = "INSERT INTO activity ({$columnString}) VALUES ({$valueString})";
        // echo $sql;
        $ps = $this->conn->prepare($sql);
        
        $result = $ps->execute($data);
        
        if($result){
            echo true;
        }
    }
}