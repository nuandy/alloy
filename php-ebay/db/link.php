<?php
class connect_DB {
  var $link;
  function link_open() {
	  $this->link = mysql_connect('server', 'username', 'password');
    if (!$this->link) {
      die('Could not connect: ' . mysql_error());
    }
		mysql_select_db('cart');
	}
	function link_close() {
    mysql_close($this->link);
  }
}
?>
