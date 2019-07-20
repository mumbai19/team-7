<?php



class Crude
{

    private $conn;
    private $table = 'users';

    // Post Properties
    public $user_name;
    public $user_surname;
    public $user_gender;
    public $user_occupation;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }
    public function create($data)
    {
        return $data;
        // Create query
//        $query = 'INSERT INTO ' . $this->table . ' SET user_name = :user_name, user_surname = :user_surname, user_gender = :user_gender, user_occupation =:user_occupation';
//
//            $stmt = $this->conn->prepare($query);
//
//            $this->user_name = htmlspecialchars(strip_tags($this->user_name));
//            $this->user_surname = htmlspecialchars(strip_tags($this->user_surname));
//            $this->user_gender = htmlspecialchars(strip_tags($this->user_gender));
//            $this->user_occupation = htmlspecialchars(strip_tags($this->user_occupation));
//
//
////            // Bind data
//            $stmt->bindParam(':user_name', $this->user_name);
//            $stmt->bindParam(':user_surname', $this->user_surname);
//            $stmt->bindParam(':user_gender', $this->user_gender);
//            $stmt->bindParam(':user_occupation', $this->user_occupation);
//
//
//            if ($stmt->execute()) {
//                return true;
//            }
//
//            // Print error if something goes wrong
////        printf("Error: %s.\n", $stmt->error);
//
//            return false;
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

    public static function readAll($conn,$table,$condition=1){
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

}