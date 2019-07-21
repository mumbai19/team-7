<?php

// include_once "Session.class.php";
// session_start();
include_once("Mentor.class.php");



class Theme{

    public function getAllThemes($conn){
        $sql = "SELECT * FROM theme";
        $ps = $conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getParametersForProgram($conn,$user_id){
        // $var = $_SESSION['user_id'];
        $obj = new Mentor($conn);
        $mentor = $obj->getMentor($user_id);
        $var = $mentor['mentor_id'];
        $sql = "SELECT * FROM parameters WHERE mentor_id = $var";
        $ps = $conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertAssessment($conn,$data){
        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));

        
        // $data = array("theme_id"=>$_POST['theme'],"mentor_id"=>$_POST['user'],"student_id"=>$_POST['stud'],"parameter_id"=>$_POST['par'],"programme_id"=>$program['prog_id']);        

        $sql = "INSERT INTO assessment ({$columnString}) VALUES ({$valueString})";
        echo $sql;
        $ps = $conn->prepare($sql);
        
        $result = $ps->execute($data);
        
        if($result){
            echo true;
        }
    }

}

?>