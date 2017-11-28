<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StockMovementDetail
 *
 * @ORM\Table(name="stock_movement_detail", indexes={@ORM\Index(name="fk_stock_mov_idx", columns={"id_stock_movement"}), @ORM\Index(name="fk_item_idx", columns={"id_item"})})
 * @ORM\Entity
 */
class StockMovementDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="unit_value", type="bigint", nullable=false)
     */
    private $unitValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_value", type="bigint", nullable=false)
     */
    private $totalValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_amount", type="integer", nullable=false)
     */
    private $itemAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_stock_movement_detail", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStockMovementDetail;

    /**
     * @var \BusinessStockBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_item", referencedColumnName="id_item")
     * })
     */
    private $idItem;

    /**
     * @var \BusinessStockBundle\Entity\StockMovement
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\StockMovement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stock_movement", referencedColumnName="id_stock_movement")
     * })
     */
    private $idStockMovement;



    /**
     * Set unitValue
     *
     * @param integer $unitValue
     * @return StockMovementDetail
     */
    public function setUnitValue($unitValue)
    {
        $this->unitValue = $unitValue;

        return $this;
    }

    /**
     * Get unitValue
     *
     * @return integer 
     */
    public function getUnitValue()
    {
        return $this->unitValue;
    }

    /**
     * Set totalValue
     *
     * @param integer $totalValue
     * @return StockMovementDetail
     */
    public function setTotalValue($totalValue)
    {
        $this->totalValue = $totalValue;

        return $this;
    }

    /**
     * Get totalValue
     *
     * @return integer 
     */
    public function getTotalValue()
    {
        return $this->totalValue;
    }

    /**
     * Set itemAmount
     *
     * @param integer $itemAmount
     * @return StockMovementDetail
     */
    public function setItemAmount($itemAmount)
    {
        $this->itemAmount = $itemAmount;

        return $this;
    }

    /**
     * Get itemAmount
     *
     * @return integer 
     */
    public function getItemAmount()
    {
        return $this->itemAmount;
    }

    /**
     * Get idStockMovementDetail
     *
     * @return integer 
     */
    public function getIdStockMovementDetail()
    {
        return $this->idStockMovementDetail;
    }

    /**
     * Set idItem
     *
     * @param \BusinessStockBundle\Entity\Item $idItem
     * @return StockMovementDetail
     */
    public function setIdItem(\BusinessStockBundle\Entity\Item $idItem = null)
    {
        $this->idItem = $idItem;

        return $this;
    }

    /**
     * Get idItem
     *
     * @return \BusinessStockBundle\Entity\Item 
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set idStockMovement
     *
     * @param \BusinessStockBundle\Entity\StockMovement $idStockMovement
     * @return StockMovementDetail
     */
    public function setIdStockMovement(\BusinessStockBundle\Entity\StockMovement $idStockMovement = null)
    {
        $this->idStockMovement = $idStockMovement;

        return $this;
    }

    /**
     * Get idStockMovement
     *
     * @return \BusinessStockBundle\Entity\StockMovement 
     */
    public function getIdStockMovement()
    {
        return $this->idStockMovement;
    }
}
