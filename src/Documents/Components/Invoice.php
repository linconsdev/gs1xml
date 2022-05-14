<?php

return [
    'creationDateTime'      => [
        'type'          => 'value',
        'attributes'    => [],
        'content'       => null,
    ],
    'documentStatusCode'    => [
        'type'          => 'value',
        'attributes'    => [],
        'content'       => null,
    ],
    'digitalSignature'      => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('General/digitalSignature.php'), 
    ],
    'invoiceType'           => [
        'type'          => 'value',
        'attributes'    => [],
        'content'       => null, 
    ],
    'invoiceCurrencyCode'   => [
        'type'          => 'value',
        'attributes'    => [],
        'content'       => null, 
    ],
    'invoiceIdentification' => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('Invoice/invoiceIdentification.php'),
    ],
    'buyer'                 => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('General/buyer.php'),
    ],
    'seller'                => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('General/seller.php'),
    ],
    'invoiceIssuer'         => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('Invoice/invoiceIssuer.php'),
    ],
    'invoiceTotals'         => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('Invoice/invoiceTotals.php'),
    ],
    'invoicingPeriod'       => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => include('Invoice/invoicingPeriod.php'),
    ],
    'invoiceLineItem'       => [
        'type'          => 'array',
        'attributes'    => [],
        'content'       => [],
        'template'      => include('Invoice/invoiceLineItem.php')
    ],
    'shipFrom'              => [
        'type'          => 'array',
        'attributes'    => [],
        'content'       => include('General/shipFrom.php')
    ]
];