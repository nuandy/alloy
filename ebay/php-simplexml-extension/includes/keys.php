<?php
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $siteID = 0;
    $RuName = "Andy_Nu-AndyNu8d7-9b52--ncjfbhfz";
    $production = true;   // toggle to true if going against production
    $compatabilityLevel = 551;    // eBay API version

    if ($production) {
        $devID = 'U7P65SNTQNFT9EJGN89921L966CKDV';   // these prod keys are different from sandbox keys
        $appID = 'AndyNu8d7-9b52-4508-b820-b077840ac1a';
        $certID = '0cc07fab-50da-4327-bece-f373bd480b91';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**+4v4Sw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJloOlDJSCpg2dj6x9nY+seQ**0VYAAA**AAMAAA**LFSAGTpMQkB92KzpV7a8//v9k+xB8jmSiHk0xe2oq9LJnuB0kXMiFjhC+vpXtsF0ChEkiTjUxbiE5qsNM0OfqF74DJ5QgJIkAo11ewMLCRwf6BAUgpWndcdYmwyCrU26w/JK4uDHCIqSXhxcQ03/qvP9gqy+Z5EyVFPjAbM4NzTu+erbnwIlPhvNSY69blKrN/wZv/XgJBte6l1HY+TOdY/EpMgMbJL1v0ELj+85tPEfUAa789MRjDg8xFxvxde1DGtA6WjI5qZwruD2xz0mAlXvHorECsQtUG+e8F5G2gLcIfmoZEVSqetI9nnoQVTTbZPuAtOBs7Vf31xCZZzCKn0nmNrr2e4UYY6TdDBSbN4PWluFu9rvxOIM/gxVanA8zl7i/X9QJ/A9IsSl5e7auTlEc2T6PNd3gWnRRXDc2PBt7r/BAK0XX5CeVkn5qRJbbHNA9e3VWhzdPdASDh5k3LBLa8j6RiActEmeZA4XIX3Aa9A7j6CebSzVjdR/fOVSBGshaIlqSzvgoEG8WFNFlmYP4Q1F7Fc2habpyOM9SYbcyWsyWMcN5VEXjLSaj83SfmiLSfE1UnV/t805Tt0OY9HNwrDMqbbT77oJ7IYaew0U5IJvbJ4KH3beuc8AgDjRt1Xv4Yh46WbC3D5mZeZGpe31snim1/8AYCxkLLu3dt8YPw5NwyKP16JkG8l8FLABJ5EQWNcjpKvbe86nzF/Yb2DsKDh7+rPHT2Fe30Tjiw69C6uk+6fiECiA/sqMB2oU';
    } else {  
        // sandbox (test) environment
        $devID = 'YOUR EBAY SANDBOX DEV KEY';         // insert your devID for sandbox
        $appID = 'YOUR EBAY SANDBOX APP KEY';   // different from prod keys
        $certID = 'YOUR EBAY SANDBOX CERT KEY';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'YOUR EBAY SANDBOX USER TOKEN';                 
    }
?>
