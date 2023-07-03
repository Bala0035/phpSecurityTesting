<?php
session_start();


if (!isset($_SESSION['csrf_token'])) {
    // Generate CSRF token
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));    
}

//  CSRF token length
$_SESSION['csrf_token_Length'] =strlen($_SESSION['csrf_token']);

// import Encryption
require_once('Encryption.php');
$encryption = new Encryption();

//userID Encryption
$_SESSION['userID'] = $encryption->encrypt("123");


// Validate CSRF token
function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        // Invalid token, handle the error (e.g., redirect, show an error message)
        die("CSRF validation failed.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    $csrfToken = $_POST['csrf_token'] ?? '';
    validateCSRFToken($csrfToken);

    // Process the form data
    // ... your code here ...
}
?>

<!-- HTML form with CSRF token -->
<form action="process_form1.php" method="POST">
    <!-- Add CSRF token as a hidden field -->
     <!--post csrf_token with userID -->
     <!-- . $_SESSION['userID'] -->
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] . $_SESSION['userID']  ?>">

    <!-- Other form fields -->
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
    <?php $_SESSION['userID']  ?>
</form>
