<?php
session_start();

if($_SESSION['id']===null){
    header('Location: login.php');
}

require 'Classes/Student.php';
$student=new Student;
$message="";


$result=$student->viewStudentInfo();

if(isset($_GET['delete'])){
    $message = $student->deleteStudentInfo($_GET['id']);

}
// $students= mysqli_fetch_assoc($result);
            // echo '<pre>';
            // print_r($students);

if(isset($_GET['message'])){
    $message=$_GET['message'];
}
if(isset($_POST['sbtn'])){
    $result=$student->searchStudentInfo();
    // echo '<pre>';
    // print_r($_POST);

}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addstudent.php">Add Student Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewstudent.php">View Student Info</a>
            </li>
            
            </ul>
                <form method="post" class="form-inline my-2 my-lg-0 ml-auto">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sbtn">Search</button>
                </form>
        </div>
  </nav> 
      <div class="container">
          <div class="row">
              <div class="col-md-8 m-auto">
                  <?php if($message) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $message; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <?php } ?>
                  <h2 class="text-center">Add Student Info</h2>
                  <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">SI.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            while($students= mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $students['name'] ?></td>
                                <td><?php echo $students['email'] ?></td>
                                <td><?php echo $students['phone'] ?></td>
                                <td><?php echo $students['address'] ?></td>
                                <td><?php echo $students['gender']==1?'Male': 'Female' ?></td>
                                <td>
                                    <a href="editstudent.php?id=<?php echo $students['id'] ?>" class="text-info">Edit</a>
                                    <a href="?delete&id=<?php echo $students['id'] ?>" onclick="return confirm('Are you sure?')"  class="text-danger">Delete</a>
                                </td>
                            </tr>
                          <?php } ?>  
                        </tbody>
                        </table>
              </div>

          </div>
      </div>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

   
  </body>
</html>