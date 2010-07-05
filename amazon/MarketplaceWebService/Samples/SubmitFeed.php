<?php
/** 
 *  PHP Version 5
 *  @author andy@betatoys.com
 */
/*******************************************************************************/

include_once ('.config.inc.php');

class SubmitFeed {

  public function setupSubmitFeed($feed, $feedtype) {
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
    $feedHandle = @fopen('php://memory', 'rw+');
    fwrite($feedHandle, $feed);
    rewind($feedHandle);
    $parameters = array (
      'Marketplace' => MARKETPLACE_ID,
      'Merchant' => MERCHANT_ID,
      'FeedType' => $feedtype,
      'FeedContent' => $feedHandle,
      'PurgeAndReplace' => false,
      'ContentMd5' => base64_encode(md5(stream_get_contents($feedHandle), true)),
    );
    rewind($feedHandle);
    $request = new MarketplaceWebService_Model_SubmitFeedRequest($parameters);
    $this->invokeSubmitFeed($service, $request);
    @fclose($feedHandle);
  }

  public function invokeSubmitFeed(MarketplaceWebService_Interface $service, $request) {
    try {
      $response = $service->submitFeed($request);
      if ($response->isSetSubmitFeedResult()) { 
        echo("<p>SubmitFeedResult</p>\n");
        $submitFeedResult = $response->getSubmitFeedResult();
        if ($submitFeedResult->isSetFeedSubmissionInfo()) { 
          $feedSubmissionInfo = $submitFeedResult->getFeedSubmissionInfo();
          if ($feedSubmissionInfo->isSetFeedSubmissionId()) {
            echo("<p>FeedSubmissionId:\n");
            echo(" " . $feedSubmissionInfo->getFeedSubmissionId() . "</p>\n"); }
          if ($feedSubmissionInfo->isSetFeedType()) {
            echo("<p>FeedType:\n");
            echo(" " . $feedSubmissionInfo->getFeedType() . "</p>\n"); }
          if ($feedSubmissionInfo->isSetSubmittedDate()) {
            echo("<p>SubmittedDate:\n");
            echo(" " . $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT) . "</p>\n"); }
          if ($feedSubmissionInfo->isSetFeedProcessingStatus()) {
            echo("<p>FeedProcessingStatus:\n");
            echo(" " . $feedSubmissionInfo->getFeedProcessingStatus() . "</p>\n"); }
          if ($feedSubmissionInfo->isSetStartedProcessingDate()) {
            echo("<p>StartedProcessingDate\n");
            echo(" " . $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT) . "</p>\n"); }
          if ($feedSubmissionInfo->isSetCompletedProcessingDate()) {
            echo("<p>CompletedProcessingDate\n");
            echo(" " . $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT) . "</p>\n"); }
        } 
      } 
    } catch (MarketplaceWebService_Exception $ex) {
      echo("Caught Exception: " . $ex->getMessage() . "\n");
      echo("Response Status Code: " . $ex->getStatusCode() . "\n");
      echo("Error Code: " . $ex->getErrorCode() . "\n");
      echo("Error Type: " . $ex->getErrorType() . "\n");
      echo("Request ID: " . $ex->getRequestId() . "\n");
      echo("XML: " . $ex->getXML() . "\n"); }
  }
}