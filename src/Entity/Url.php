<?php

namespace App\Entity;

use App\Repository\UrlRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UrlRepository::class)
 * @UniqueEntity("hash")
 */
class Url
{

    /**
     * @ORM\Column(type="string", length=16, unique=true)
     * @ORM\Id
     */
    private $hash;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $long_url;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_date;

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getLongUrl(): ?string
    {
        return $this->long_url;
    }

    public function setLongUrl(string $long_url): self
    {
        $this->long_url = $long_url;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }
}
