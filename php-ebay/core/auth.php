<?php require_once('includes/keys.php') ?>
<?php require_once('includes/eBaySession.php') ?>

<?php
$RuName = "Andy_Nu-AndyNu8d7-9b52--ncjfbhfz";
$siteID = 0;
$verb = 'GetSessionID';
$requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBody .= '<GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
$requestXmlBody .= "<Version>$compatabilityLevel</Version>";
$requestXmlBody .= "<RuName>$RuName</RuName>";
$requestXmlBody .= '</GetSessionIDRequest>';
		
//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
//send the request and get response
$responseXml = $session->sendHttpRequest($requestXmlBody);
if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
die('<P>Error sending request');
//Xml string is parsed and creates a DOM Document object
$responseDoc = new DomDocument();
$responseDoc->loadXML($responseXml);
$responses = $responseDoc->getElementsByTagName("GetSessionIDResponse");
foreach ($responses as $response)
{
$acks = $response->getElementsByTagName("Ack");
$ack   = $acks->item(0)->nodeValue;
echo "Ack = $ack <BR />\n";   // Success if successful
$SessionIDs = $response->getElementsByTagName("SessionID");
$SessionID   = $SessionIDs->item(0)->nodeValue;
}
?>