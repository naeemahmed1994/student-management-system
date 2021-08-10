<?php
require 'Classes/Student.php';
$student=new Student;
$message="";

$data=$student->editStudentInfo($_GET['id']);
$result=mysqli_fetch_assoc($data);
// echo '<pre>';
// print_r($result);
if(isset($_POST['btn'])){
    $student->updateStudentInfo($_GET['id']);
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
        </div>
  </nav> 
      <div class="container">
          <div class="row">
              <div class="col-md-6 m-auto">
                  <?php if($message) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $message; ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <?php } ?>
                  <h2 class="text-center">Edit Student Info</h2>
                    <form method="post">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>" >
                            
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address"><?php echo $result['address'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="1" <?php echo $result['gender']== 1 ? "selected": "" ?>>Male</option>
                                <option value="2"<?php echo $result['gender']== 2 ? "selected": "" ?>>Female</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                    </form>

              </div>

          </div>
      </div>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

   
  </body>
</html>