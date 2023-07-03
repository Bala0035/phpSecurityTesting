<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mobileNumber = $_POST['mobile_number'];
    

    // Validate mobile number
    if (validateMobileNumber($mobileNumber)) {
        $_SESSION['mobile_number'] = $mobileNumber;
        header('Location: test2.php');
        exit();
    } else {
        $error = 'Invalid mobile number. Please enter a valid mobile number.';
    }
}

function validateMobileNumber($number) {
    // Implement your mobile number validation logic here
    // This is a basic example, you can customize it as per your requirements
    return preg_match('/^[0-9]{10}$/', $number);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mobile Number Validation</title>
</head>
<body>
    <form method="POST" action="">
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
