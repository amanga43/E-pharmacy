<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareMeds</title>
    <link rel="stylesheet" type="text/css" href="sign-Up.css">
</head>
<body>

    <header>
        <nav>
            <a href="#"><img src="images/logo.jpg" width="60px" height="60px"></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="background"></div>

    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="signUpForm" action="sign-Up.php" method="POST">
            <div class="form-group">
                <label for="Name">Full Name</label>
                <input type="text" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="radio" id="male" name="gender" value="male" required> Male
                <input type="radio" id="female" name="gender" value="female" required> Female
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" maxlength="10" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script src="sign-Up.js"></script>
</body>
</html>
////profile
<?php
session_start();
include 'dbconnection.php'; 


if (!isset($_SESSION['custId'])) {
    header("Location: login.php"); 
    exit();
}


$custId = $_SESSION['custId'];


$query = "SELECT * FROM customer WHERE custId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $custId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); 

if (!$user) {
    echo "<script>alert('No user found!'); window.location.href='sign-Up.php';</script>";
    exit();
}

if (isset($_POST['update_account'])) {
    header("Location: update.php"); 
    exit();
}


if (isset($_POST['delete_account'])) {
    $deleteQuery = "DELETE FROM customer WHERE custId = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param('i', $custId);
    
    if ($deleteStmt->execute()) {
       
        session_destroy(); 
        header("Location: login.php"); 
        exit();
    } else {
        echo "<script>alert('Failed to delete account!');</script>";
    }
}

// Update the profile in the database
$sql = "UPDATE profile SET name=?, phone=?, address=?, city=?, state=?, zip_code=?, country=?, date_of_birth=? WHERE email=?";
    
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssss", $name, $phone, $address, $city, $state, $zip_code, $country, $dob, $email);
    
    if ($stmt->execute()) {
        header("location: view_profile.php?success=edit");
        exit;
    } else {
        echo "Something went wrong. Please try again.";
    }
    
    $stmt->close();
}

$conn->close();

// Get the email of the logged-in user
$email = $_SESSION['email'];

// Prepare and execute the DELETE query
$sql = "DELETE FROM profile WHERE email = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        // Destroy session and redirect to login page
        session_destroy();
        header("location: view_profile.php?success=delete");
        exit;
    } else {
        echo "Something went wrong. Please try again.";
    }

    $stmt->close();
}


// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

    <div class="profile-container">
        <div class="profile-details">
            <h2>User Profile</h2>
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['custName']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="radio" id="male" name="gender" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?> disabled> Male
                <input type="radio" id="female" name="gender" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?> disabled> Female
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['custPhoneNumber']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['custEmail']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3" disabled><?php echo htmlspecialchars($user['custAddress']); ?></textarea>
            </div>

            <!-- Buttons below the profile details -->
            <div class="buttons">
                <button id="updateBtn">Update Account</button>
                <button id="saveBtn" disabled>Save</button>
                <button id="deleteBtn">Delete Account</button>
            </div>
        </div>

        <!-- Images at the top-right and bottom-right -->
        <div class="images">
            <img src="images/mission.jpg" alt="Profile Picture" class="profile-img-top">
            <img src="images/vision.jpg" alt="Banner" class="profile-img-bottom">
        </div>
    </div>

    <script src="profile.js"></script>
</body>
</html>