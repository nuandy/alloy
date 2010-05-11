<!-- Authored by Andy Nu, code cannot be distributed without prior permission from the author. -->

<?php require_once('ebay/keys.php') ?>
<?php require_once('ebay/session.php') ?>
<?php require_once('ebay/eBaySession.php') ?>
<?php require_once('ebay/send.php') ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/addItemForm.css" />
    <script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/editor.js"></script>
    <script type="text/javascript" src="js/stdedit.js"></script>
    <script type="text/javascript">
      <!--
      var normalmode = false;
      var sEditName = 'itemDescription';
      window.onload = function()  {
	      editInit( 'itemDescription' );
      }
      function preview() {
	      var imgwid = 450;
	      var imghgt = 360;
        content = ('<html><head><title></title>');
	      content += ('</head><body onload="window.focus();">');
	      content += (document.getElementById('itemDescription').value);
	      content += ('<DIV ALIGN="CENTER"><INPUT TYPE="button" VALUE="Close" onClick="javascript:window.close();"></DIV>');
	      content += ('</body></html>');
        var winl = (screen.width - imgwid) / 2;
	      var wint = (screen.height - imghgt) / 2;
	      helpWin = window.open('','help','width=' + imgwid + ',height=' + imghgt + ',resizable=0,scrollbars=0,top=' + wint + ',left=' + winl + ',toolbar=0,location=0,directories=0,status=0,menubar=0,copyhistory=0');
	      helpWin.document.write(content);
	      helpWin.document.close();
      }
      function populate(prodID) {
        document.getElementsByName("importData")[0].submit();
      }
      //-->
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Sell an item on eBay</title>
  </head>
  <body>
    <fieldset>
      <legend>Send to eBay</legend>
      <form action="item.php" method="GET" name="importData">
        <p>
	        <?php
		        echo "<select name=\"selected_productID\" onchange=\"populate(selected_productID.options[selected_productID.selectedIndex].value)\">";
		        echo "<option value=\"\">Select an item to send to eBay...</option>";
		        require("link.php");
            $link=new connect_DB;
            $link->link_open();
		        $result = mysql_query("SELECT * FROM cscart_product_descriptions prod order by product");
		        while($row = mysql_fetch_array($result)) {
  			      echo "<option value=".$row['product_id'].">".$row['product']."</option>";
  		      }
		        echo "</select>";
	        ?>
        </p>
      </form>
      <form action="send.php" method="post" name="AddItem">
        <?php
          if (isset($_GET["selected_productID"])) {
	          $pID = $_GET["selected_productID"];
	          $result = mysql_query("SELECT * FROM cscart_product_descriptions prod, cscart_product_prices pric, cscart_images imag, cscart_images_links imal WHERE prod.product_id=$pID and pric.product_id=$pID and imal.object_id=$pID and imal.detailed_id=imag.image_id");
	          while($row = mysql_fetch_array($result)) {	
		          $pID = html_entity_decode($row['product_id']);
		          $pName = html_entity_decode($row['product']);
		          $pPrice = html_entity_decode($row['price']);	
		          $pDescription = html_entity_decode($row['full_description']);	
		          $pPhoto = html_entity_decode($row['image_path']);
            }
	      echo "<p>";
	      echo "<label for=\"Listing Type\">Listing Type</label>";
	      echo "<select name=\"listingType\">";
	      echo "<option selected value=\"Chinese\">Chinese Auction</option>";
	      echo "<option value=\"Dutch\">Dutch Auction</option>";
	      echo "<option value=\"FixedPriceItem\">Buy it Now</option>";
	      echo "<option value=\"StoresFixedPrice\">Store Inventory</option>";
	      echo "</select>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Category\">Category</label>";
	      echo "<select name=\"primaryCategory\">";
	      echo "<option value=\"19198\">Default Toy Category</option>";
	      echo "</select>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Title\">Title</label>";
	      echo "<input type=\"text\" name=\"itemTitle\" value=\"$pName\" size=55 maxlength=55>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Picture\">Picture</label>";
	      echo "<input type=\"text\" name=\"pictureURL\" value=\"http://www.betatoys.com/images/detailed/$pPhoto\" size=60>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Duration\">Duration</label>";
	      echo "<select name=\"listingDuration\">";
	      echo "<option value=\"Days_1\">1 day</option>";
	      echo "<option value=\"Days_3\">3 days</option>";
	      echo "<option value=\"Days_5\">5 days</option>";
	      echo "<option value=\"Days_7\">7 days</option>";
	      echo "</select>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Start Price\">Start Price</label>";
	      echo "<input type=\"text\" name=\"startPrice\" value=\"$pPrice\" size=8 maxlength=8>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Buy It Now Price\">Buy It Now Price</label>";
	      echo "<input type=\"text\" name=\"buyItNowPrice\" value=\"$pPrice\" size=8 maxlength=8>";
	      echo "</p>";
	      echo "<p>";
	      echo "<label for=\"Quantity\">Quantity</label>";
	      echo "<input type=\"text\" name=\"quantity\" value=\"1\">";
	      echo "</p>";
          echo "<p class=\"iconPanel\" style=\"padding:2px;\">";
	      echo "<a href=\"#\" onclick=\"return format('b', '')\" accesskey=\"b\"><img src=\"images/icons/bold.gif\" alt=\"Bold\" title=\"Bold\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return format('i', '')\" accesskey=\"i\"><img src=\"images/icons/italic.gif\" alt=\"Italic\" title=\"Italic\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return format('u', '')\" accesskey=\"u\"><img src=\"images/icons/underline.gif\" alt=\"Underline\" title=\"Underline\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return format('LEFT', '')\"><img src=\"images/icons/justifyleft.gif\" alt=\"Align left\" title=\"Align left\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return format('CENTER', '')\"><img src=\"images/icons/justifycenter.gif\" alt=\"Align center\" title=\"Align center\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return format('RIGHT', '')\"><img src=\"images/icons/justifyright.gif\" alt=\"Align right\" title=\"Align right\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return dolist()\"><img src=\"images/icons/insertunorderedlist.gif\" alt=\"Add list item\" title=\"Add list item\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"namedlink('URL')\"><img src=\"images/icons/createlink.gif\" alt=\"Add hyperlink\" title=\"Add hyperlink\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"namedlink('mailto:')\"><img src=\"images/icons/email.gif\" alt=\"Add email link\" title=\"Add email link\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return insertCustomHtml( '&lt;br />\n' )\"><img src=\"images/icons/code.gif\" alt=\"New line\" title=\"New line\" width=21 height=20 border=0 /></a>";
	      echo "<a href=\"#\" onclick=\"return preview()\">Preview|</a>";
	      echo "<a href=\"#\" onclick=\"return alter_box_height('itemDescription',100)\">Plus|</a>";
	      echo "<a href=\"#\" onclick=\"return alter_box_height('itemDescription',-100)\">Minus</a>";
	      echo "</p>";
          echo "<p>";
	      echo "<label for=\"Description\">Description</label>";
	      echo "<textarea name=\"itemDescription\" id=\"itemDescription\" style=\"width:380px;height:100px\">$pDescription</textarea>";
	      echo "</p>";
	      echo "<p class=\"formButton\">";
	      echo "<input type=\"submit\" value=\"Send Item\">";
	      echo "</p>";
          }
        ?>
      </form>
    </fieldset>
</body>
</html>
