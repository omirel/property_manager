<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\ManyToOne(targetEntity="Apartment", inversedBy="apartments")
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
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="currencies")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $currency;

    /**
     * @ORM\OneToMany(targetEntity="Lettingsidecost", mappedBy="letting", cascade={"persist"})
     */
    private $lettingsidecosts;


    public function __construct()
    {
        $this->lettingsidecosts = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = $this->getApartment()? $this->getApartment().': ': '';
        $str .=  $this->getPrice()?: '';
        $str .=  $this->getCurrency()?: '';

        return $str;
    }

    public function getLettingsidecosts()
    {
        return $this->lettingsidecosts;
    }

    public function addLettingsidecost(Lettingsidecost $lettingsidecost) {
        if ($this->lettingsidecosts->contains($lettingsidecost)) {
            return;
        }
        $this->lettingsidecosts->add($lettingsidecost);
        $lettingsidecost->setLetting($this);
    }

    public function removeLettingsidecost(Lettingsidecost $lettingsidecost) {
        if (!$this->meterreadings->contains($lettingsidecost)) {
            return;
        }
        $this->lettingsidecosts->removeElement($lettingsidecost);
        $lettingsidecost->removeLetting($this);
    }

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
     * @param Currency $currency
     *
     * @return Letting
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

