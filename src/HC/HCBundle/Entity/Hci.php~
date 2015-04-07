<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hci
 */
class Hci
{
    /**
     * @var integer
     */
    private $idhci;

    /**
     * @var \DateTime
     */
    private $fechacreacion;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;


     private $alergias;

    private $consumos;

    private $medicamentos;

    private $condiciones;


    public function __construct(){
        $this->alergias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consumos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medicamentos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->condiciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return $this->paciente;
    }
    /**
     * Get idhci
     *
     * @return integer 
     */
    public function getIdhci()
    {
        return $this->idhci;
    }

    /**
     * Set fechacreacion
     *
     * @param \DateTime $fechacreacion
     * @return Hci
     */
    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    /**
     * Get fechacreacion
     *
     * @return \DateTime 
     */
    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }


    
    public function getConsumos(){
        return $this->consumos;
    }
    public function getAlergias(){
        return $this->alergias;
    }
    public function getMedicamentos(){
        return $this->medicamentos;
    }
    public function getCondiciones(){
        return $this->condiciones;
    }
    public function setConsumos($consumos){
        $this->consumos= $consumos;
        foreach ($consumos as $consumo) {
            $consumo->setIdhci($this);
        }
    }
    public function setAlergias($alergias){
        $this->alergias= $alergias;
        foreach ($alergias as $alergia) {
            $alergia->setIdhci($this);
        }
    }
    public function setMedicamentos($medicamentos){
        $this->medicamentos= $medicamentos;
        foreach ($medicamentos as $medicamento) {
            $medicamento->setIdhci($this);
        }
    }
    public function setCondiciones($condiciones){
        $this->condiciones= $condiciones;
        foreach ($condiciones as $condicion) {
            $condicion->setIdhci($this);
        }
    }

  


    /**
     * Add alergias
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergias
     * @return Hci
     */
    public function addAlergias(\HC\HCBundle\Entity\Phcialergia $alergias)
    {
        $this->alergias[] = $alergias;

        return $this;
    }

    /**
     * Remove alergias
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergias
     */
    public function removeAlergias(\HC\HCBundle\Entity\Phcialergia $alergias)
    {
        $this->alergias->removeElement($alergias);
    }

    /**
     * Add consumos
     *
     * @param \HC\HCBundle\Entity\Phciconsumo $consumos
     * @return Hci
     */
    public function addConsumos(\HC\HCBundle\Entity\Phciconsumo $consumos)
    {
        $this->consumos[] = $consumos;

        return $this;
    }

    /**
     * Remove consumos
     *
     * @param \HC\HCBundle\Entity\Phciconsumo $consumos
     */
    public function removeConsumos(\HC\HCBundle\Entity\Phciconsumo $consumos)
    {
        $this->consumos->removeElement($consumos);
    }

    /**
     * Add medicamentos
     *
     * @param \HC\HCBundle\Entity\Phcimedicamento $medicamentos
     * @return Hci
     */
    public function addMedicamentos(\HC\HCBundle\Entity\Phcimedicamento $medicamentos)
    {
        $this->medicamentos[] = $medicamentos;

        return $this;
    }

    /**
     * Remove medicamentos
     *
     * @param \HC\HCBundle\Entity\Phcimedicamento $medicamentos
     */
    public function removeMedicamentos(\HC\HCBundle\Entity\Phcimedicamento $medicamentos)
    {
        $this->medicamentos->removeElement($medicamentos);
    }

    /**
     * Add condiciones
     *
     * @param \HC\HCBundle\Entity\Phcicondicion $condiciones
     * @return Hci
     */
    public function addCondiciones(\HC\HCBundle\Entity\Phcicondicion $condiciones)
    {
        $this->condiciones[] = $condiciones;

        return $this;
    }

    /**
     * Remove condiciones
     *
     * @param \HC\HCBundle\Entity\Phcicondicion $condiciones
     */
    public function removeCondiciones(\HC\HCBundle\Entity\Phcicondicion $condiciones)
    {
        $this->condiciones->removeElement($condiciones);
    }

    /**
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Hci
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
