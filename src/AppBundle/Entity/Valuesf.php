<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valuesf
 *
 * @ORM\Table(name="valuesf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ValuesfRepository")
 */
class Valuesf
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
     * @ORM\Column(name="description", type="string", length=50)
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="Ttrfieldsf", inversedBy="valuesfs")
     * @ORM\JoinColumn(name="ttrfieldsf_id", referencedColumnName="id")
     */
    private $ttrfieldsf;



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
     * Set description
     *
     * @param string $description
     *
     * @return Valuesf
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
     * Set ttrfieldsf
     *
     * @param \AppBundle\Entity\Ttrfieldsf $ttrfieldsf
     *
     * @return Valuesf
     */
    public function setTtrfieldsf(\AppBundle\Entity\Ttrfieldsf $ttrfieldsf = null)
    {
        $this->ttrfieldsf = $ttrfieldsf;

        return $this;
    }

    /**
     * Get ttrfieldsf
     *
     * @return \AppBundle\Entity\Ttrfieldsf
     */
    public function getTtrfieldsf()
    {
        return $this->ttrfieldsf;
    }
}
