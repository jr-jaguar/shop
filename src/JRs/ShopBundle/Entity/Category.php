<?php

namespace JRs\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JRs\ShopBundle\JRsShopBundle;



/**
 * @ORM\Entity(repositoryClass="JRs\ShopBundle\Entity\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Product",mappedBy="categories")
     */
    private $products;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    

    /**
     * Add products
     *
     * @param \JRs\ShopBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\JRs\ShopBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \JRs\ShopBundle\Entity\Product $products
     */
    public function removeProduct(\JRs\ShopBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function __toString(){

        return $this->getName() ? $this->getName() : "";
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlugValue(){
        $this->slug = JRs::slugify($this->getName());
    }
}
