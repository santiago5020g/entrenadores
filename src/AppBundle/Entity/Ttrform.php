<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ttrform
 *
 * @ORM\Table(name="ttrform")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TtrformRepository")
 */
class Ttrform
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_at", type="datetime")
     */
    private $modifiedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;



    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Cargo")
     * @ORM\JoinTable(name="ttrform_cargo",
     *      joinColumns={@ORM\JoinColumn(name="ttrform_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="cargo_id", referencedColumnName="id")}
     *      )
     */
    private $cargos;



    /**
     * @ORM\OneToMany(targetEntity="Ttrfieldsf", mappedBy="ttrform")
     */
    private $ttrfieldsf;




    /**
     * @ORM\ManyToOne(targetEntity="SmbdEtlExtract", inversedBy="ttrforms")
     * @ORM\JoinColumn(name="smbdEtlExtract_cedula", referencedColumnName="cedula", nullable=false)
     */
    private $smbdEtlExtract;





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
     * Set name
     *
     * @param string $name
     *
     * @return Ttrform
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ttrform
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Ttrform
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Ttrform
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
     * Constructor
     */
    public function __construct()
    {
        $this->cargos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ttrfieldsf = new ArrayCollection();
    }

    /**
     * Add cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     *
     * @return Ttrform
     */
    public function addCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargos[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargos->removeElement($cargo);
    }

    /**
     * Get cargos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargos()
    {
        return $this->cargos;
    }



    /**
     * Add ttrfieldsf
     *
     * @param \AppBundle\Entity\Ttrfieldsf $ttrfieldsf
     *
     * @return Ttrform
     */
    public function addTtrfieldsf(\AppBundle\Entity\Ttrfieldsf $ttrfieldsf)
    {
        $this->ttrfieldsf[] = $ttrfieldsf;

        return $this;
    }

    /**
     * Remove ttrfieldsf
     *
     * @param \AppBundle\Entity\Ttrfieldsf $ttrfieldsf
     */
    public function removeTtrfieldsf(\AppBundle\Entity\Ttrfieldsf $ttrfieldsf)
    {
        $this->ttrfieldsf->removeElement($ttrfieldsf);
    }

    /**
     * Get ttrfieldsf
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTtrfieldsf()
    {
        return $this->ttrfieldsf;
    }

    /**
     * Set smbdEtlExtract
     *
     * @param \AppBundle\Entity\SmbdEtlExtract $smbdEtlExtract
     *
     * @return Ttrform
     */
    public function setSmbdEtlExtract(\AppBundle\Entity\SmbdEtlExtract $smbdEtlExtract)
    {
        $this->smbdEtlExtract = $smbdEtlExtract;

        return $this;
    }

    /**
     * Get smbdEtlExtract
     *
     * @return \AppBundle\Entity\SmbdEtlExtract
     */
    public function getSmbdEtlExtract()
    {
        return $this->smbdEtlExtract;
    }
}
