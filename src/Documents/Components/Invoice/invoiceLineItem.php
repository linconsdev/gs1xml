<?php

return [
    'lineItemNumber' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'invoicedQuantity' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'amountInclusiveAllowancesCharges' => [
        'type' => 'value',
        'attributes' => [
            'currencyCode' => null
        ],
        'content' => null,
    ],
    'itemPriceInclusiveAllowancesCharges' => [
        'type' => 'value',
        'attributes' => [
            'currencyCode' => null
        ],
        'content' => null,
    ],
    'freeGoodsQuantity' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'transferOfOwnershipDate' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'transactionalTradeItem' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'gtin' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'additionalTradeItemIdentification' => [
                'type' => 'value',
                'attributes' => [
                    'additionalTradeItemIdentificationTypeCode' => null
                ],
                'content' => null,
            ],
            'tradeItemDescription' => [
                'type' => 'value',
                'attributes' => [
                    'languageCode' => null
                ],
                'content' => null,
            ],
        ]
    ],
    'invoiceLineTaxInformation' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'dutyFeeTaxAmount' => [
                'type' => 'value',
                'attributes' => [
                    'currencyCode' => null
                ],
                'content' => null,
            ],
            'dutyFeeTaxBasisAmount' => [
                'type' => 'value',
                'attributes' => [
                    'currencyCode' => null
                ],
                'content' => null,
            ],
            'dutyFeeTaxCategoryCode' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'dutyFeeTaxPercentage' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'dutyFeeTaxTypeCode' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
        ]
    ],
    'invoiceLineItemInformationAfterTaxes' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'amountInclusiveAllowancesCharges' => [
                'type' => 'value',
                'attributes' => [
                    'currencyCode' => null
                ],
                'content' => null,
            ],
        ]
    ],
    'purchaseOrder' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'entityIdentification' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'creationDateTime' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'lineItemNumber' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
        ]
    ],
];