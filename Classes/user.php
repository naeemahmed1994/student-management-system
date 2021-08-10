<?php
require 'Database.php';
class User extends Database
{
    public function adminLoginCheck(){
        $password=md5($_POST['password']);

        $sql= "SELECT * FROM users WHERE email='$_POST[email]' && password='$password'" ;
        if($result=mysqli_query($this->dbConn(),$sql )){
            $user=mysqli_fetch_assoc($result);
            if($user){
                session_start();
                $_SESSION['id']= $user['id'];
                $_SESSION['name']= $user['name'];

                header('Location: index.php');
            }else{
                header('Location: login.php');
            }
        }else{
            die(mysqli_error($this->dbConn()));
        }
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location: login.php');
    }

}