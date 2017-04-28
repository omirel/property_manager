<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Apartment
 *
 * @ORM\Table(name="apartment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApartmentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Apartment extends Base
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
     * @ORM\ManyToOne(targetEntity="Building", inversedBy="apartments")
     */
    private $building;

    /**
     * @ORM\ManyToOne(targetEntity="ApartmentType", inversedBy="apartments")
     */
    private $apartmentType;

    /**
     * @var string
     *
     * @ORM\Column(name="apartment_number", type="string", length=50)
     */
    private $apartmentNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="floor_number", type="integer", length=3)
     */
    private $floorNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="room_count", type="integer", length=3)
     */
    private $roomCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="bathroom_count", type="integer", length=3)
     */
    private $bathroomCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="bedroom_count", type="integer", length=3)
     */
    private $bedroomCount;

    /**
     * Many Apartments have Many Meters
     * @ORM\ManyToMany(targetEntity="Meter", inversedBy="apartments")
     * @ORM\JoinTable(
     *      name="apartment_meter",
     *      joinColumns={@ORM\JoinColumn(name="apartment_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="meter_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $meters;

    public function __construct() {
        $this->meters = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getShortName() ?: '';
    }

    public function getMeters()
    {
        return $this->meters;
    }

    public function setMeters(ArrayCollection $meters) {
        $this->meters = $meters;
    }

    public function addMeter(Meter $meter) {
        if ($this->meters->contains($meter)) {
            return;
        }

        $this->meters->add($meter);
        $meter->addApartment($this);
    }

    public function removeMeter(Meter $meter) {
        if (!$this->meters->contains($meter)) {
            return;
        }

        $this->meters->removeElement($meter);
        $meter->removeApartment($this);
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Apartment
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
     * @return Apartment
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

    public function setBuilding(Building $building)
    {
        $this->building = $building;

        return $this;
    }

    public function getBuilding()
    {
        return $this->building;
    }

    public function setApartmentType(ApartmentType $apartmentType)
    {
        $this->apartmentType = $apartmentType;

        return $this;
    }

    public function getApartmentType()
    {
        return $this->apartmentType;
    }

    /**
     * Set apartmentNumber
     *
     * @param string $apartmentNumber
     *
     * @return Apartment
     */
    public function setApartmentNumber($apartmentNumber)
    {
        $this->apartmentNumber= $apartmentNumber;

        return $this;
    }

    /**
     * Get apartmentNumber
     *
     * @return string
     */
    public function getApartmentNumber()
    {
        return $this->apartmentNumber;
    }

    /**
     * Set roomCount
     *
     * @param integer $roomCount
     *
     * @return Apartment
     */
    public function setRoomCount($roomCount)
    {
        $this->roomCount = $roomCount;

        return $this;
    }

    /**
     * Get roomCount
     *
     * @return integer
     */
    public function getRoomCount()
    {
        return $this->roomCount;
    }

    /**
     * Set bedroomCount
     *
     * @param integer $bedroomCount
     *
     * @return Apartment
     */
    public function setBedroomCount($bedroomCount)
    {
        $this->bedroomCount = $bedroomCount;

        return $this;
    }

    /**
     * Get bedroomCount
     *
     * @return integer
     */
    public function getBedroomCount()
    {
        return $this->bedroomCount;
    }

    /**
     * Set bathroomCount
     *
     * @param integer $bathroomCount
     *
     * @return Apartment
     */
    public function setBathroomCount($bathroomCount)
    {
        $this->bathroomCount = $bathroomCount;

        return $this;
    }

    /**
     * Get bathroomCount
     *
     * @return integer
     */
    public function getBathroomCount()
    {
        return $this->bathroomCount;
    }

    /**
     * Set floorNumber
     *
     * @param integer $floorNumber
     *
     * @return Apartment
     */
    public function setFloorNumber($floorNumber)
    {
        $this->floorNumber = $floorNumber;

        return $this;
    }

    /**
     * Get floorNumber
     *
     * @return integer
     */
    public function getFloorNumber()
    {
        return $this->floorNumber;
    }
}

