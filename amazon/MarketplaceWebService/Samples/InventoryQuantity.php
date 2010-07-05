<?php
/** 
 *  PHP Version 5
 *  @author andy@betatoys.com
 */
/*******************************************************************************

/**
 * Updates inventory quantities
 */

include_once ('SubmitFeed.php');

$feedtype = '_POST_INVENTORY_AVAILABILITY_DATA_';

$feed = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<AmazonEnvelope xsi:noNamespaceSchemaLocation="amzn-envelope.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Header>
        <DocumentVersion>1.01</DocumentVersion>
        <MerchantIdentifier>M_BETATOYSLL_574933</MerchantIdentifier>
    </Header>
    <MessageType>Inventory</MessageType>
    <Message>
        <MessageID>1</MessageID>
        <OperationType>Update</OperationType>
        <Inventory>
            <SKU>4543112587329</SKU>
            <Quantity>6</Quantity>
            <FulfillmentLatency>2</FulfillmentLatency>
        </Inventory>
    </Message>
</AmazonEnvelope>
EOD;

$submit_feed = new SubmitFeed();
$submit_feed -> setupSubmitFeed($feed, $feedtype);
?>