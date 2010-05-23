<?php
  require_once '../classes/GetSessionID.php';
  $get_session_id_array = new GetSessionID();
  foreach ($get_session_id_array->response() as $key => $value) {
    echo "<p>". $key . ": " . $value;
  }
?>
