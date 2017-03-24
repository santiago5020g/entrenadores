<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Ttrfieldsf
 *
 * @ORM\Table(name="ttrfieldsf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TtrfieldsfRepository")
 */
class Ttrfieldsf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label_name", type="string", length=50)
     */
    private $labelName;

    /**
     * @var string
     *
     * @ORM\Column(name="typefield", type="string", length=40)
     */
    private $typefield;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


    /**
     * @ORM\ManyToOne(targetEntity="Ttrform", inversedBy="ttrfieldsf")
     * @ORM\JoinColumn(name="ttrform_id", referencedColumnName="id", nullable=false)
     */
    private $ttrform;



    /**
     * One field has One configfield.
     * @ORM\OneToOne(targetEntity="Configfield", mappedBy="ttrfieldsf")
     */
    private $configfield;



    /**
     * @ORM\OneToMany(targetEntity="Valuesf", mappedBy="ttrfieldsf")
     */
    private $valuesfs;
    
    public function __construct()
    {
        $this->valuesfs = new ArrayCollection();
    }





 public function addTag(Tag $tag)
    {
        $this->tags->add($tag);
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set labelName
     *
     * @param string $labelName
     *
     * @return Ttrfieldsf
     */
    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;

        return $this;
    }

    /**
     * Get labelName
     *
     * @return string
     */
    public function getLabelName()
    {
        return $this->labelName;
    }

    /**
     * Set typefield
     *
     * @param string $typefield
     *
     * @return Ttrfieldsf
     */
    public function setTypefield($typefield)
    {
        $this->typefield = $typefield;

        return $this;
    }

    /**
     * Get typefield
     *
     * @return string
     */
    public function getTypefield()
    {
        return $this->typefield;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Ttrfieldsf
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set ttrform
     *
     * @param \AppBundle\Entity\Ttrform $ttrform
     *
     * @return Ttrfieldsf
     */
    public function setTtrform(\AppBundle\Entity\Ttrform $ttrform = null)
    {
        $this->ttrform = $ttrform;

        return $this;
    }

    /**
     * Get ttrform
     *
     * @return \AppBundle\Entity\Ttrform
     */
    public function getTtrform()
    {
        return $this->ttrform;
    }

    /**
     * Set configfield
     *
     * @param \AppBundle\Entity\Configfield $configfield
     *
     * @return Ttrfieldsf
     */
    public function setConfigfield(\AppBundle\Entity\Configfield $configfield = null)
    {
        $this->configfield = $configfield;

        return $this;
    }

    /**
     * Get configfield
     *
     * @return \AppBundle\Entity\Configfield
     */
    public function getConfigfield()
    {
        return $this->configfield;
    }

    /**
     * Add valuesf
     *
     * @param \AppBundle\Entity\Valuesf $valuesf
     *
     * @return Ttrfieldsf
     */
    public function addValuesf(\AppBundle\Entity\Valuesf $valuesf)
    {
        $this->valuesfs[] = $valuesf;

        return $this;
    }

    /**
     * Remove valuesf
     *
     * @param \AppBundle\Entity\Valuesf $valuesf
     */
    public function removeValuesf(\AppBundle\Entity\Valuesf $valuesf)
    {
        $this->valuesfs->removeElement($valuesf);
    }

    /**
     * Get valuesfs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getValuesfs()
    {
        return $this->valuesfs;
    }
}
