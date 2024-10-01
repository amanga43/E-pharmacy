

<?php
$con = new mysqli("localhost", "root","", "pharmacydatabase", 3306);


if($con -> connect_error){
  die("Connection failed: ".$con -> connect_error);
}

?>
