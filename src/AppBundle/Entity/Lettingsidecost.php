<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lettingsidecost
 *
 * @ORM\Table(name="letting_sidecost")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LettingsidecostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Lettingsidecost extends Base
{
    /**
     * @ORM\ManyToOne(targetEntity="Letting", inversedBy="lettingsidecosts", cascade={"persist"})
     * @ORM\JoinColumn(name="letting_id", referencedColumnName="id")
     */
    private $letting;

    /**
     * @ORM\ManyToOne(targetEntity="CostType")
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
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="currencies")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $currency;


    /**
     * @return string
     */
    public function __toString()
    {
        $str = $this->getLetting()? $this->getLetting().': ': '';
        $str .=  $this->getPrice()?: '';
        $str .=  $this->getCurrency()?: '';

        return $str;
    }


    /**
     * Set letting
     *
     * @param string $letting
     *
     * @return Lettingsidecost
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
     * @return Lettingsidecost
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
     * @return Lettingsidecost
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
     * @return Lettingsidecost
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
     * @return Lettingsidecost
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
     * @param Currency $currency
     *
     * @return Lettingsidecost
     */
    public function setCurrency(Currency $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}

