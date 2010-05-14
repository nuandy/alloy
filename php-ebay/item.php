<!-- Authored by Andy Nu - nuandy@gmail.com -->

<?php require_once('ebay/keys.php') ?>
<?php require_once('ebay/eBaySession.php') ?>
<?php require_once('ebay/session.php') ?>
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
      <form action="send.php" method="post" name="add_item">
        <p>
	  <label for="Listing Type">Listing Type</label>
	  <select name="listingType">
	    <option selected value="Chinese">Default Auction</option>
	    <option value="Dutch">Dutch Auction</option>
	    <option value="FixedPriceItem">Buy it Now</option>
	    <option value="StoresFixedPrice">Store Inventory</option>
	  </select>
	</p>
	<p>
	  <label for="Category">Category</label>
	  <select name="primaryCategory">
	    <option value="19198">Default Toy Category</option>
	  </select>
	</p>
	<p>
	  <label for="Title">Title</label>
	  <input type="text" name="itemTitle" value="" size=55 maxlength=55>
	</p>
	<p>
	  <label for="Picture">Picture</label>
	  <input type="text" name="pictureURL" value="" size=60>
	</p>
	<p>
	  <label for="Duration">Duration</label>
	  <select name="listingDuration">
	    <option value="Days_1">1 day</option>
	    <option value="Days_3">3 days</option>
	    <option value="Days_5">5 days</option>
	    <option value="Days_7">7 days</option>
	  </select>
	</p>
	<p>
	  <label for="Start Price">Start Price</label>
	  <input type="text" name="startPrice" value="" size=8 maxlength=8>
	</p>
	<p>
	  <label for="Buy It Now Price">Buy It Now Price</label>
	  <input type="text" name="buyItNowPrice" value="" size=8 maxlength=8>
	</p>
	<p>
	  <label for="Quantity">Quantity</label>
	  <input type="text" name="quantity" value="1">
	</p>
        <p class="iconPanel" style="padding:2px;">
	  <a href="#" onclick="return format('b', '')" accesskey="b"><img src="images/icons/bold.gif" alt="Bold" title="Bold" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return format('i', '')" accesskey="i"><img src="images/icons/italic.gif" alt="Italic" title="Italic" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return format('u', '')" accesskey="u"><img src="images/icons/underline.gif" alt="Underline" title="Underline" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return format('LEFT', '')"><img src="images/icons/justifyleft.gif" alt="Align left" title="Align left" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return format('CENTER', '')"><img src="images/icons/justifycenter.gif" alt="Align center" title="Align center" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return format('RIGHT', '')"><img src="images/icons/justifyright.gif" alt="Align right" title="Align right" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return dolist()"><img src="images/icons/insertunorderedlist.gif" alt="Add list item" title="Add list item" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="namedlink('URL')"><img src="images/icons/createlink.gif" alt="Add hyperlink" title="Add hyperlink" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="namedlink('mailto:')"><img src="images/icons/email.gif" alt="Add email link" title="Add email link" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return insertCustomHtml( '&lt;br />\n' )"><img src="images/icons/code.gif" alt="New line" title="New line" width=21 height=20 border=0 /></a>
	  <a href="#" onclick="return preview()">Preview|</a>
	  <a href="#" onclick="return alter_box_height('itemDescription',100)">Plus|</a>
	  <a href="#" onclick="return alter_box_height('itemDescription',-100)">Minus</a>
	</p>
        <p>
	  <label for="Description">Description</label>
	  <textarea name="itemDescription" id="itemDescription" style="width:380px;height:100px">Please describe your item and feel free to use HTML.</textarea>
	</p>
	<p class="formButton">
	  <input type="submit" value="Send Item">
	</p>
      </form>
    </fieldset>
</body>
</html>
