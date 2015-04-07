<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pacnumcontacto
 */
class Pacnumcontacto
{
    /**
     * @var integer
     */
    private $idpacnumcontacto;

    /**
     * @var integer
     */
    private $nombrecontacto;

    /**
     * @var string
     */
    private $apellidocontacto;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $relacion;

    /**
     * @var \DateTime
     */
    private $fechaagregado;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;


    /**
     * Get idpacnumcontacto
     *
     * @return integer 
     */
    public function getIdpacnumcontacto()
    {
        return $this->idpacnumcontacto;
    }

    /**
     * Set nombrecontacto
     *
     * @param integer $nombrecontacto
     * @return Pacnumcontacto
     */
    public function setNombrecontacto($nombrecontacto)
    {
        $this->nombrecontacto = $nombrecontacto;

        return $this;
    }

    /**
     * Get nombrecontacto
     *
     * @return integer 
     */
    public function getNombrecontacto()
    {
        return $this->nombrecontacto;
    }

    /**
     * Set apellidocontacto
     *
     * @param string $apellidocontacto
     * @return Pacnumcontacto
     */
    public function setApellidocontacto($apellidocontacto)
    {
        $this->apellidocontacto = $apellidocontacto;

        return $this;
    }

    /**
     * Get apellidocontacto
     *
     * @return string 
     */
    public function getApellidocontacto()
    {
        return $this->apellidocontacto;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Pacnumcontacto
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set relacion
     *
     * @param string $relacion
     * @return Pacnumcontacto
     */
    public function setRelacion($relacion)
    {
        $this->relacion = $relacion;

        return $this;
    }

    /**
     * Get relacion
     *
     * @return string 
     */
    public function getRelacion()
    {
        return $this->relacion;
    }

    /**
     * Set fechaagregado
     *
     * @param \DateTime $fechaagregado
     * @return Pacnumcontacto
     */
    public function setFechaagregado($fechaagregado)
    {
        $this->fechaagregado = $fechaagregado;

        return $this;
    }

    /**
     * Get fechaagregado
     *
     * @return \DateTime 
     */
    public function getFechaagregado()
    {
        return $this->fechaagregado;
    }

    /**
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Pacnumcontacto
     */
    public function setIdpaciente(\HC\HCBundle\Entity\Paciente $idpaciente = null)
    {
        $this->idpaciente = $idpaciente;

        return $this;
    }

    /**
     * Get idpaciente
     *
     * @return \HC\HCBundle\Entity\Paciente 
     */
    public function getIdpaciente()
    {
        return $this->idpaciente;
    }
}
