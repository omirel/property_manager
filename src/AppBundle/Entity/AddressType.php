<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AddressType
 *
 * @ORM\Table(name="address_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressTypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class AddressType extends BaseType
{

}

