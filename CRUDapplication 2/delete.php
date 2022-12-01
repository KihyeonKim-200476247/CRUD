<?php
include "dbase.php";

$id = $_GET['id'];
$sql = "DELETE FROM ftable WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result){
  header("Location: addnew.php?msg=Record deleted successfully");
}
else{
  echo "Failed: " . mysqli_error($conn);
}
?>
