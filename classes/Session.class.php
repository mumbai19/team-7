<?php
include_once "Crud.class.php";
include_once "Database.class.php";
$conn=(new Database())->getConnection();
class Session{

    public function  __construct()
    {

    }

    public static function  startSession(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function setSession($data){
        extract($data);
       // echo $user_id;
//        echo $user_name;
//        echo $user_occupation;
        $_SESSION['user_id'] = $user_id;

        $_SESSION['user_name']=$user_name;
        $_SESSION['user_role_type']=$user_role_type;
//        $_SESSION['user_occupation']=$user_occupation;
    }

    public function unsetSession(){
        $_SESSION['user_id'] = "";
        $_SESSION['user_name']="";
        $_SESSION['user_occupation']="";
        return session_destroy();
    }

    public function setCookies($signed_in){
        //	$cip=new Cipher();
//        echo $signed_in;
        if($signed_in){
            $cookie_name = "TEAM7_USER";
            // $user_id_to_login = $cip->encrypt($user_id);
//                    $encrypt_id =encrypt($user_id_to_login);
            $cookie_content = $_SESSION['user_id'];
            $cookie_time = time() + 86400 * 30;
            $path = "/";
            setcookie($cookie_name, $cookie_content, $cookie_time, $path);
        } else{
            $cookie_name = "TEAM7_USER";
//                    $user_id_to_login = $cip->encrypt($user_id);;

            $cookie_content =  $_SESSION['user_id'];
            $cookie_time = time() + 3600;
            $path = "/";
            setcookie($cookie_name, $cookie_content, $cookie_time, $path);
        }
    }

    public function deleteCookies(){

        $cookie_name = "NAME_HERE";
        $user_id_to_logout = $_SESSION['user_id'];
        $cookie_content = $user_id_to_logout;
        $cookie_time = time() - 86400 * 30;
        $path = "/";
        setcookie($cookie_name, $cookie_content, $cookie_time, $path);
    }

    public function isCookieSet(){
        //$cip=new Cipher();

        if(isset($_COOKIE["NAME_HERE"])){
            $user_id = $_COOKIE["NAME_HERE"];
            global $conn;
           $results= Crude::read($conn,'users',"user_id=$user_id");

//            $res=$database->query("select * from users where user_id='$user_id'");
//            if($row=mysqli_fetch_assoc($res)){
//                extract($row);
//                $user_name=$user_first_name." ".$user_last_name;
//                $this->setSession($user_id,$user_name,$user_role);
//
//                return true;
//            }
           return $results;
        }else
            return false;
    }
}