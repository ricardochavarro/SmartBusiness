<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StockMovement
 *
 * @ORM\Table(name="stock_movement", indexes={@ORM\Index(name="fk_stock_mov_mov_cat_idx", columns={"id_movement_category"}), @ORM\Index(name="fk_bus_store_idx", columns={"id_business_owner"})})
 * @ORM\Entity
 */
class StockMovement
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_stock_movement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStockMovement;

    /**
     * @var \BusinessStockBundle\Entity\MovementCategory
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\MovementCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_movement_category", referencedColumnName="id_movement_category")
     * })
     */
    private $idMovementCategory;

    /**
     * @var \BusinessStockBundle\Entity\BusinessStore
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\BusinessStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_business_owner", referencedColumnName="id_business_store")
     * })
     */
    private $idBusinessOwner;



    /**
     * Set date
     *
     * @param \DateTime $date
     * @return StockMovement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idStockMovement
     *
     * @return integer 
     */
    public function getIdStockMovement()
    {
        return $this->idStockMovement;
    }

    /**
     * Set idMovementCategory
     *
     * @param \BusinessStockBundle\Entity\MovementCategory $idMovementCategory
     * @return StockMovement
     */
    public function setIdMovementCategory(\BusinessStockBundle\Entity\MovementCategory $idMovementCategory = null)
    {
        $this->idMovementCategory = $idMovementCategory;

        return $this;
    }

    /**
     * Get idMovementCategory
     *
     * @return \BusinessStockBundle\Entity\MovementCategory 
     */
    public function getIdMovementCategory()
    {
        return $this->idMovementCategory;
    }

    /**
     * Set idBusinessOwner
     *
     * @param \BusinessStockBundle\Entity\BusinessStore $idBusinessOwner
     * @return StockMovement
     */
    public function setIdBusinessOwner(\BusinessStockBundle\Entity\BusinessStore $idBusinessOwner = null)
    {
        $this->idBusinessOwner = $idBusinessOwner;

        return $this;
    }

    /**
     * Get idBusinessOwner
     *
     * @return \BusinessStockBundle\Entity\BusinessStore 
     */
    public function getIdBusinessOwner()
    {
        return $this->idBusinessOwner;
    }
}
