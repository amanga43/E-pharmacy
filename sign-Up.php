<?php
session_start(); 
require 'dbconnection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fullName = $_POST['Name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirmPassword'];

    
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    
    $sql = "INSERT INTO customer (custName, dob, gender, custPhoneNumber, custEmail, custAddress, custPassword) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    
    if ($insertCustomerStatement = $conn->prepare($sql)) {
        
        $insertCustomerStatement->bind_param("sssssss", $fullName, $dob, $gender, $phone, $email, $address, $password);

        
        if ($insertCustomerStatement->execute()) {
            $_SESSION['custId'] = $conn->insert_id; 
            echo "<script>alert('Registration successful!'); window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Error: Could not execute query.'); window.history.back();</script>";
        }

        
        $insertCustomerStatement->close();
    } else {
        echo "<script>alert('Error: Could not prepare the statement.'); window.history.back();</script>";
    }

    
    $conn->close();
}
?>
