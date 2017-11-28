<?php

namespace BusinessStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessStore
 *
 * @ORM\Table(name="business_store", indexes={@ORM\Index(name="fk_business_idx", columns={"id_business"})})
 * @ORM\Entity
 */
class BusinessStore
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=30, nullable=false)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_business_store", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBusinessStore;

    /**
     * @var \BusinessStockBundle\Entity\Business
     *
     * @ORM\ManyToOne(targetEntity="BusinessStockBundle\Entity\Business")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_business", referencedColumnName="id_business")
     * })
     */
    private $idBusiness;



    /**
     * Set name
     *
     * @param string $name
     * @return BusinessStore
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
     * Set city
     *
     * @param string $city
     * @return BusinessStore
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get idBusinessStore
     *
     * @return integer 
     */
    public function getIdBusinessStore()
    {
        return $this->idBusinessStore;
    }

    /**
     * Set idBusiness
     *
     * @param \BusinessStockBundle\Entity\Business $idBusiness
     * @return BusinessStore
     */
    public function setIdBusiness(\BusinessStockBundle\Entity\Business $idBusiness = null)
    {
        $this->idBusiness = $idBusiness;

        return $this;
    }

    /**
     * Get idBusiness
     *
     * @return \BusinessStockBundle\Entity\Business 
     */
    public function getIdBusiness()
    {
        return $this->idBusiness;
    }
}
