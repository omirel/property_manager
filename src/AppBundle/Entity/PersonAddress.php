<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PersonAddress
 *
 * @ORM\Table(name="person_address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonAddressRepository")
 */
class PersonAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $person;


    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="AddressType")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $addressType;

    public function __toString()
    {
        return "ddsaADSAD";
        return $this->getPerson()->getFirstname().' '.$this->getAddress()->getLine1();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setPerson(Person $person)
    {
        $this->person = $person;

        return $this;
    }

    public function getPerson()
    {
        return $this->person;
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

    public function setAddressType(AddressType $addressType)
    {
        $this->addressType = $addressType;

        return $this;
    }

    public function getAddressType()
    {
        return $this->addressType;
    }
}

