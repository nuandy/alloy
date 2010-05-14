<?php require_once('core/auth.php') ?>

<h1>
  Step 1: Grant application access
</h1>

<?php
  echo "<INPUT TYPE=submit NAME=AUTHORIZE VALUE=Authorization onclick=window.open('https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&RuName=$RuName&SessID=$SessionID')>";
?>

<h2>
  You must log into eBay and authorize a link to our application before you can proceed to the next step.
</h2>  

<h1>
  Step 2: Proceed to use application
</h1>

<?php
  echo "<a href=\"item.php?my_session=".$SessionID."\">Have Fun!</a>"
?>