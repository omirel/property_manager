<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PersonAddress
 *
 * @ORM\Table(
 *     name="person_address",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="person_address", columns={"person_id", "address_id", "address_type_id"})}
 * )
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonAddressRepository")
 * @UniqueEntity(
 *     fields={"person", "address", "addressType"},
 *     errorPath="addressType",
 *     message="This addressType is already in use for that person."
 * )
 * @ORM\HasLifecycleCallbacks
 */
class PersonAddress extends Base
{
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
        $str = '';

        if (is_object($this->getPerson()))
            $str .= $this->getPerson()->getFirstname();

        if (is_object($this->getAddress()))
            $str .= $this->getAddress()->getLine1();

        if (is_object($this->getAddressType()))
            $str .= ' / '.$this->getAddressType();

        return $str;
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

