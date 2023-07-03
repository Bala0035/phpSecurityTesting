<?php
session_start();

if (!isset($_SESSION['mobile_number'])) {
    header('Location: index.php');
    exit();
}

$mobileNumber = $_SESSION['mobile_number'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Mobile Number</title>
</head>
<body>
    <h1>Your Mobile Number:</h1>
    <p><?php echo $mobileNumber; ?></p>
</body>
</html>
