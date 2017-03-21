<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
