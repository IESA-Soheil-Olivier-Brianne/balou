<?php

namespace balou\MenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * menu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="balou\MenuBundle\Entity\menuRepository")
 */
class menu
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
       * @ORM\OneToMany(targetEntity="balou\MenuBundle\Entity\menu", mappedBy="menu")
       * @ORM\JoinColumn(nullable=false)
    */
    private $blocMenu;
    */
    private $menu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_clicked", type="boolean")
     */
    private $isClicked;


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
     * Set nom
     *
     * @param string $nom
     * @return menu
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return menu
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isClicked
     *
     * @param boolean $isClicked
     * @return menu
     */
    public function setIsClicked($isClicked)
    {
        $this->isClicked = $isClicked;

        return $this;
    }

    /**
     * Get isClicked
     *
     * @return boolean 
     */
    public function getIsClicked()
    {
        return $this->isClicked;
    }

    /**
     * Set menu
     *
     * @param \balou\MenuBundle\Entity\menu $menu
     * @return menu
     */
    public function setMenu(\balou\MenuBundle\Entity\menu $menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \balou\MenuBundle\Entity\menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }

}