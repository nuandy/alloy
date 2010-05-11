<?php
  error_reporting(E_ALL);
  //these keys can be obtained by registering at http://developer.ebay.com
  $production = true;  //toggle to true if going against production
  $compatabilityLevel = 551;  //eBay API version
  if ($production) {
        $devID = '#############################';   // these prod keys are different from sandbox keys
        $appID = '#############################';
        $certID = '#############################';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = '';   //'AgAAAA**AQAAAA**aAAAAA**Z4XISA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJloOlDJSCpg2dj6x9nY+seQ**0VYAAA**AAMAAA**eT8Kj33a+HdFR20szyHWrFsiGpW2p+gaPkmjjOS1RmXTKpgg7vdSIzt2UMI2jzip4iz3HcPCEAdwwt22ZpBVK5G/9oKrWsEoLJmcb9PYYuq2j1tNBGsvEn6hAxTOLRMJ1k/Nhv8aRi97uZxlThJQ6n9YkXye8HWKKIUeXZ/8XIpiYwwgMDa5lb6CSftOTkmFZd+RHkryNqH8hX0N6IOFk97dKghk5GrAg42C6kC3Wj5ZpMo0/YmsOi62wlOEI/RTMxtrcvVGG4hX9HiLEJF3zrFaxoZXZyTXfm6YM1w0WwArUK71pLvJlOe2d2KjDCDGs6AQjJt+hSVnWtWNySwICjuXwnF4wMT/x6aTY0bX5lGRN0nnH//EFnMR+nj411hkTFaZgzpwHZYetOvnparI6P0xSkGYIYX4n50l4pF5oalPOFSY4ek5DPeyzhX20wvVngiU7DLcHU3V8GPPgeP/AWeJkj7nHaDSEm6cfEziQg4aX+qGXTTpe6PXCqppZidjM6/Si9dkt21VPB1yUga1HQgCs+G7biY0ARF3itE+Ca37+jXxMCoqgiu2ab6kPiOIu45HqUOzYv38BixCe/Or9f1Hr7vIUK5+c4yUFbXpWSBgnTB4GPYrNOE9jLSB/WPsMIIMOwdVZbuLU8nnK3F2cmxbQY8Tr/YODNeUwROxY1Wdy2C86UVQ6EwsSM/kKTNHmjRpu1x21sUz/lnKeCmpKjBn7qaQyrGrOaakpEzURgLGiWGttKvLycfpBVdG7PeD';
    } else {  
        // sandbox (test) environment
        $devID = '#############################';         // insert your devID for sandbox
        $appID = '#############################';   // different from prod keys
        $certID = '#############################';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**Sg6eRw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJnY+lDpiBoASdj6x9nY+seQ**ZHMAAA**AAMAAA**EJnSazgzzRgeJH7BJgYUVLwYYJR4LrH+z1xXEIjhKQ39sTb2c2qhzQM/xLF2nbmrn8szRV1Zpao4WGS2W51bhKIqYOLt4hsRGpjTBf95tVx1F01oseMAI/A4x05J9HGbJ/VaaoEGfNgzU3R7OMMfLPK0aa7Mi9HPzUEk5YBTybN6mBU6N1nwBrKep0aS59T5AbtLz+E+AdRSyl9owgO2TzSKYzzvxs/hAdGzo0Yp+yfKuInuXJ4OyefAe8Egf5Wr2bj63w8bkxVV0o3MZoAj719liIyCfW3y6WD1/8lxXKXYyeqaW7kdKo/GYzJWtriKrfJ/hN5/aNOujOS5nLnfyCcVedKluLcZUCNw9Xvcs0AfyyNzhAvmIQx1xz0WHfayoiOY7oXEnJlugi/Kw00Evxk/TgWwbazTZmfKYGtGadMWO2wDP+1WEZphTkrYxXbGN4LefIW623ZqvNW7VYxgr1jmsuj3YZre1puEPeHELRW2phGZUjFkxnsYrX6S8v0K9iPoNatyEqhh231szQgVV5H7F7HFbb1QL1cybADmpwuXfcb+8uOKPyFoKm6ES5ghwLd3TqoT09w+DX+HRJ4U5YhbD/f5In0HajSMQY/d6alT4tM4wybGoxHqFseS5shPOhsklWr3Hds8FAUQJT1Llzxi0XUAde4g83wMhLWT8CAFkYP/hk4wRhtawasz7OgwHnrjgA7ztmkqZGaLjjnLD4MeUYSFcJrDXPZWjNsQ350PJay2GJu5YRMaGZ6Cf4vr';                 
    }
?>
