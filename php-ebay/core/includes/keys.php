<?php
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production = true;   // toggle to true if going against production
    $compatabilityLevel = 551;    // eBay API version
    
    $filename = "core/includes/user_token.php";
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);

    if ($production) {
        $devID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';   // these prod keys are different from sandbox keys
        $appID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
        $certID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = $contents;
    } else {  
        // sandbox (test) environment
        $devID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';         // insert your devID for sandbox
        $appID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';   // different from prod keys
        $certID = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = $contents;                 
    }
    
    
?>
