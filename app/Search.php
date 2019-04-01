<?php

namespace App;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\Storage;

class Search
{
    /**
     * @var string $term
     */
    protected $term;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * Search constructor.
     */
    public function __construct()
    {
        $filename = 'gifs.yml';
        $path = Storage::disk('public')->path($filename);
        $this->data = Yaml::parse(file_get_contents($path));
    }

    /**
     * @param $query
     * @return array
     */
    public function search($query = null)
    {
        $gifs = [];
        $term= strtolower($query);
        foreach ($this->data as $title => $gif) {
            if (empty($term) || in_array($term, $gif['tags'])) {
                $gifs[] = ['title' => $title, 'url' => $gif['url']];
            }
        }
        return [
            'data' => $gifs
        ];
    }

    /**
     * @return array
     */
    public function random()
    {
        $title = array_rand($this->data);
        $gif = $this->data[$title];
        $gifs = [['title' => $title, 'url' => $gif['url']]];
        return [
            'data' => $gifs
        ];
    }
}