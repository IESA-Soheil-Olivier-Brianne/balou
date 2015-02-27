<?php

namespace balou\MenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * blocmenu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="balou\MenuBundle\Entity\blocmenuRepository")
 */
class blocmenu
{   
    /**
       * @ORM\OneToMany(targetEntity="balou\MenuBundle\Entity\menu", mappedBy="blocmenu")
    */
    private $menu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

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
     * @return blocmenu
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
     * Set description
     *
     * @param string $description
     * @return blocmenu
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
     * Constructor
     */
    public function __construct()
    {
        $this->blocMenu = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add blocMenu
     *
     * @param \balou\MenuBundle\Entity\menu $blocMenu
     * @return blocmenu
     */
    public function addBlocMenu(\balou\MenuBundle\Entity\menu $blocMenu)
    {
        $this->blocMenu[] = $blocMenu;

        return $this;
    }

    /**
     * Remove blocMenu
     *
     * @param \balou\MenuBundle\Entity\menu $blocMenu
     */
    public function removeBlocMenu(\balou\MenuBundle\Entity\menu $blocMenu)
    {
        $this->blocMenu->removeElement($blocMenu);
    }

    /**
     * Get blocMenu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocMenu()
    {
        return $this->blocMenu;
    }
}
