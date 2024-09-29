<?php
require './includes/db_connection.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $id = $_POST['id'];
  $status = $_POST['status'];

  $query = "UPDATE prescriptions SET status = '$status' WHERE id = '$id' ";

  if(mysqli_query($con,$query)){
    header('Location: admin-view-pres.php');
  } else {
    echo "Error updating record: " . mysqli_error($con);
}
}
$con->close();
?>