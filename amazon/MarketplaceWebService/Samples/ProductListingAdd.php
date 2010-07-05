<?php
/** 
 *  PHP Version 5
 *  @author andy@betatoys.com
 */
/*******************************************************************************

/**
 * Add product listing
 */

include_once ('SubmitFeed.php');

$feedtype = '_POST_PRODUCT_DATA_';

$feed = <<<EOD
<?xml version="1.0" encoding="UTF-8"?> 
<AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="amzn-envelope.xsd">
    <Header>
        <DocumentVersion>1.01</DocumentVersion> 
        <MerchantIdentifier>M_BETATOYSLL_574933</MerchantIdentifier> 
    </Header>
    <MessageType>Product</MessageType> 
    <PurgeAndReplace>false</PurgeAndReplace> 
    <Message>
        <MessageID>1</MessageID> 
        <OperationType>Update</OperationType> 
        <Product>
            <SKU>4543112587329</SKU>
            <StandardProductID>
                <Type>EAN</Type>
                <Value>4543112587329</Value>
            </StandardProductID>
        </Product>
    </Message>
</AmazonEnvelope>
EOD;

$submit_feed = new SubmitFeed();
$submit_feed -> setupSubmitFeed($feed, $feedtype);
?>