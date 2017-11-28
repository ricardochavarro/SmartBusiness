<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovementCategory
 *
 * @ORM\Table(name="movement_category")
 * @ORM\Entity
 */
class MovementCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="name", type="integer", nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_movement_category", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMovementCategory;



    /**
     * Set name
     *
     * @param integer $name
     * @return MovementCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get idMovementCategory
     *
     * @return integer 
     */
    public function getIdMovementCategory()
    {
        return $this->idMovementCategory;
    }
}
