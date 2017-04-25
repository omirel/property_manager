<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TenantAddress
 *
 * @ORM\Table(name="tenant_address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TenantAddressRepository")
 */
class TenantAddress
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
     * @ORM\ManyToOne(targetEntity="Tenant", inversedBy="tenantAddresses")
     */
    private $tenant;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="tenantAddresses")
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AddressType", inversedBy="tenantAddresses")
     *
     */
    private $addressType;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;

        return $this;
    }

    public function getTenant()
    {
        return $this->tenant;
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

