<?php require_once('includes/keys.php') ?>
<?php require_once('includes/eBaySession.php') ?>
<?php
  if(isset($_POST['listingType'])) {
    //Get the item entered
    $listingType = $_POST['listingType'];
    $primaryCategory = $_POST['primaryCategory'];
    $itemTitle = $_POST['itemTitle'];
    $itemDescription = $_POST['itemDescription'];
    $pictureURL = $_POST['pictureURL'];
    $listingDuration = $_POST['listingDuration'];
    $startPrice = $_POST['startPrice'];
    $buyItNowPrice = $_POST['buyItNowPrice'];
    $quantity = $_POST['quantity'];
    if ($listingType == 'StoresFixedPrice') {
      $buyItNowPrice = 0.0;   // don't have BuyItNow for SIF
      $listingDuration = 'GTC';
    }
    if ($listingType == 'Dutch') {
      $buyItNowPrice = 0.0;   // don't have BuyItNow for Dutch
    }
    //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
	$siteID = 0;
	$verb = 'AddItem';
	
	//Build the request Xml string
	$requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
	$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
	$requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
	$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
	$requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
	$requestXmlBody .= "<Version>$compatabilityLevel</Version>";
	$requestXmlBody .= '<Item>';
	$requestXmlBody .= '<Site>US</Site>';
	$requestXmlBody .= '<PrimaryCategory>';
	$requestXmlBody .= "<CategoryID>$primaryCategory</CategoryID>";
	$requestXmlBody .= '</PrimaryCategory>';
	$requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">$buyItNowPrice</BuyItNowPrice>";
	$requestXmlBody .= '<Country>US</Country>';
	$requestXmlBody .= '<Currency>USD</Currency>';
	$requestXmlBody .= "<ListingDuration>$listingDuration</ListingDuration>";
    $requestXmlBody .= "<ListingType>$listingType</ListingType>";
	$requestXmlBody .= '<Location><![CDATA[New York, NY]]></Location>';
	$requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
    $requestXmlBody .= '<PayPalEmailAddress>sales@betatoys.com</PayPalEmailAddress>';
	$requestXmlBody .= "<Quantity>$quantity</Quantity>";
	$requestXmlBody .= '<RegionID>0</RegionID>';
	$requestXmlBody .= "<StartPrice>$startPrice</StartPrice>";
    $requestXmlBody .= "<ShippingDetails><ShippingServiceOptions><ShippingService>Other</ShippingService><ShippingServiceCost>12.0</ShippingServiceCost><ShippingServiceAdditionalCost>0.0</ShippingServiceAdditionalCost><ShippingServicePriority>1</ShippingServicePriority><ExpeditedService>false</ExpeditedService><ShippingTimeMin>1</ShippingTimeMin><ShippingTimeMax>7</ShippingTimeMax></ShippingServiceOptions></ShippingDetails>";
    $requestXmlBody .= '<DispatchTimeMax>2</DispatchTimeMax>';
    $requestXmlBody .= '<ReturnPolicy><ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption><Description>You may return the item for a full refund excluding shipping costs within 7 days, but the item box or packaging must not have been opened. Item must be in resellable condition. If there is a factory defect with the item, we can offer an exchange for the same item. Buyer is responsible for all return shipping costs. Please email us if you have additional questions regarding our return policy.</Description></ReturnPolicy>';
    $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
	$requestXmlBody .= "<Title><![CDATA[$itemTitle]]></Title>";
    $requestXmlBody .= "<PictureDetails><PictureURL><![CDATA[$pictureURL]]></PictureURL></PictureDetails>";
	$requestXmlBody .= "<Description><![CDATA[$itemDescription]]></Description>";
    $requestXmlBody .= '</Item>';
	$requestXmlBody .= '</AddItemRequest>';
	
	//Create a new eBay session with all details pulled in from included keys.php
    $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
		
	//send the request and get response
	$responseXml = $session->sendHttpRequest($requestXmlBody);
	if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
	  die('<P>Error sending request');
		
	//Xml string is parsed and creates a DOM Document object
	$responseDoc = new DomDocument();
	$responseDoc->loadXML($responseXml);
			
	//get any error nodes
	$errors = $responseDoc->getElementsByTagName('Errors');
		
	//if there are error nodes
	if($errors->length > 0) {
	  echo '<P><B>eBay returned the following error(s):</B>';
	  //display each error
	  //Get error code, ShortMesaage and LongMessage
	  $code = $errors->item(0)->getElementsByTagName('ErrorCode');
	  $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
	  $longMsg  = $errors->item(0)->getElementsByTagName('LongMessage');
	  //Display code and shortmessage
	  echo '<P>', $code->item(0)->nodeValue, ' : ', str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
	  //if there is a long message (ie ErrorLevel=1), display it
	  if(count($longMsg) > 0)
	    echo '<BR>', str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
	} else { 
	//no errors
    //get results nodes
      $responses = $responseDoc->getElementsByTagName("AddItemResponse");
      foreach ($responses as $response) {
        $acks = $response->getElementsByTagName("Ack");
        $ack   = $acks->item(0)->nodeValue;
        echo "Ack = $ack <BR />\n";   // Success if successful
        $endTimes  = $response->getElementsByTagName("EndTime");
        $endTime   = $endTimes->item(0)->nodeValue;
        echo "endTime = $endTime <BR />\n";
        $itemIDs  = $response->getElementsByTagName("ItemID");
        $itemID   = $itemIDs->item(0)->nodeValue;
        echo "itemID = $itemID <BR />\n";
        $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item=";
        echo "<a href=$linkBase" . $itemID . ">$itemTitle</a> <BR />";
        $feeNodes = $responseDoc->getElementsByTagName('Fee');
        foreach($feeNodes as $feeNode) {
          $feeNames = $feeNode->getElementsByTagName("Name");
          if ($feeNames->item(0)) {
            $feeName = $feeNames->item(0)->nodeValue;
            $fees = $feeNode->getElementsByTagName('Fee');
            $fee = $fees->item(0)->nodeValue;
            if ($fee > 0.0) {
              if ($feeName == 'ListingFee') {
                printf("<B>$feeName : %.2f </B><BR>\n", $fee); 
              } else {
                printf("$feeName : %.2f <BR>\n", $fee);
              }      
            }
          }
        }
      }
    }
  }
?>
