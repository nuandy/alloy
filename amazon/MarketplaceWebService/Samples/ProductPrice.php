<?php
/** 
 *  PHP Version 5
 *  @author andy@betatoys.com
 */
/*******************************************************************************

/**
 * Updates product prices
 */

include_once ('SubmitFeed.php');

$feedtype = '_POST_PRODUCT_PRICING_DATA_';

$feed = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<AmazonEnvelope xsi:noNamespaceSchemaLocation="amzn-envelope.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Header>
        <DocumentVersion>1.01</DocumentVersion>
        <MerchantIdentifier>M_BETATOYSLL_574933</MerchantIdentifier>
    </Header>
    <MessageType>Price</MessageType>
    <Message>
        <MessageID>1</MessageID>
        <Price>
            <SKU>4543112587329</SKU>
            <StandardPrice currency="USD">60.00</StandardPrice>
        </Price>
    </Message>
</AmazonEnvelope>
EOD;

$submit_feed = new SubmitFeed();
$submit_feed -> setupSubmitFeed($feed, $feedtype);
?>