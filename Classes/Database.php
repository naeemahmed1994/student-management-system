<?php
class Database{
    protected function dbConn(){
        $hostname='localhost';
        $username='root';
        $password='';
        $dbname='student_info';

        $link= mysqli_connect($hostname,$username,$password,$dbname);
        return $link;
    }
}