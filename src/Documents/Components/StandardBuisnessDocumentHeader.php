<?php

return [
    'HeaderVersion' => [
        'type'          => 'value',
        'attributes'    => [],
        'content'       => '1.0'
    ],
    'Sender' => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => [
            'Identifier' => [
                'type'          => 'value',
                'attributes'    => [ 'Authority' => 'GS1'],
                'content'       => null,
            ],
            'ContactInformation' => [
                'type'          => 'object',
                'attributes'    => [],
                'content'       => [
                    'Contact' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'EmailAddress' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'FaxNumber' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'TelephoneNumber' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'ContactTypeIdentifier' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ]
                ]
            ]
        ]
    ],
    'Receiver' => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => [
            'Identifier' => [
                'type'          => 'value',
                'attributes'    => [ 'Authority' => 'GS1'],
                'content'       => null,
            ],
            'ContactInformation' => [
                'type'          => 'object',
                'attributes'    => [],
                'content'       => [
                    'Contact' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'EmailAddress' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'FaxNumber' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'TelephoneNumber' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ],
                    'ContactTypeIdentifier' => [
                        'type'          => 'value',
                        'attributes'    => [],
                        'content'       => null,
                    ]
                ]
            ]
        ]
    ],
    'DocumentIdentification' => [
        'type'          => 'object',
        'attributes'    => [],
        'content'       => [
            'Standard' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => 'GS1',
            ],
            'TypeVersion' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => 3.4,
            ],
            'InstanceIdentifier' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => null,
            ],
            'Type' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => null,
            ],
            'MultipleType' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => false,
            ],
            'CreationDateAndTime' => [
                'type'          => 'value',
                'attributes'    => [],
                'content'       => null,
            ],

        ]
    ]
];