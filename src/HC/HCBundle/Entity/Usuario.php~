<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Usuario
 */
class Usuario implements UserInterface, \Serializable 
{
    /**
     * @var integer
     */
    private $idusuario;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $clave;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \DateTime
     */
    private $fechanac;

    /**
     * @var string
     */
    private $numss;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var \DateTime
     */
    private $fechainicio;

    /**
     * @var \HC\HCBundle\Entity\Rol
     */
    private $idrol;


    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function __toString(){
        return $this->nombre;
    }
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechanac
     *
     * @param \DateTime $fechanac
     * @return Usuario
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime 
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Set numss
     *
     * @param string $numss
     * @return Usuario
     */
    public function setNumss($numss)
    {
        $this->numss = $numss;

        return $this;
    }

    /**
     * Get numss
     *
     * @return string 
     */
    public function getNumss()
    {
        return $this->numss;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
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
     * Set telefono
     *
     * @param string $telefono
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fechainicio
     *
     * @param \DateTime $fechainicio
     * @return Usuario
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \DateTime 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set idrol
     *
     * @param \HC\HCBundle\Entity\Rol $idrol
     * @return Usuario
     */
    public function setIdrol(\HC\HCBundle\Entity\Rol $idrol = null)
    {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Get idrol
     *
     * @return \HC\HCBundle\Entity\Rol 
     */
    public function getIdrol()
    {
        return $this->idrol;
    }


    /*
    
    Metodos Obligatorios para \Serializable y UserInterface 


    */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }
    public function getUsername()
    {
        return $this->usuario;
    }

    public function getPassword()
    {
        return $this->clave;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->idusuario,
            $this->usuario,
            $this->clave,
            $this->nombre,
            $this->idrol,
            $this->fechainicio
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->idusuario,
            $this->usuario,
            $this->clave,
            $this->nombre,
            $this->idrol,
            $this->fechainicio
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
