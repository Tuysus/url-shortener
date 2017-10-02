<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Url
 *
 * @ORM\Table(name="url")
 * @ORM\Entity
 */
class Url
{
    /**
     * @var string
     *
     * @ORM\Column(name="original_url", type="string", length=1024, nullable=false)
     */
    private $originalUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="short_url", type="string", length=128, nullable=false)
     */
    private $shortUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_usage", type="integer", nullable=true)
     */
    private $numberOfUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_id", type="string", length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $urlId;

    /**
     * @return string
     */
    public function getOriginalUrl(): string
    {
        return $this->originalUrl;
    }

    /**
     * @param string $originalUrl
     */
    public function setOriginalUrl(string $originalUrl)
    {
        $this->originalUrl = $originalUrl;
    }

    /**
     * @return string
     */
    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     */
    public function setShortUrl(string $shortUrl)
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * @return int
     */
    public function getNumberOfUsage(): int
    {
        return $this->numberOfUsage;
    }

    /**
     * @param int $numberOfUsage
     */
    public function setNumberOfUsage(int $numberOfUsage)
    {
        $this->numberOfUsage = $numberOfUsage;
    }

    /**
     * @return string
     */
    public function getUrlId(): string
    {
        return $this->urlId;
    }

    /**
     * @param string $urlId
     */
    public function setUrlId(string $urlId)
    {
        $this->urlId = $urlId;
    }


}

