<?php
require 'dbconnection.php'; // Include your database connection

// Assuming you have the driver's ID stored in the session or passed via POST
$driverId = 1; // You can replace this with session logic

// Check if the form is submitted for updating details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_account'])) {
    // Fetch new details from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Update query for the driver's details
    $sql = "UPDATE drivers SET name = ?, age = ?, email = ?, contact = ? WHERE driver_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sissi", $name, $age, $email, $contact, $driverId);
        if ($stmt->execute()) {
            echo "<script>alert('Details saved successfully!');</script>";
        } else {
            echo "<script>alert('Failed to update details!');</script>";
        }
        $stmt->close();
    }
}

// Check if the form is submitted for deleting the account
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    // Deletion query
    $sql = "DELETE FROM drivers WHERE driver_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $driverId);
        if ($stmt->execute()) {
            echo "<script>alert('Account deleted successfully!');</script>";
            // Optionally redirect to another page after deletion
            header("Location: goodbye.php");
            exit();
        } else {
            echo "<script>alert('Failed to delete account!');</script>";
        }
        $stmt->close();
    }
}

$conn->close(); // Close the database connection
?>
