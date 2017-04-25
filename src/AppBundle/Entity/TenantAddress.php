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
     * @var int
     *
     * @ORM\Column(name="tenant_id", type="integer", length=11)
     * @ORM\ManyToOne(targetEntity="Tenant", inversedBy="tenants")
     */
    private $tenantId;

    /**
     * @var int
     *
     * @ORM\Column(name="address_id", type="integer", length=11)
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="addresses")
     */
    private $addressId;

    /**
     * @var int
     *
     * @ORM\Column(name="address_type_id", type="integer", length=11)
     * @ORM\ManyToOne(targetEntity="AddressType", inversedBy="addressTypes")
     */
    private $addressTypeId;

    /**
     * @ORM\OneToMany(targetEntity="Tenant", mappedBy="tenantId")
     */
    private $tenants;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="addressId")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity="AddressType", mappedBy="addressTypeId")
     */
    private $addressTypes;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->addressTypes = new ArrayCollection();
        $this->tenants = new ArrayCollection();
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function getAddressTypes()
    {
        return $this->addressTypes;
    }

    public function getTenants()
    {
        return $this->tenants;
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

    /**
     * Set tenantId
     *
     * @param \integer $tenantId
     *
     * @return TenantAddress
     */
    public function setTenantId(\integer $tenantId)
    {
        $this->tenantId = $tenantId;

        return $this;
    }

    /**
     * Get tenantId
     *
     * @return \int
     */
    public function getTenantId()
    {
        return $this->tenantId;
    }

    /**
     * Set addressId
     *
     * @param \integer $addressId
     *
     * @return TenantAddress
     */
    public function setAddressId(\integer $addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get addressId
     *
     * @return \int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Set addressTypeId
     *
     * @param \integer $addressTypeId
     *
     * @return TenantAddress
     */
    public function setAddressTypeId(\integer $addressTypeId)
    {
        $this->addressTypeId = $addressTypeId;

        return $this;
    }

    /**
     * Get addressTypeId
     *
     * @return \int
     */
    public function getAddressTypeId()
    {
        return $this->addressTypeId;
    }
}

