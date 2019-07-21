<?php

include_once("Mentor.class.php");



class Attendance{

    private $table = "attendance";

    public function getAllStudents($conn,$user_id){
        $obj = new Mentor($conn);
        $program = $obj->getProgramForMentor($conn,$user_id);
         extract($program);
        // print_r($program);
        $sql="select student.student_first_name,student.student_last_name,student.student_id from student inner join student_programme on student.student_id=student_programme.student_id where student_programme.programme_id=$prog_id";
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

        $data = array("student_id"=>$id,"isPresent"=>$isPresent);

        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));

        // echo $mentor_id."isID";

        // $sql = "INSERT INTO attendance ({$columnString}) VALUES ({$valueString})";
        $sql = "insert into attendance (student_id,isPresent) values($id,$isPresent)";
        echo $sql;
        $ps = $conn->prepare($sql);
        $result = $ps->execute($data);

        // if($result){
        //     echo $conn->lastInsertId();
        // }else{
        //     echo false;
        // }
    }

    public function getAttendance($conn){
        $sql = "SELECT * from attendance";
        $ps = $conn->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}


?>