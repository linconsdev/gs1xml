<?php

return [
    'totalInvoiceAmount' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'totalAmountInvoiceAllowancesCharges' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'totalLineAmountInclusiveAllowancesCharges' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'totalTaxAmount' => [
        'type' => 'value',
        'attributes' => [],
        'content' => null,
    ],
    'taxSubtotal' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'dutyFeeTaxAmount' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null,
            ],
            'dutyFeeTaxBasisAmount' => [
                'type' => 'value',
                'attributes' => [],
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
    ]
];