<?php

session_start();
ob_start();



$host = "localhost";
$user = "root";
$pw = "";
$dbname = "airtime-dis";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pw);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECPTION);
}   catch (PDOException $e) {
    echo $e->getMessage();
}

$db = new Main($conn);




class Main {
    private $db;
    function __construct($db){
        $this->_db = $db;

    }
    function login(){
        if (isset($_POST['btn'])){
            $user = addslashes(strip_tags($_POST['user']));
            $pw = addslashes(strip_tags($_POST['pw']));
            
            if (!empty($user) AND !empty($pw)){
                $sql = $this->_db->prepare("SELECT * FROM `user` WHERE username = :user AND password = :pw");
                $sql->execute(array('user' => $user, 'pw' => $pw));

                if ($sql->rowCount()){
                    $data = $sql->fetch();
                    $_SESSION['id'] =$data['id'];
                    $_SESSION['id'] = true;
                    header('location:index.php');
                }else{
                    echo "username or password are invalid"; 
                }
            }else {
                echo "please enter username and password";
            
            }
        }
    }
}





