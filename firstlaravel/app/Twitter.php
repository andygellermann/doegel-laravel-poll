<?php


namespace App;


class Twitter
{

    protected $apiKey;

    public function __construct($apiKey)
    {
            $this->apiKey = $apiKey;
    }
}
