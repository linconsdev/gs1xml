<?php

return [
    'Signature' => [
        'type' => 'object',
        'attributes' => [],
        'content' => [
            'SignedInfo' => [
                'type' => 'object',
                'attributes' => [],
                'content' => [
                    'CanonicalizationMethod' => [
                        'type' => 'value',
                        'attributes' => [],
                        'content' => null
                    ],
                    'SignatureMethod' => [
                        'type' => 'value',
                        'attributes' => [],
                        'content' => null
                    ],
                    'Reference' => [
                        'type' => 'object',
                        'attributes' => [],
                        'content' => [
                            'Transforms' => [
                                'type' => 'array',
                                'attributes' => [],
                                'content' => [],
                                'template' => [
                                    'Transform' => [
                                        'type' => 'value',
                                        'attributes' => [],
                                        'content' => null
                                    ]
                                ]
                            ],
                            'DigestMethod' => [
                                'type' => 'value',
                                'attributes' => [],
                                'content' => null
                            ],
                            'DigestValue' => [
                                'type' => 'value',
                                'attributes' => [],
                                'content' => null
                            ],
                        ]
                    ],
                ]
            ],
            'SignatureValue' => [
                'type' => 'value',
                'attributes' => [],
                'content' => null
            ],
            'KeyInfo' => [
                'type' => 'object',
                'attributes' => [],
                'content' => [
                    'KeyValue' => [
                        'type' => 'object',
                        'attributes' => [],
                        'content' => [
                            'DSAKeyValue' => [
                                'type' => 'object',
                                'attributes' => [],
                                'content' => [
                                    'P' => [
                                        'type' => 'value',
                                        'attributes' => [],
                                        'content' => null
                                    ],
                                    'Q' => [
                                        'type' => 'value',
                                        'attributes' => [],
                                        'content' => null
                                    ],
                                    'G' => [
                                        'type' => 'value',
                                        'attributes' => [],
                                        'content' => null
                                    ],
                                    'Y' => [
                                        'type' => 'value',
                                        'attributes' => [],
                                        'content' => null
                                    ],
                                ]
                            ],
                        ]
                    ],
                    'X509Data' => [
                        'type' => 'object',
                        'attributes' => [],
                        'content' => [
                            'X509Certificate' => [
                                'type' => 'value',
                                'attributes' => [],
                                'content' => null
                            ]
                        ]
                    ],
                ]
            ],
        ]
    ]
];