<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item", indexes={@ORM\Index(name="fk_categ_idx", columns={"id_item_category"}), @ORM\Index(name="fk_item_business_idx", columns={"id_business_owner"})})
 * @ORM\Entity
 */
class Item
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=100, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @var \BusinessStockBundle\Entity\ItemCategory
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\ItemCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_item_category", referencedColumnName="id_item_category")
     * })
     */
    private $idItemCategory;



    /**
     * Set name
     *
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Item
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Item
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Get idItem
     *
     * @return integer 
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set idBusinessOwner
     *
     * @param \BusinessStockBundle\Entity\BusinessStore $idBusinessOwner
     * @return Item
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

    /**
     * Set idItemCategory
     *
     * @param \BusinessStockBundle\Entity\ItemCategory $idItemCategory
     * @return Item
     */
    public function setIdItemCategory(\BusinessStockBundle\Entity\ItemCategory $idItemCategory = null)
    {
        $this->idItemCategory = $idItemCategory;

        return $this;
    }

    /**
     * Get idItemCategory
     *
     * @return \BusinessStockBundle\Entity\ItemCategory 
     */
    public function getIdItemCategory()
    {
        return $this->idItemCategory;
    }
}
