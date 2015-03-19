<?php

namespace balou\TemplateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Html
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="balou\TemplateBundle\Entity\HtmlRepository")
 */
class Html
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="\balou\TemplateBundle\Entity\BlocHtml", inversedBy="html")
     */
    private $blochtml;


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
     * Set contenu
     *
     * @param string $contenu
     * @return Html
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set blochtml
     *
     * @param \balou\TemplateBundle\Entity\BlocHtml $blochtml
     * @return Html
     */
    public function setBlochtml(\balou\TemplateBundle\Entity\BlocHtml $blochtml = null)
    {
        $this->blochtml = $blochtml;

        return $this;
    }

    /**
     * Get blochtml
     *
     * @return \balou\TemplateBundle\Entity\BlocHtml 
     */
    public function getBlochtml()
    {
        return $this->blochtml;
    }
}
