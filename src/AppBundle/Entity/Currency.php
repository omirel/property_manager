<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CurrencyRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Currency extends Base
{
    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=3)
     */
    private $iso;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getIso() ?: '';
    }


    /**
     * Set iso
     *
     * @param string $iso
     *
     * @return Currency
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }
}

