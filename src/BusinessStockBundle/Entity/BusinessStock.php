<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessStock
 *
 * @ORM\Table(name="business_stock", indexes={@ORM\Index(name="fk_business_store_idx", columns={"id_business_owner"}), @ORM\Index(name="fk_item_idx", columns={"id_item"})})
 * @ORM\Entity
 */
class BusinessStock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="amount_available", type="bigint", nullable=false)
     */
    private $amountAvailable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="date", nullable=false)
     */
    private $lastUpdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_business_stock", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBusinessStock;

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
     * @var \BusinessStockBundle\Entity\BusinessStore
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\BusinessStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_business_owner", referencedColumnName="id_business_store")
     * })
     */
    private $idBusinessOwner;



    /**
     * Set amountAvailable
     *
     * @param integer $amountAvailable
     * @return BusinessStock
     */
    public function setAmountAvailable($amountAvailable)
    {
        $this->amountAvailable = $amountAvailable;

        return $this;
    }

    /**
     * Get amountAvailable
     *
     * @return integer 
     */
    public function getAmountAvailable()
    {
        return $this->amountAvailable;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     * @return BusinessStock
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime 
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Get idBusinessStock
     *
     * @return integer 
     */
    public function getIdBusinessStock()
    {
        return $this->idBusinessStock;
    }

    /**
     * Set idItem
     *
     * @param \BusinessStockBundle\Entity\Item $idItem
     * @return BusinessStock
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
     * Set idBusinessOwner
     *
     * @param \BusinessStockBundle\Entity\BusinessStore $idBusinessOwner
     * @return BusinessStock
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
