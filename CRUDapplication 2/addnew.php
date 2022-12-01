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
  <link
    href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@500&family=Rubik+Distressed&display=swap"
    rel="stylesheet">
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
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
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
            <a href="index.php" class="imge-logo-location">
              <img class="imge-logo" src="./img/logo-1.webp" alt="header-logo"></a>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container mt-5">
    <div class="text-center">
      <h1 class="display-5 mb-5"><strong> CRUD Application</strong></h1>
    </div>
    <div class="main row justify-content-center">
  <!--message-->
      <div class="col-10 mt-5">
        <div class= "mb-3">
          <a href="index.php" class="btn btn-info"> Add New</a>
        </div>
        <table class="table table-striped table-dark">
          <thead class="table-dark">
            <tr>
              <th>id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>bio</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="student-list">
            <?php
             include "dbase.php";
             
               $sql = "SELECT * FROM ftable";
               $result = mysqli_query($conn, $sql);
               while  ($row = mysqli_fetch_assoc($result)){
             ?>

            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['fname'] ?></td>
              <td><?php echo $row['lname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['bio'] ?></td>

              <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm edit">Edit</a>
                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm delete">Delete</a>
              </td>
            </tr>

            <?php
               }
              ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>