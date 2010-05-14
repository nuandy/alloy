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
        $devID = 'U7P65SNTQNFT9EJGN89921L966CKDV';   // these prod keys are different from sandbox keys
        $appID = 'AndyNu8d7-9b52-4508-b820-b077840ac1a';
        $certID = '0cc07fab-50da-4327-bece-f373bd480b91';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = $contents;
    } else {  
        // sandbox (test) environment
        $devID = 'U7P65SNTQNFT9EJGN89921L966CKDV';         // insert your devID for sandbox
        $appID = 'ANDYNUK1TS9NI4YI862DM76P19HDM3';   // different from prod keys
        $certID = 'O71X14MKCFS$P9G5LIY48-675F23YB';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = $contents;                 
    }
    
    
?>