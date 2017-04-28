<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meterreading
 *
 * @ORM\Table(name="meter_reading")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeterreadingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Meterreading extends Base
{
    /**
     * @ORM\ManyToOne(targetEntity="Meter", inversedBy="meterreadings", cascade={"persist"})
     * @ORM\JoinColumn(name="meter_id", referencedColumnName="id")
     */
    private $meter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @return string
     */
    public function __toString()
    {
        $str = $this->getMeter() ? $this->getMeter().': ': '';
        $str .= $this->getDate() ? $this->getDate()->format('H:m:i').': ': '';
        $str .= $this->getValue() ? $this->getValue().': ': '';

        return $str;
    }

    /**
     * Set meter
     *
     * @param Meter $meter
     *
     * @return Meterreading
     */
    public function setMeter(Meter $meter)
    {
        $this->meter = $meter;

        return $this;
    }

    /**
     * Get meter
     *
     * @return Meter
     */
    public function getMeter()
    {
        return $this->meter;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Meterreading
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set value
     *
     * @param float $value
     *
     * @return Meterreading
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
}

