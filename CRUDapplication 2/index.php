<?php
require_once "dbase.php";

if(isset($_POST['submit'])){

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        if(strlen($_POST['password']) > 7){
            $database->insert($_POST);
        }
        else{
            echo "<script>alert('Password must be atleast 8 characters long!!')</script>";
        }
    }
    else{
        echo "<script>alert('invalid email')</script>";
    }
}
?>

<!DOCTYPE html>
<!---->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application</title>
  <!--Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@500&family=Rubik+Distressed&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!--CSS-->
   <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!--HEADER-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01"
          aria-expanded="false"
          aria-label="Toggle navigation" >
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <a href="login.php" class="imge-logo-location">
              <img class="imge-logo" src="./img/logo-1.webp" alt="header-logo"></a>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--MAIN-->
 
    <div class="container mt-5">
      <div class="text-center">
        <h1 class="display-5 mb-5"><strong> CRUD Application</strong></h1>
        <p> Click Logo If you have account<p>
      </div>
      <div class="main row justify-content-center">
        <!--FORM-->
        <form action="" method="post"id="student-form" class="row justify-content-center mb-4">
          <div class="col-10 mb-3">
            <label for="firstname">First Name</label>
            <input class="form-control" id="firstName" name="fname" type="text" placeholder="Enter First Name">
          </div>
          <div class="col-10 mb-3">
            <label for="lastname">Last Name</label>
            <input class="form-control" id="lastname"  name="lname" type="text" placeholder="Enter Last Name">
          </div>
          <div class="col-10 mb-3">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email"  type="email" placeholder="Email@gmail.com">
          </div>
        <div class="col-10 mb-3">
            <label for="email">Password</label>
            <input class="form-control" id="password" name="password"  type="password" placeholder="Password">
        </div>
          <div class="col-10 mb-3">
            <label for="bio">A BIO</label>
            <input class="form-control" id="bio"  name="bio" type="text" placeholder="Enter Bio">
          </div>
          <div class="col-10">
            <input class="btn btn-success add-btn"  name="submit" type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>

</body>

</html>

