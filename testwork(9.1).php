<?php
function myFunction($param) {
    // PHP code here
    return "Hello from PHP function with parameter: " . $param;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['function']) && isset($_POST['param'])) {
    $function = $_POST['function'];
    $param = $_POST['param'];

    if ($function == 'myFunction') {
        $result = myFunction($param);
        echo $result;
        exit;
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
            var param = 'Your parameter value';

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    console.log(response);
                    alert("Success: " + response);
                }
            };
            xhttp.open("POST", "", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("function=myFunction&param=" + encodeURIComponent(param));
        }
    </script>
</body>
</html>
