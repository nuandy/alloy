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
 * Get Feed Submission List  Sample
 */

include_once ('.config.inc.php'); 

$serviceUrl = "https://mws.amazonservices.com";

$config = array (
  'ServiceURL' => $serviceUrl,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3,
);

/************************************************************************
 * Instantiate Implementation of MarketplaceWebService
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new MarketplaceWebService_Client(
     AWS_ACCESS_KEY_ID, 
     AWS_SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);
 
/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Get Feed Submission List Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as MarketplaceWebService_Model_GetFeedSubmissionListRequest
 // object or array of parameters
 
$parameters = array (
  'Marketplace' => MARKETPLACE_ID,
  'Merchant' => MERCHANT_ID,
  'FeedSubmissionIdList' => array ('Id' => array ('3270420532')),
  'FeedProcessingStatusList' => array ('Status' => array ('_SUBMITTED_')),
);

$request = new MarketplaceWebService_Model_GetFeedSubmissionListRequest($parameters);
invokeGetFeedSubmissionList($service, $request);
                                                                            
/**
  * Get Feed Submission List Action Sample
  * returns a list of feed submission identifiers and their associated metadata
  *   
  * @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
  * @param mixed $request MarketplaceWebService_Model_GetFeedSubmissionList or array of parameters
  */
  function invokeGetFeedSubmissionList(MarketplaceWebService_Interface $service, $request) 
  {
      try {
              $response = $service->getFeedSubmissionList($request);
              
                echo ("<h1>Service Response</h1>\n");
                if ($response->isSetGetFeedSubmissionListResult()) { 
                    $getFeedSubmissionListResult = $response->getGetFeedSubmissionListResult();
                    $feedSubmissionInfoList = $getFeedSubmissionListResult->getFeedSubmissionInfoList();
                    foreach ($feedSubmissionInfoList as $feedSubmissionInfo) {
                        echo("<h2>FeedSubmissionInfo</h2>\n");
                        if ($feedSubmissionInfo->isSetFeedSubmissionId()) 
                        {
                            echo("<p>FeedSubmissionId:\n");
                            echo(" " . $feedSubmissionInfo->getFeedSubmissionId() . "</p>\n");
                        }
                        if ($feedSubmissionInfo->isSetFeedType()) 
                        {
                            echo("<p>FeedType:\n");
                            echo(" " . $feedSubmissionInfo->getFeedType() . "</p>\n");
                        }
                        if ($feedSubmissionInfo->isSetSubmittedDate()) 
                        {
                            echo("<p>SubmittedDate:\n");
                            echo(" " . $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT) . "</p>\n");
                        }
                        if ($feedSubmissionInfo->isSetFeedProcessingStatus()) 
                        {
                            echo("<p>FeedProcessingStatus:\n");
                            echo(" " . $feedSubmissionInfo->getFeedProcessingStatus() . "</p>\n");
                        }
                        if ($feedSubmissionInfo->isSetStartedProcessingDate()) 
                        {
                            echo("<p>StartedProcessingDate:\n");
                            echo(" " . $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT) . "</p>\n");
                        }
                        if ($feedSubmissionInfo->isSetCompletedProcessingDate()) 
                        {
                            echo("<p>CompletedProcessingDate:\n");
                            echo(" " . $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT) . "</p>\n");
                        }
                    }
                }
     } catch (MarketplaceWebService_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }