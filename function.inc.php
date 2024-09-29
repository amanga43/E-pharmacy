<?php

function emptyInputLogin($email, $password) {
  // Check if any fields are empty
  if (empty($name) || empty($password)) {
      return true; // Empty input
  } else {
      return false;
  }
}

function uidExist($conn, $email) {
  // Correct column names for checking username and email
  $sql = "SELECT * FROM customer WHERE  custEmail= ?;";
  $stmt = mysqli_stmt_init($conn);
  
  if (!mysqli_stmt_prepare($stmt, $sql)) { 
      header("location: /E-pharmacy/signup.php?error=stmtfailed");
      exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  
  if ($row = mysqli_fetch_assoc($resultData)) {
      return $row; // Return the row if user exists
  } else {
      return false; // No user found
  }

  mysqli_stmt_close($stmt);
}

// If the user is not admin, supplier, or driver, check for customer in database
function loginUser($conn, $email, $password){
  $uidExist = uidExist($conn,$email);

  if( $uidExist === false){
    header("location: /E-pharmacy/login.php?error=wronglogin");
    exit();
  }
  
  $pwdHashed = $uidExists["custpassword"];
  $checkPwd = password_verify($password, $pwdHashed);

  if ($checkPwd === false) {
    header("location: /E-pharmacy/login.php?error=wronglogin");
    exit();
}else if($checkPwd === true){
  session_start();
  $_SESSION['custid'] = $uidExists["custId"];
  $_SESSION['custuid'] = $uidExists["custName"];

  header("location: /E-pharmacy/home-page.php");
  exit();
}
  
}
