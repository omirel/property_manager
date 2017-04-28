<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Letting
 *
 * @ORM\Table(name="letting")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LettingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Letting extends Base
{
    /**
     * @ORM\OneToMany(targetEntity="Apartment", mappedBy="lettings", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $apartment;

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
     * Set apartment
     *
     * @param Apartment $apartment
     *
     * @return Letting
     */
    public function setApartment(Apartment $apartment)
    {
        $this->apartment = $apartment;

        return $this;
    }

    /**
     * Get apartment
     *
     * @return Apartment
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Letting
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
     * @return Letting
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
     * @return Letting
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
     * @return Letting
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

