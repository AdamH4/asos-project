<?php

return [
    'host' => [
        'host' => env('ELASTICSEARCH_HOST'),
        'port' => env('ELASTICSEARCH_PORT'),
        // 'user' => env('ELASTICSEARCH_USER'),
        // 'pass' => env('ELASTICSEARCH_PAST')
    ],
    'indices' => [
        'mappings' => [
            'default' => [
                'properties' => [
                    'title' => [
                        'type' => 'text',
                        'analyzer' => 'rebuilt_english'
                    ],
                    'description' => [
                        'type' => 'text',
                        'analyzer' => 'rebuilt_english'
                    ],
                ],
            ],
        ],
        'settings' => [
            'default' => [
                'number_of_shards' => 1,
                'number_of_replicas' => 0,
                "max_ngram_diff" => "50",
                'analysis' => [
                    'analyzer' => [
                        'rebuilt_english' => [
                            "tokenizer" => "my_tokenizer",
                            'filter' => [
                                "english_possessive_stemmer",
                                "lowercase",
                                "english_stop",
                                "english_stemmer"
                            ]
                        ]
                    ],
                    'filter' => [
                        'english_stop' => [
                            'type' =>       'stop',
                            'stopwords' =>  '_english'
                        ],
                        'english_stemmer' => [
                            "type" =>       "stemmer",
                            "language" =>   "english"
                        ],
                        "english_possessive_stemmer" => [
                            "type" =>       "stemmer",
                            "language" =>   "possessive_english"
                        ]
                    ],
                    "tokenizer" => [
                        "my_tokenizer" => [
                            "type" => "ngram",
                            "min_gram" => 3,
                            "max_gram" => 10,
                            "token_chars" => [
                                "letter",
                            ]
                        ],
                    ],
                ],
            ],
        ],
    ],
];
