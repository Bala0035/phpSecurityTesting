<!DOCTYPE html>
<html>
<head>
  <title>JavaScript to PHP Example</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
  $(document).ready(function() {
    // Function to handle the button click event
    $("#myButton").click(function() {
      // var valueToPass = "Hello, PHP!"; // The value you want to pass to PHP
      
      // // AJAX request to the PHP script
      // $.ajax({
      //   type: "POST",
      //   url: "testwork(6.1).php", // The same PHP file
      //   data: { value: valueToPass }, // Send the value as "value" parameter
      //   success: function(response) {
      //     // Handle the response from PHP
      //     console.log(response);
        // }
      // });

      var value = "Hello PHP!"; // The value you want to pass to PHP

var xhr = new XMLHttpRequest();
xhr.open("POST", "testwork(6.2).php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    console.log(xhr.responseText); // Response from PHP
  }
};
xhr.send("value=" + value); // Send the value to PHP
    });
  });
</script>

<?php
// Check if the value is received from JavaScript
if (isset($_POST['value'])) {
  $valueFromJS = $_POST['value'];
  echo "Value received from JavaScript: " . $valueFromJS;
}
?>

<button id="myButton">Click Me</button>

</body>
</html>

<?php

?>
<!-- <!DOCTYPE html>
<html>
<head>
  <title>Passing Value to PHP</title>
</head>
<body>
  <script>
    var value = "Hello PHP!"; // The value you want to pass to PHP

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "testwork(6.2).php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText); // Response from PHP
      }
    };
    xhr.send("value=" + value); // Send the value to PHP
  </script>
</body>
</html> -->
