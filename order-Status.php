<?php
// Include the database connection
require 'dbconnection.php';

// Fetch the order ID from the request (e.g., from a session or a GET parameter)
$orderId = 1; // Replace this with the actual order ID based on your logic
$orderDetails = [];

// Prepare the SQL statement to fetch order details
$sql = "SELECT orderId, orderDate, orderStatus FROM orders WHERE orderId = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $stmt->bind_result($orderId, $orderDate, $orderStatus);
    
    if ($stmt->fetch()) {
        $orderDetails = [
            'orderId' => $orderId,
            'orderDate' => $orderDate,
            'orderStatus' => $orderStatus
        ];
    } else {
        // Handle the case where no order was found
        $orderDetails = [
            'orderId' => 'Not Found',
            'orderDate' => '',
            'orderStatus' => 'Not Found'
        ];
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Failed to prepare SQL statement.');</script>";
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <link rel="stylesheet" href="order-status.css"> <!-- Add your CSS file -->
</head>
<body>
    <div class="orderStatus-container">
        <h2>Order Status</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <td><?php echo htmlspecialchars($orderDetails['orderId']); ?></td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td><?php echo htmlspecialchars($orderDetails['orderDate']); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo htmlspecialchars($orderDetails['orderStatus']); ?></td>
            </tr>
        </table>
        <div class="orderStatus-message">
            <h3>Status: <?php echo htmlspecialchars($orderDetails['orderStatus']); ?></h3>
        </div>
        <button onclick="goBack()">Back to Dashboard</button>
    </div>

    <script>
        function goBack() {
            window.history.back(); // Navigate to the previous page
        }
    </script>
</body>
</html>

