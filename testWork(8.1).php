<?php

// session_start();

function myFunction($name) {
    $user = "<script language='JavaScript'>var n=sessionStorage.getItem('lastname');document.write(n);</script>";

//     $token2  = JWT::decode(
//         $jeton, 
//        $cle , // The signing key
//        array('HS512') 
//    );
    // $data="<html><script>document.writeln(name);</script></html>";
    $myPhpVar= $_COOKIE['myJavascriptVar'];
//    $data=  "<script language=javascript>document.write(name);</script>";
    $_SESSION['Balatoken']=$myPhpVar;
    // $sessionValue = $_SESSION['userID'];
    // echo "<script>document.writeln(name);</script>";
    if ($_SESSION['Balatoken']=='bala') {
    
       header('Location:testWork(8.2).php');}
    
    // PHP code here
    $message = "Hello, $name! This message is from the PHP function.";
    return $message;
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    if ($function == 'myFunction') {
        $name = $_GET['name']; // Get the parameter value
        $result = myFunction($name);
        // echo $result;
        // exit; // Stop further execution after invoking the function
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calling PHP Function with JavaScript</title>
</head>
<body>
    <input type="text" id="nameInput" placeholder="Enter your name">
    <button onclick="callPHPFunction()">Invoke PHP Function</button>

    <script>
        function callPHPFunction() {
            <?php

session_start();
// $.session.set('username', 'test');
?>
         

            var name = document.getElementById("nameInput").value;
            sessionStorage.setItem("lastname", document.getElementById("nameInput").value);
           document.cookie = "myJavascriptVar = " +  sessionStorage.getItem("lastname");

           localStorage.setItem('userID', '1');
           localStorage.setItem('jeton', 'toto');
    localStorage.setItem('cle', 'l1s7T4O7p79XDS9UwfG4YTBhkjoybjHBydC74VxgmXk=')

    $.session.set('username', 'test');
            
            if (name === '') {
                console.log("Please enter a name.");
                return;
            }
         
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    console.log(response);
                    alert(response); // Show success message in an alert box
                }
            };
            xhttp.open("GET", "?function=myFunction&name=" + "name", true);
            xhttp.send();
        }
    </script>

</body>
</html>
