<?php


class AdminCrud
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public  function create($conn,$table,$data){

        $columnString = implode(",",array_keys($data));
        $valueString = ":".implode(", :",array_keys($data));

        $sql = "INSERT INTO {$table} ({$columnString}) VALUES ({$valueString})";

        $ps = $conn->prepare($sql);

        $result = $ps->execute($data);

        if($result){
            return $conn->lastInsertId();
        }else{
            return false;
        }
    }

    public static function update($conn,$table,$data,$condition){
        $i=0;
        $columnValueSet = "";
        foreach($data as $key=>$value){
            $comma = ($i<count($data)-1?", ":"");
            $columnValueSet.=$key."='".$value."'".$comma;
            $i++;
        }
        $sql = "UPDATE $table SET $columnValueSet WHERE $condition";
        $ps =  $conn->prepare($sql);

        $result = $ps->execute();
        if($result){
            return $ps->rowCount();
        }else{
            return false;
        }
    }

    public static function readAll($conn,$table,$condition){
        $sql = "SELECT * FROM {$table} WHERE $condition";
        // echo $sql;
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function read($conn,$table,$condition){
        $sql = "SELECT * FROM $table WHERE $condition";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result){
            $keys = array_keys($result);
            $data["keys"] = $keys;
            $data["result"]=$result;
            return $data;
        }else{
            return false;
        }
    }

    public static function count($conn,$table){
        $sql = "SELECT COUNT(*) FROM {$table}";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchColumn();
        return $result;
    }

    function readAllForColumns($conn,$table,$columnString,$condition){
        $sql ="SELECT $columnString FROM $table WHERE $condition";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    function getUserEmail($email){
        $sql ="SELECT * FROM users WHERE user_email='$email'";

        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function sendMentorMail($email){
        include_once "../classes/Mailer.class.php";
        $mailer=new Mailer();
        $subject = "Team-7 Mentor Registration";

        $base_url_link ="http://localhost/team-7/includes/changePassword.php?XSRS=$email";
        $body = "$base_url_link";


        return( $mailer->send_mail($email, $body, $subject));

    }
}