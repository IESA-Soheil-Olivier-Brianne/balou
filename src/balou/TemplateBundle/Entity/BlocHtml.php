<?php

namespace balou\TemplateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlocHtml
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="balou\TemplateBundle\Entity\BlocHtmlRepository")
 */
class BlocHtml
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="\balou\TemplateBundle\Entity\Html", mappedBy="blochtml")
     */
    private $html;


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
     * @return BlocHtml
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
     * Set html
     *
     * @param \balou\TemplateBundle\Entity\Html $html
     * @return BlocHtml
     */
    public function setHtml(\balou\TemplateBundle\Entity\Html $html = null)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return \balou\TemplateBundle\Entity\Html 
     */
    public function getHtml()
    {
        return $this->html;
    }

    public function __toString()
    {
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->html = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add html
     *
     * @param \balou\TemplateBundle\Entity\Html $html
     * @return BlocHtml
     */
    public function addHtml(\balou\TemplateBundle\Entity\Html $html)
    {
        $this->html[] = $html;

        return $this;
    }

    /**
     * Remove html
     *
     * @param \balou\TemplateBundle\Entity\Html $html
     */
    public function removeHtml(\balou\TemplateBundle\Entity\Html $html)
    {
        $this->html->removeElement($html);
    }
}
