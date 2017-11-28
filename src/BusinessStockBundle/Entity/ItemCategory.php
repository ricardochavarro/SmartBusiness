<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemCategory
 *
 * @ORM\Table(name="item_category", indexes={@ORM\Index(name="fk_business_ow_idx", columns={"id_business_owner"})})
 * @ORM\Entity
 */
class ItemCategory
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_item_category", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idItemCategory;

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
     * Set name
     *
     * @param string $name
     * @return ItemCategory
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
     * Get idItemCategory
     *
     * @return integer 
     */
    public function getIdItemCategory()
    {
        return $this->idItemCategory;
    }

    /**
     * Set idBusinessOwner
     *
     * @param \BusinessStockBundle\Entity\BusinessStore $idBusinessOwner
     * @return ItemCategory
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
