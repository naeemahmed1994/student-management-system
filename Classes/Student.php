<?php
require 'Database.php';

class Student extends Database
{
    

    public function addStudent(){
        // echo '<pre>';
        // print_r($_POST);

        // $link= mysqli_connect('localhost','root','','student_info');
        $sql= "INSERT INTO students(name,email,phone,address,gender) VALUES('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[address]','$_POST[gender]')";

        // mysqli_query($link,$sql);
        if(mysqli_query(Database::dbConn(),$sql)){
            return 'Student Info Added Succesfully';
        }else{
            die(mysqli_error($this->dbConn()));
        }
   
    }

    public function viewStudentInfo(){
        $sql= "SELECT * FROM students";

        if($result= mysqli_query(Database::dbConn(),$sql)){
            return $result;
            // $students= mysqli_fetch_assoc($result);
            // echo '<pre>';
            // print_r($students);
            
        }else{
            die(mysqli_error($this->dbConn()));
        }
           
    }

    public function deleteStudentInfo($id){
        $sql= "DELETE FROM students WHERE id=$id";
        if(mysqli_query($this->dbConn(),$sql)){
            Header('Location:viewstudent.php?message=Student Deleted successfully');
        }else{
            die(mysqli_error($this->dbConn()));
        }       
    }

    public function editStudentInfo($id){
        $sql= "SELECT * FROM students WHERE id = $id";

        if($result=mysqli_query($this->dbConn(),$sql)){
            return $result;
        }else{
            die(mysqli_error($this->dbConn()));
        }  
        // echo $id;
    }

    public function updateStudentInfo($id){
        $sql="UPDATE `students` SET name='$_POST[name]',email='$_POST[email]',phone='$_POST[phone]',address='$_POST[address]',gender='$_POST[gender]' WHERE id=$id";

        if(mysqli_query($this->dbConn(),$sql)){
            Header('Location:viewstudent.php?message=Student Updated successfully');
        }else{
            die(mysqli_error($this->dbConn()));
        } 
    }

    public function searchStudentInfo(){
        $sql="SELECT * FROM students WHERE name LIKE '%$_POST[search]%'|| email LIKE '%$_POST[search]%' ";

        if($result=mysqli_query($this->dbConn(),$sql)){
            return $result;
        }else{
            die(mysqli_error($this->dbConn()));
        }
    }
    
}
