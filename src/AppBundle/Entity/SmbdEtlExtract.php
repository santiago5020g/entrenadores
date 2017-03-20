<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SmbdEtlExtract
 *
 * @ORM\Table(name="smbd_etl_extract")
 * @ORM\Entity
 */
class SmbdEtlExtract
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=190, nullable=true)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=190, nullable=true)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=190, nullable=true)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="canal", type="string", length=190, nullable=true)
     */
    private $canal;

    /**
     * @var string
     *
     * @ORM\Column(name="gerencia", type="string", length=190, nullable=true)
     */
    private $gerencia;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=190, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="bu", type="string", length=190, nullable=true)
     */
    private $bu;

    /**
     * @var string
     *
     * @ORM\Column(name="vp", type="string", length=190, nullable=true)
     */
    private $vp;

    /**
     * @var string
     *
     * @ORM\Column(name="proveedor", type="string", length=190, nullable=true)
     */
    private $proveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_contratacion", type="string", length=190, nullable=true)
     */
    private $fechaContratacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=190, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="depto", type="string", length=190, nullable=true)
     */
    private $depto;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=190, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=190, nullable=true)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="fuente", type="string", length=190, nullable=true)
     */
    private $fuente;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=190)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cedula;



    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return SmbdEtlExtract
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return SmbdEtlExtract
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return SmbdEtlExtract
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return SmbdEtlExtract
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set canal
     *
     * @param string $canal
     *
     * @return SmbdEtlExtract
     */
    public function setCanal($canal)
    {
        $this->canal = $canal;

        return $this;
    }

    /**
     * Get canal
     *
     * @return string
     */
    public function getCanal()
    {
        return $this->canal;
    }

    /**
     * Set gerencia
     *
     * @param string $gerencia
     *
     * @return SmbdEtlExtract
     */
    public function setGerencia($gerencia)
    {
        $this->gerencia = $gerencia;

        return $this;
    }

    /**
     * Get gerencia
     *
     * @return string
     */
    public function getGerencia()
    {
        return $this->gerencia;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return SmbdEtlExtract
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set bu
     *
     * @param string $bu
     *
     * @return SmbdEtlExtract
     */
    public function setBu($bu)
    {
        $this->bu = $bu;

        return $this;
    }

    /**
     * Get bu
     *
     * @return string
     */
    public function getBu()
    {
        return $this->bu;
    }

    /**
     * Set vp
     *
     * @param string $vp
     *
     * @return SmbdEtlExtract
     */
    public function setVp($vp)
    {
        $this->vp = $vp;

        return $this;
    }

    /**
     * Get vp
     *
     * @return string
     */
    public function getVp()
    {
        return $this->vp;
    }

    /**
     * Set proveedor
     *
     * @param string $proveedor
     *
     * @return SmbdEtlExtract
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set fechaContratacion
     *
     * @param string $fechaContratacion
     *
     * @return SmbdEtlExtract
     */
    public function setFechaContratacion($fechaContratacion)
    {
        $this->fechaContratacion = $fechaContratacion;

        return $this;
    }

    /**
     * Get fechaContratacion
     *
     * @return string
     */
    public function getFechaContratacion()
    {
        return $this->fechaContratacion;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return SmbdEtlExtract
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set depto
     *
     * @param string $depto
     *
     * @return SmbdEtlExtract
     */
    public function setDepto($depto)
    {
        $this->depto = $depto;

        return $this;
    }

    /**
     * Get depto
     *
     * @return string
     */
    public function getDepto()
    {
        return $this->depto;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return SmbdEtlExtract
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return SmbdEtlExtract
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set fuente
     *
     * @param string $fuente
     *
     * @return SmbdEtlExtract
     */
    public function setFuente($fuente)
    {
        $this->fuente = $fuente;

        return $this;
    }

    /**
     * Get fuente
     *
     * @return string
     */
    public function getFuente()
    {
        return $this->fuente;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }
}
