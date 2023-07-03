<?php
session_start();

// Validate CSRF token
function validateCSRFToken($token) {
    // substr($_SESSION['csrf_token'],0,$_SESSION['csrf_token_Length'])
    if ( $_SESSION['csrf_token']!==substr( $token ,0,$_SESSION['csrf_token_Length'])) {
        // Invalid token, handle the error (e.g., redirect, show an error message)
        die("CSRF validation failed.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    // echo $_POST['csrf_token'] ;
    $csrfToken = $_POST['csrf_token'] ?? '';
    validateCSRFToken($csrfToken);

    // Process the form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // ... do something with the form data ...
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";
    
require_once('Encryption.php');
$encryption = new Encryption();
    echo "userID: " . $encryption->decrypt( substr($csrfToken ,$_SESSION['csrf_token_Length']) ). "<br>";
}
?>
