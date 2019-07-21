<?php

// include_once "Session.class.php";
// session_start();

class Theme{

    public function getAllThemes($conn){
        $sql = "SELECT * FROM theme";
        $ps = $conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getParametersForProgram($conn){
        $var = $_SESSION['user_id'];
        $sql = "SELECT * FROM parameters WHERE mentor_id = $var";
        $ps = $conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertAssessment($conn,$data){
        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));

        $sql = "INSERT INTO assessment ({$columnString}) VALUES ({$valueString})";

        $ps = $conn->prepare($sql);
        
        $result = $ps->execute($data);
    }

}

?>