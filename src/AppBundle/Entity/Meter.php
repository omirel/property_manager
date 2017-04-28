<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Meter
 *
 * @ORM\Table(name="meter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeterRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Meter extends Base
{
    /**
     * @ORM\ManyToOne(targetEntity="MeterType", inversedBy="meters")
     */
    private $meterType;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @ORM\ManyToMany(targetEntity="Apartment", mappedBy="meters")
     */
    private $apartments;

    /**
     *  @ORM\OneToMany(targetEntity="Meterreading", mappedBy="meter", cascade={"persist"})
     */
    private $meterreadings;

    public function __construct() {
        $this->apartments = new ArrayCollection();
        $this->meterreadings = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = $this->getMeterType() ? $this->getMeterType().': ': '';
        $str .= $this->getNumber() ?: '';

        return $str;
    }

    public function getMeterreadings() {
        return $this->meterreadings;
    }

    public function addMeterreading(Meterreading $meterreading) {
        if ($this->meterreadings->contains($meterreading)) {
            return;
        }
        $this->meterreadings->add($meterreading);
        $meterreading->setMeter($this);
    }

    public function removeMeterreading(Meterreading $meterreading) {
        if (!$this->meterreadings->contains($meterreading)) {
            return;
        }
        $this->meterreadings->removeElement($meterreading);
        $meterreading->removeMeter($this);
    }

    public function addApartment(Apartment $apartment) {
        if ($this->apartments->contains($apartment)) {
            return;
        }
        $this->apartments->add($apartment);
        $apartment->addMeter($this);
    }

    public function removeApartment(Apartment $apartment) {
        if (!$this->apartments->contains($apartment)) {
            return;
        }
        $this->apartments->removeElement($apartment);
        $apartment->removeMeter($this);
    }

    /**
     * Set meterType
     *
     * @param MeterType $meterType
     *
     * @return Meter
     */
    public function setMeterType(MeterType $meterType)
    {
        $this->meterType = $meterType;

        return $this;
    }

    /**
     * Get meterType
     *
     * @return MeterType
     */
    public function getMeterType()
    {
        return $this->meterType;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Meter
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
}

