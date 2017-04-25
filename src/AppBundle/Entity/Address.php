<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address
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
     * @var string
     *
     * @ORM\Column(name="line1", type="string", length=255)
     */
    private $line1;

    /**
     * @var string
     *
     * @ORM\Column(name="line2", type="string", length=255)
     */
    private $line2;

    /**
     * @var string
     *
     * @ORM\Column(name="line3", type="string", length=255)
     */
    private $line3;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_or_postcode", type="string", length=32)
     */
    private $zipOrPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="state_province_county", type="string", length=32)
     */
    private $stateProvinceCounty;

    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", length=11)
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="other_address_details", type="string", length=255)
     */
    private $otherAddressDetails;


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
     * Set line1
     *
     * @param string $line1
     *
     * @return Address
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set line2
     *
     * @param string $line2
     *
     * @return Address
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get line2
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set line3
     *
     * @param string $line3
     *
     * @return Address
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * Get line3
     *
     * @return string
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * Set zipOrPostcode
     *
     * @param string $zipOrPostcode
     *
     * @return Address
     */
    public function setZipOrPostcode($zipOrPostcode)
    {
        $this->zipOrPostcode = $zipOrPostcode;

        return $this;
    }

    /**
     * Get zipOrPostcode
     *
     * @return string
     */
    public function getZipOrPostcode()
    {
        return $this->zipOrPostcode;
    }

    /**
     * Set stateProvinceCounty
     *
     * @param string $stateProvinceCounty
     *
     * @return Address
     */
    public function setStateProvinceCounty($stateProvinceCounty)
    {
        $this->stateProvinceCounty = $stateProvinceCounty;

        return $this;
    }

    /**
     * Get stateProvinceCounty
     *
     * @return string
     */
    public function getStateProvinceCounty()
    {
        return $this->stateProvinceCounty;
    }

    /**
     * Set countryId
     *
     * @param \integer $countryId
     *
     * @return Address
     */
    public function setCountryId(\integer $countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return \int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set otherAddressDetails
     *
     * @param string $otherAddressDetails
     *
     * @return Address
     */
    public function setOtherAddressDetails($otherAddressDetails)
    {
        $this->otherAddressDetails = $otherAddressDetails;

        return $this;
    }

    /**
     * Get otherAddressDetails
     *
     * @return string
     */
    public function getOtherAddressDetails()
    {
        return $this->otherAddressDetails;
    }
}

