<?php
session_start();

// Check if the mobile number is stored in the session
if (isset($_SESSION['mobileNumber'])) {
    $mobileNumber = $_SESSION['mobileNumber'];
} else {
    // Redirect the user back to the previous page if the mobile number is not stored
    header('Location: testWork(5.1).php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Next Page</title>
</head>
<body>
    <h1>Mobile Number:</h1>
    <p><?php echo $mobileNumber; ?></p>
</body>
</html>
