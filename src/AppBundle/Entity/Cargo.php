<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CargoRepository")
 */
class Cargo
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
     * Many Cargos have Many ttrforms.
     * @ORM\ManyToMany(targetEntity="Ttrform", mappedBy="cargos")
     */
    private $ttrforms;


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
     * @return cargo
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
     * Constructor
     */
    public function __construct()
    {
        $this->ttrforms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ttrform
     *
     * @param \AppBundle\Entity\Ttrform $ttrform
     *
     * @return Cargo
     */
    public function addTtrform(\AppBundle\Entity\Ttrform $ttrform)
    {
        $this->ttrforms[] = $ttrform;

        return $this;
    }

    /**
     * Remove ttrform
     *
     * @param \AppBundle\Entity\Ttrform $ttrform
     */
    public function removeTtrform(\AppBundle\Entity\Ttrform $ttrform)
    {
        $this->ttrforms->removeElement($ttrform);
    }

    /**
     * Get ttrforms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTtrforms()
    {
        return $this->ttrforms;
    }
}
