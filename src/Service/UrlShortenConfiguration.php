<?php

namespace App\Service;

class UrlShortenConfiguration {

    private $host_name;

    public function __construct($host_name) {
        $this->host_name = $host_name;
    }

    public function getHostHame() {
        return $this->host_name;
    }

}