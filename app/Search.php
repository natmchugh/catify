<?php

namespace App;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\Storage;

class Search
{
    protected $term;

    protected $data;

    public function __construct()
    {
        $filename = 'gifs.yml';
        $path = Storage::disk('public')->path($filename);
        $this->data = Yaml::parse(file_get_contents($path));
    }

    public function search($term)
    {
        foreach ($this->data as $title => $gif) {
            if (in_array($term, $gif['tags'])) {
                return [
                    'data' => [
                        [
                            'title' => $title,
                            'url' => $gif['url']
                        ]
                    ]
                ];

            }
        }
    }

    public function random()
    {
        $title = array_rand($this->data);
        $gif = $this->data[$title];
        return [
            'data' => [['title' => $title, 'url' => $gif['url']]]
        ];
    }

    public function all()
    {
        $gifs = [];
        foreach ($this->data as $title => $gif) {
            $gifs[] = ['title' => $title, 'url' => $gif['url']];
        }
        return [
            'data' => $gifs
        ];
    }
}