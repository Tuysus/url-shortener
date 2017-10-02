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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $urlId;


}

