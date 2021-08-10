<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:index.php');
}

require "Classes/user.php";
$users= new User();
if(isset($_POST['btn'])){
    $users->adminLoginCheck();
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
      <div class="container">
          <div class="row">
                <div class="col-md-6 m-auto pt-5">
                    <div class="card">
                        <div class="card-header bg-info text-center text-white">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="btn">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
          </div>
      </div>

  </body> 
  </html>
