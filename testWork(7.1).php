<?php
session_start();
$_SESSION['mobileNumber'] = "mobileNumber1234";
function myFunction() {
    // PHP code here
    return "Hello from PHP function! " . $_SESSION['mobileNumber'];
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    if ($function == 'myFunction') {
        $result = myFunction();
        echo json_encode(['success' => true, 'message' => $result]);
        exit; // Stop further execution after invoking the function
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calling PHP Function with JavaScript</title>
</head>
<body>
    <button onclick="callPHPFunction()">Invoke PHP Function</button>

    <script>
        function callPHPFunction() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.success) {
                        console.log(response.message);
                        alert(response.message); // Display success message
                    } else {
                        console.error(response.message);
                        alert('Function call failed'); // Display error message
                    }
                }
            };
            xhttp.open("GET", "?function=myFunction", true);
            xhttp.send();
        }
    </script>
</body>
</html>
