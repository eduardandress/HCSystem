<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipotel
 */
class Tipotel
{
    /**
     * @var integer
     */
    private $idtipotel;

    /**
     * @var string
     */
    private $nombre;

        public function  __toString(){
            return $this->nombre;
        }
    /**
     * Get idtipotel
     *
     * @return integer 
     */
    public function getIdtipotel()
    {
        return $this->idtipotel;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tipotel
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
    public function getId(){
        return $this->idtipotel;
    }
}
