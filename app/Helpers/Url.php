<?php

namespace App\Helpers;

use App\Models\Url as ModelsUrl;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Url {

    private ModelsUrl $db;
    public function __construct()
    {
        $this->db = new ModelsUrl();
    }

    /**
     * Validate if a string is URL
     *
     * @param string $url
     *
     * @return boolean
     */
    public static function isValid(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Generate a Short URL
     *
     * @param string $longURL
     *
     * @return string Short URL
     */
    public function generate(string $longURL, string $shortURL = null, $user = null): string
    {
        // throw an error if the url is invalid
        if (!$this->isValid($longURL)) {
            throw new Exception('Invalid URL');
        }

        // generate a short url if its null
        if (is_null($shortURL)) {
            $shortURL = Str::random(7);
        } else {
            // encode url incase some illegal string is passed
            $shortURL = urlencode($shortURL);
        }

        $this->db->create([
            'short' => $shortURL,
            'long' => $longURL,
            'created_by' => $user
        ]);

        return $shortURL;
    }
}
