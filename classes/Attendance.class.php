<?php

include_once("Mentor.class.php");


class Attendance{

    private $table = "attendance";

    public function getAllStudents($conn,$user_id){
        
        $obj = new Mentor($conn);

        $program = $obj->getProgramForMentor($conn,$user_id);

        $sql = "select student.student_id,student.student_first_name,student_last_name,mentor.mentor_id from student_programme inner join student on student_programme.student_id=student.student_id inner join mentor_programme on student_programme.programme_id=mentor_programme.programme_id inner join mentor on mentor_programme.mentor_id=mentor.mentor_id and student_programme.programme_id=2";
        // student_programme.student_programme_id,student.student_first_name,mentor.user_id
        $ps = $conn->prepare($sql);
        $ps->execute();
        $results = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function insertAttendance($conn,$mark,$id,$program,$mentor_id){
        //add created_by into the file

        
        echo "hello";
        $isPresent=0;
        if($mark=="present"){
            $isPresent=1;
        }

        $data = array("student_id"=>$id,"isPresent"=>$isPresent,"programme_id"=>$program,"mentor_id"=>$mentor_id);

        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));


        $sql = "INSERT INTO attendance ({$columnString}) VALUES ({$valueString})";
        echo $sql;
        $ps = $conn->prepare($sql);
        $result = $ps->execute($data);

        if($result){
            echo true;
        }
    }

}


?>