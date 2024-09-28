<?php
// Include the database connection
require 'dbconnection.php';

// Fetch all orders (without filtering by driverId)
$sql = "SELECT orderId, orderStatus FROM orders";
if ($stmt = $conn->prepare($sql)) {
    $stmt->execute();
    $stmt->bind_result($orderId, $orderStatus);

    // Loop through the results and output them into the table
    while ($stmt->fetch()) {
        echo "<tr id='delivery-$orderId'>
                <td>$orderId</td>
                <td>
                    <select class='status-select' id='status-$orderId'>
                        <option value='Pending' " . ($orderStatus == 'Pending' ? 'selected' : '') . ">Pending</option>
                        <option value='Delivered' " . ($orderStatus == 'Delivered' ? 'selected' : '') . ">Delivered</option>
                    </select>
                </td>
                <td><button class='btn update-btn' onclick=\"updateStatus('$orderId', this)\">Update</button></td>
              </tr>";
    }

    $stmt->close();
}

// Handle status update when the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];
    $newStatus = $_POST['newStatus'];

    // Corrected query to update orderStatus and use orderId
    $sql = "UPDATE orders SET orderStatus = ? WHERE orderId = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $newStatus, $orderId);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
    }
}

$conn->close(); // Closing the database connection
?>
