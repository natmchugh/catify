<?php

namespace App;

class Search
{
    protected $term;

    public function search($term)
    {
        $this->term = $term;
        return [
            'data' => [
                'gif' => [
                    'title' => 'Typing',
                    'url' => '/gifs/typing.gif'
                ]
            ]
        ];
    }

    public function all()
    {
        return [
            'data' => [
                'gif' => [
                    'title' => 'Typing',
                    'url' => '/gifs/typing.gif'
                ]
            ]
        ];
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}