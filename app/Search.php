<?php

namespace App;

class Search
{
    protected $term;

    protected $data = [
        'typing'  => '/gifs/typing.gif',
        'glasses' => 'gifs/glasses.gif',
    ];

    public function search($term)
    {
        if (!empty($this->data[$term])) {
            return [
                'data' => [
                    [
                        'title' => ucfirst($term),
                        'url' => $this->data[$term]
                    ]
                ]
            ];
        }
        abort(404);
    }

    public function random()
    {
        $title = array_rand($this->data);
        return [
            'data' => [
                [
                    'title' => ucfirst($title),
                    'url' => $this->data[$title]
                ]
            ]
        ];
    }

    public function all()
    {
        return [
            'data' => [
                [
                    'title' => 'Typing',
                    'url' => '/gifs/typing.gif'
                ],
                [
                    'title' => 'Glasses',
                    'url' => '/gifs/glasses.gif'
                ]
            ]
        ];
    }
}