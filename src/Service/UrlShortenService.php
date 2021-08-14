<?php

namespace App\Service;

use App\Entity\Url;
use Doctrine\ORM\EntityManagerInterface;
use App\Util\MakeShortUrl;

class UrlShortenService {

    private $em;
    private $config;

    public function __construct(EntityManagerInterface $em, UrlShortenConfiguration $config) {
        $this->em = $em;
        $this->config = $config;
    }
    
    public function setShortUrl($long_url) {
        $long_url = urldecode($long_url);
        $short_url = MakeShortUrl::shorten($long_url);

        $existing_url = $this->em->getRepository(Url::class)->findByHash($short_url);

        if ($existing_url == null) {
            $url = new Url();
            $url->setHash($short_url);
            $url->setLongUrl($long_url);
            $url->setCreateDate(new \DateTime());

            $this->em->persist($url);
            $this->em->flush();
        }

        $link = sprintf("%s/%s", rtrim($this->config->getHostHame(), '/'),  $short_url);
        
        return $link;
    }

}