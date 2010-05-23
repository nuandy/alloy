<?php require_once('core/auth.php') ?>

<h1>
PHP Add Item Example
</h1>

<?php
  if (!isset($_COOKIE["AuthTokenDude"])) {
    echo "<h1>Step 1: Grant application access</h1>";
    echo "<INPUT TYPE=submit NAME=AUTHORIZE VALUE=Authorization onclick=window.open('https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&RuName=$RuName&SessID=$SessionID')>";
    echo "<h2>You must log into eBay and authorize a link to our application before you can proceed to the next step.</h2>";  
    echo "<h1>Step 2: Proceed to use application</h1>";
    echo "<a href=\"item.php?my_session=".$SessionID."\">Have Fun!</a>";
  } else {
    echo "<a href=\"item.php?my_session=".$_COOKIE["AuthTokenDude"]."\">Have Fun!</a>";
  }
?>
