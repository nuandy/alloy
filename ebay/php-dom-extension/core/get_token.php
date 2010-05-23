<?php require_once('includes/keys.php') ?>
<?php require_once('includes/eBaySession.php') ?>

<?php
if (isset($_COOKIE["AuthTokenDude"])) {
  $SessionID = $_COOKIE["AuthTokenDude"];
} else {
  $SessionID = $_GET["my_session"];
}
$verb = 'FetchToken';
$siteID = 0;
$requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBody .= '<FetchTokenRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
$requestXmlBody .= "<Version>$compatabilityLevel</Version>";
$requestXmlBody .= "<SessionID>$SessionID</SessionID>";
$requestXmlBody .= '</FetchTokenRequest>';

//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
//send the request and get response
$responseXml = $session->sendHttpRequest($requestXmlBody);
if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
die('<P>Error sending request');
//Xml string is parsed and creates a DOM Document object
$responseDoc = new DomDocument();
$responseDoc->loadXML($responseXml);

$responses = $responseDoc->getElementsByTagName("FetchTokenResponse");
foreach ($responses as $response)
{
$acks = $response->getElementsByTagName("Ack");
$ack   = $acks->item(0)->nodeValue;
$Tokens = $response->getElementsByTagName("eBayAuthToken");
$Token   = $Tokens->item(0)->nodeValue;
}

$filename = 'core/includes/user_token.php';
$somecontent = $Token;

if (strlen($somecontent)>0) {
  setcookie("AuthTokenDude", $SessionID);
}

// Let's make sure the file exists and is writable.
if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

    echo "Success, wrote ($somecontent) to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}

?>
