<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApartmentType
 *
 * @ORM\Table(name="apartment_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApartmentTypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ApartmentType extends BaseType
{

}

