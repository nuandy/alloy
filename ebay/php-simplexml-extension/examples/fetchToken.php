<?php
  require_once '../classes/FetchToken.php';
  $fetch_token_array = new FetchToken();
  foreach ($fetch_token_array->response() as $key => $value) {
    echo "<p>". $key . ": " . $value;
  }
?>
