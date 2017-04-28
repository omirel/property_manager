<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LettingSidecost
 *
 * @ORM\Table(name="letting_sidecost")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LettingSidecostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class LettingSidecost extends Base
{
    /**
     * @ORM\ManyToOne(targetEntity="Letting", inversedBy="lettingsidecosts", cascade={"persist"})
     * @ORM\JoinColumn(name="letting_id", referencedColumnName="id")
     */
    private $letting;

    /**
     * @var string
     *
     * @ORM\Column(name="cost_type", type="string")
     */
    private $costType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date")
     */
    private $dateEnd;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="currency", type="float")
     */
    private $currency;


    /**
     * Set letting
     *
     * @param string $letting
     *
     * @return LettingSidecost
     */
    public function setLetting($letting)
    {
        $this->letting = $letting;

        return $this;
    }

    /**
     * Get letting
     *
     * @return string
     */
    public function getLetting()
    {
        return $this->letting;
    }

    /**
     * Set costType
     *
     * @param string $costType
     *
     * @return LettingSidecost
     */
    public function setCostType($costType)
    {
        $this->costType = $costType;

        return $this;
    }

    /**
     * Get costType
     *
     * @return string
     */
    public function getCostType()
    {
        return $this->costType;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return LettingSidecost
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return LettingSidecost
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return LettingSidecost
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set currency
     *
     * @param float $currency
     *
     * @return LettingSidecost
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return float
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}

