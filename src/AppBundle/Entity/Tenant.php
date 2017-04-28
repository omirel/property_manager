<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tenant
 *
 * @ORM\Table(name="tenant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TenantRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Tenant extends Base
{
    /**
     * @ORM\ManyToOne(targetEntity="Letting", inversedBy="tenants")
     */
    private $letting;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="tenants")
     */
    private $person;

    /**
     * Set letting
     *
     * @param Letting $letting
     *
     * @return Tenant
     */
    public function setLetting(Letting $letting)
    {
        $this->letting = $letting;

        return $this;
    }

    /**
     * Get letting
     *
     * @return Letting
     */
    public function getLetting()
    {
        return $this->letting;
    }

    /**
     * Set person
     *
     * @param Person $person
     *
     * @return Tenant
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}

