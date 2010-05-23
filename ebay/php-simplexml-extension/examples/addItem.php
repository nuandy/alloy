<?php
  require_once '../classes/AddItem.php';
  $add_item_array = new AddItem();
  foreach ($add_item_array->response() as $key => $value) {
    echo "<p>". $key . ": " . $value;
  }
?>
