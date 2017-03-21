<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}

