<?php
include "dbase.php";
$id = $_GET['id'];
//GET ID
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $bio = $_POST['bio']; 

    $sql = "UPDATE `ftable` SET `fname`='$fname',
    `lname`='$lname',`email`='$email',`bio`=' $bio' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: addnew.php?msg=Data updated succesfully");
    }else{
      echo "Failed:". mysqli_error($conn);
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
            <a href="addnew.php" class="imge-logo-location">
              <img class="imge-logo" src="./img/logo-1.webp" alt="header-logo"></a>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
    <div class="container mt-5">
      <div class="text-center">
        <h1 class="display-5 mb-5"><strong>Edit User Information</strong></h1>
        <p> Click update after changing any information</p>
      </div>
         <!--call the database for editing-->
    <?php
    
    $sql = "SELECT * FROM ftable WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <!--FORM (fname, lname, email, bio)-->
      <div class="main row justify-content-center">
        <form action="" method="post"id="student-form" class="row justify-content-center mb-4">
          <div class="col-10 mb-3">
            <label for="firstname">First Name</label>
            <input class="form-control" id="firstName" name="fname" type="text" 
            value="<?php echo $row ['fname'] ?> "> 
          </div>
          <div class="col-10 mb-3">
            <label for="lastname">Last Name</label>
            <input class="form-control" id="lastname"  name="lname" type="text"
            value="<?php echo $row ['lname'] ?> "> 
          </div>
          <div class="col-10 mb-3">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email"  type="email"
            value="<?php echo $row ['email'] ?> "> 
          </div>
          <div class="col-10 mb-3">
            <label for="inputlg">A BIO</label>
            <input class="form-control" id="inputlg"  name="bio" type="text"
            value="<?php echo $row ['bio'] ?> "> 
          </div>
          <div class="col-10">
            <button type="submit"  class="btn btn-success add-btn" value="Submit" name="submit">
              Update </button>
              <a href ="addnew.php " class ="btn btn-danger">Cancel</a>  
          </div>
        </form>
      </div>
    </div>

</body>

</html>

