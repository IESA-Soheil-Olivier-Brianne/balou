<?php

namespace balou\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Media
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="balou\MediaBundle\Entity\MediaRepository")
 */
class Media
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
     * @ORM\Column(name="titre_media", type="string", length=255)
     */
    private $titreMedia;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille_media", type="integer")
     */
    private $tailleMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="description_media", type="string", length=255)
     */
    private $descriptionMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier_media", type="string", length=255)
     */
    private $fichierMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="url_media", type="string", length=255)
     */
    private $urlMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_media", type="string", length=255)
     */
    private $altMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="lien_media", type="string", length=255)
     */
    private $lienMedia;


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
     * Set titreMedia
     *
     * @param string $titreMedia
     * @return Media
     */
    public function setTitreMedia($titreMedia)
    {
        $this->titreMedia = $titreMedia;

        return $this;
    }

    /**
     * Get titreMedia
     *
     * @return string 
     */
    public function getTitreMedia()
    {
        return $this->titreMedia;
    }

    /**
     * Set tailleMedia
     *
     * @param integer $tailleMedia
     * @return Media
     */
    public function setTailleMedia($tailleMedia)
    {
        $this->tailleMedia = $tailleMedia;

        return $this;
    }

    /**
     * Get tailleMedia
     *
     * @return integer 
     */
    public function getTailleMedia()
    {
        return $this->tailleMedia;
    }

    /**
     * Set descriptionMedia
     *
     * @param string $descriptionMedia
     * @return Media
     */
    public function setDescriptionMedia($descriptionMedia)
    {
        $this->descriptionMedia = $descriptionMedia;

        return $this;
    }

    /**
     * Get descriptionMedia
     *
     * @return string 
     */
    public function getDescriptionMedia()
    {
        return $this->descriptionMedia;
    }

    /**
     * Set fichierMedia
     *
     * @param string $fichierMedia
     * @return Media
     */
    public function setFichierMedia($fichierMedia)
    {
        $this->fichierMedia = $fichierMedia;

        return $this;
    }

    /**
     * Get fichierMedia
     *
     * @return string 
     */
    public function getFichierMedia()
    {
        return $this->fichierMedia;
    }

    /**
     * Set urlMedia
     *
     * @param string $urlMedia
     * @return Media
     */
    public function setUrlMedia($urlMedia)
    {
        $this->urlMedia = $urlMedia;

        return $this;
    }

    /**
     * Get urlMedia
     *
     * @return string 
     */
    public function getUrlMedia()
    {
        return $this->urlMedia;
    }

    /**
     * Set altMedia
     *
     * @param string $altMedia
     * @return Media
     */
    public function setAltMedia($altMedia)
    {
        $this->altMedia = $altMedia;

        return $this;
    }

    /**
     * Get altMedia
     *
     * @return string 
     */
    public function getAltMedia()
    {
        return $this->altMedia;
    }

    /**
     * Set lienMedia
     *
     * @param string $lienMedia
     * @return Media
     */
    public function setLienMedia($lienMedia)
    {
        $this->lienMedia = $lienMedia;

        return $this;
    }

    /**
     * Get lienMedia
     *
     * @return string 
     */
    public function getLienMedia()
    {
        return $this->lienMedia;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    public $file;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();

        if (null !== $this->file){
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->file->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() 
    {
        if (null !== $this->file){
            $this->file->move($this->getUploadRootDir(),$this->path);
            unset($this->file);

            if($this->oldFile != null) 
            {
                unlink($this->tempFile);
            }
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function RemoveUpload()
    {
        if(file_exists($this->tempFile))
        {
            unlink($this->tempFile);
        }
    }


    


// public function upload()
// {
//     // la propriété « file » peut être vide si le champ n'est pas requis
//     if (null === $this->file) {
//         return;
//     }

//     // utilisez le nom de fichier original ici mais
//     // vous devriez « l'assainir » pour au moins éviter
//     // quelconques problèmes de sécurité

//     // la méthode « move » prend comme arguments le répertoire cible et
//     // le nom de fichier cible où le fichier doit être déplacé
//     $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

//     // définit la propriété « path » comme étant le nom de fichier où vous
//     // avez stocké le fichier
//     $this->path = $this->file->getClientOriginalName();

//     // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
//     $this->file = null;
// }

}
