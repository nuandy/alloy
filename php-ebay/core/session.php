<?php
  $RuName = "Andy_Nu-AndyNu8d7-9b52--ncjfbhfz";
  $siteID = 0;
  $verb = 'GetSessionID';
  $requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
  $requestXmlBody .= '<GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
  $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
  $requestXmlBody .= "<RuName>$RuName</RuName>";
  $requestXmlBody .= '</GetSessionIDRequest>';

  $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

  $responseXml = $session->sendHttpRequest($requestXmlBody);
  if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
    die('<P>Error sending request');
  $responseDoc = new DomDocument();
  $responseDoc->loadXML($responseXml);

  $responses = $responseDoc->getElementsByTagName("GetSessionIDResponse");
  foreach ($responses as $response) {
    $acks = $response->getElementsByTagName("Ack");
    $ack = $acks->item(0)->nodeValue;
    echo "Ack = $ack <BR />\n";
    $SessionIDs = $response->getElementsByTagName("SessionID");
    $SessionID   = $SessionIDs->item(0)->nodeValue;
    echo "SessionID = $SessionID \n";
    echo "<INPUT TYPE=submit NAME=AUTHORIZE VALUE=AUTH onclick=window.open('https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&RuName=$RuName&SessID=$SessionID')>";
  }
?>
