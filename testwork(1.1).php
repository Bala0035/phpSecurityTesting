<script>
  var name = "hii";
</script>

<?php
  $value = null;
  ob_start();
?>
<script>
  <?php
    echo "var name = ";
    echo json_encode('<script>document.writeln(name);</script>');
  ?>
</script>
<?php
  $scriptContent = ob_get_clean();
  $pattern = '/var name = (.*?);/i';
  preg_match($pattern, $scriptContent, $matches);
  $value = isset($matches[1]) ? trim($matches[1], "'\" ") : '';

  echo $value;  // Output: 'hii'
?>
