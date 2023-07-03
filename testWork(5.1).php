<?php
session_start();
$_SESSION['mobileNumber'] = "mobileNumber";

// // Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve the mobile number from the form
//     $mobileNumber = $_POST['mobileNumber'];

//     // Validate the mobile number using JavaScript
//     if (!preg_match('/^\d{10}$/', $mobileNumber)) {
//         echo "Please enter a valid 10-digit mobile number.";
//         exit;
//     }

//     // Store the mobile number in a session variable
//     $_SESSION['mobileNumber'] = $mobileNumber;

//     // Redirect to the next page
//     header('Location: testWork(5.2).php');
//     exit;
// }
// ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mobile Number Validation</title>
    <script type="text/javascript">
        function validateForm() {
            
            var mobileNumber = document.getElementById("mobileNumber").value;
            
        // $_SESSION["mobileNumber"] = "Welcome Mamu";
        // $_SESSION['mobileNumber'] = "mobileNumber23";
            

            // Perform JavaScript validation
            if (!mobileNumber.match(/^\d{10}$/)) {
                alert("Please enter a valid 10-digit mobile number.");
                return false;
            }
        //     else{
        //         var username = '12234';
        //         alert(username );
        //     }
        }
    </script>
</head>
<body>
    <form onsubmit="return validateForm();">
        <label for="mobileNumber">Mobile Number:</label>
        <input type="text" id="mobileNumber" name="mobileNumber" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
