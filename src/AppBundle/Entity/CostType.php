<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CostType
 *
 * @ORM\Table(name="cost_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CostTypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class CostType extends BaseType
{
}

