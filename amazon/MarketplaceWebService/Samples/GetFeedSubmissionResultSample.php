<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebService
 *  @copyright   Copyright 2009 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2009-01-01
 */
/******************************************************************************* 

 *  Marketplace Web Service PHP5 Library
 *  Generated: Thu May 07 13:07:36 PDT 2009
 * 
 */

/**
 * Get Feed Submission Result  Sample
 */

include_once ('.config.inc.php'); 

$serviceUrl = "https://mws.amazonservices.com";

$config = array (
  'ServiceURL' => $serviceUrl,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3,
);

$service = new MarketplaceWebService_Client(
     AWS_ACCESS_KEY_ID, 
     AWS_SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);
 
$request = new MarketplaceWebService_Model_GetFeedSubmissionResultRequest();
$request->setMarketplace(MARKETPLACE_ID);
$request->setMerchant(MERCHANT_ID);
$request->setFeedSubmissionId('3270420532');
$myHandle = @fopen('php://memory', 'rw+');
$request->setFeedSubmissionResult($myHandle);

invokeGetFeedSubmissionResult($service, $request);

rewind($myHandle);
echo stream_get_contents($myHandle);


function invokeGetFeedSubmissionResult(MarketplaceWebService_Interface $service, $request) 
  {
     try {
           $response = $service->getFeedSubmissionResult($request);
         } catch (MarketplaceWebService_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
  }
?>