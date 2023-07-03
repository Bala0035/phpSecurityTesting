<?php
// Intercept cookies before they are sent to the browser
function interceptCookies() {
    // Get the current cookies
    $cookies = $_COOKIE;

    // Unset or modify the cookies as needed
    // For example, to remove a specific cookie:
    unset($cookies['cookie_name']);

    // Modify the cookie expiration time to make it expire immediately:
    // setcookie('cookie_name', '', time() - 3600);

    // Set the modified cookies back in the response headers
    foreach ($cookies as $name => $value) {
        setcookie($name, $value);
    }
}

// Call the interceptor function before any output is sent to the browser
ob_start('interceptCookies');

// Your PHP code here...
?>
