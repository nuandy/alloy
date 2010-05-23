<?php
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production = true;   // toggle to true if going against production
    $compatabilityLevel = 551;    // eBay API version
    
    $filename = "http://".$_SERVER['SERVER_NAME']."/core/includes/user_token.php";
    $contents = file_get_contents($filename);

    if ($production) {
        $devID = 'YOUR EBAY PRODUCTION DEV KEY';   // these prod keys are different from sandbox keys
        $appID = 'YOUR EBAY PRODUCTION APP KEY';
        $certID = 'YOUR EBAY PRODUCTION CERT KEY';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = $contents;
    } else {  
        // sandbox (test) environment
        $devID = 'YOUR EBAY SANDBOX DEV KEY';         // insert your devID for sandbox
        $appID = 'YOUR EBAY SANDBOX APP KEY';   // different from prod keys
        $certID = 'YOUR EBAY SANDBOX CERT KEY';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = $contents;                 
    }
?>
