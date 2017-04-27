<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Building
 *
 * @ORM\Table(name="building")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuildingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Building extends Base
{
    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", length=50)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="buildingAddresses")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="Apartment", mappedBy="building", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $apartments;

    public function __construct()
    {
        $this->apartments = new ArrayCollection();
    }

    public function getApartments()
    {
        return $this->apartments;
    }

    public function __toString()
    {
        return $this->getFullName().', '.$this->getShortName();
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Building
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Building
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

