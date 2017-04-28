<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeterType
 *
 * @ORM\Table(name="meter_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeterTypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class MeterType  extends BaseType
{
    /**
     * @ORM\ManyToOne(targetEntity="Unit", inversedBy="units")
     */
    private $unit;

    public function __toString()
    {
        $str = $this->getTitle() ?: '';
        $str .= $this->getUnit() ? ' ('.$this->getUnit().')': '';

        return $str;
    }

    /**
     * Set unit
     *
     * @param Unit $unit
     *
     * @return Meter
     */
    public function setUnit(Unit $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
}

