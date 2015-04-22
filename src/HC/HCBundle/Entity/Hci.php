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


    private $alergia;


    private $condicion;

    private $consumo;

    private $medicamento;
    
    private $notacita;
    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alergia = new \Doctrine\Common\Collections\ArrayCollection();
        $this->condicion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consumo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medicamento = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notacita = new \Doctrine\Common\Collections\ArrayCollection();

    }
    public function __toString(){
        return "Nombre Del HCI";
    }
    /**
     * Get idhci
     *
     * @return integer 
     */
     public function getId()
    {
        return $this->idhci;
    }

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

    /**
     * Add alergia
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergia
     * @return Hci
     */
    public function addAlergia(\HC\HCBundle\Entity\Phcialergia $alergia)
    {
        $this->alergia[] = $alergia;

        return $this;
    }

    /**
     * Remove alergia
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergia
     */
    public function removeAlergia(\HC\HCBundle\Entity\Phcialergia $alergia)
    {
        $this->alergia->removeElement($alergia);
    }

    /**
     * Get alergia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlergia()
    {
        return $this->alergia;
    }

    /**
     * Add condicion
     *
     * @param \HC\HCBundle\Entity\Phcicondicion $condicion
     * @return Hci
     */
    public function addCondicion(\HC\HCBundle\Entity\Phcicondicion $condicion)
    {
        $this->condicion[] = $condicion;

        return $this;
    }

    /**
     * Remove condicion
     *
     * @param \HC\HCBundle\Entity\Phcicondicion $condicion
     */
    public function removeCondicion(\HC\HCBundle\Entity\Phcicondicion $condicion)
    {
        $this->condicion->removeElement($condicion);
    }

    /**
     * Get condicion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Add consumo
     *
     * @param \HC\HCBundle\Entity\Phciconsumo $consumo
     * @return Hci
     */
    public function addConsumo(\HC\HCBundle\Entity\Phciconsumo $consumo)
    {
        $this->consumo[] = $consumo;

        return $this;
    }

    /**
     * Remove consumo
     *
     * @param \HC\HCBundle\Entity\Phciconsumo $consumo
     */
    public function removeConsumo(\HC\HCBundle\Entity\Phciconsumo $consumo)
    {
        $this->consumo->removeElement($consumo);
    }

    /**
     * Get consumo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConsumo()
    {
        return $this->consumo;
    }

    /**
     * Add medicamento
     *
     * @param \HC\HCBundle\Entity\Phcimedicamento $medicamento
     * @return Hci
     */
    public function addMedicamento(\HC\HCBundle\Entity\Phcimedicamento $medicamento)
    {
        $this->medicamento[] = $medicamento;

        return $this;
    }

    /**
     * Remove medicamento
     *
     * @param \HC\HCBundle\Entity\Phcimedicamento $medicamento
     */
    public function removeMedicamento(\HC\HCBundle\Entity\Phcimedicamento $medicamento)
    {
        $this->medicamento->removeElement($medicamento);
    }

    /**
     * Get medicamento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedicamento()
    {
        return $this->medicamento;
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

    public function setConsumo($consumos){
            $this->consumo=$consumos;
            foreach ($consumos as $consumo ) {
               $consumo->setIdhci($this);
            }
    }
    public function setCondicion($condiciones){
            $this->condicion=$condiciones;
            foreach ($condiciones as $condicion ) {
               $condicion->setIdhci($this);
            }
    }
     public function setAlergia($alergias){
            $this->alergia=$alergias;
            foreach ($alergias as $alergia ) {
               $alergia->setIdhci($this);
            }
    }
     public function setMedicamento($medicamentos){
            $this->medicamento=$medicamentos;
            foreach ($medicamentos as $medicamento ) {
               $medicamento->setIdhci($this);
            }
    }
    public function setNotacita($notacitas){
            $this->notacita=$notacitas;
            foreach ($notacitas as $notacita ) {
               $notacita->setIdhci($this);
            }
    }
    /**
     * Get notacita
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotacita()
    {
        return $this->notacita;
    }

    /**
     * Add notacita
     *
     * @param \HC\HCBundle\Entity\Notacita $notacita
     * @return Hci
     */
    public function addNotacita(\HC\HCBundle\Entity\Notacita $notacita)
    {
        $this->notacita[] = $notacita;

        return $this;
    }

    /**
     * Remove notacita
     *
     * @param \HC\HCBundle\Entity\Notacita $notacita
     */
    public function removeNotacita(\HC\HCBundle\Entity\Notacita $notacita)
    {
        $this->notacita->removeElement($notacita);
    }

    /**
     * Add alergia
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergia
     * @return Hci
     */
    public function addAlergium(\HC\HCBundle\Entity\Phcialergia $alergia)
    {
        $this->alergia[] = $alergia;

        return $this;
    }

    /**
     * Remove alergia
     *
     * @param \HC\HCBundle\Entity\Phcialergia $alergia
     */
    public function removeAlergium(\HC\HCBundle\Entity\Phcialergia $alergia)
    {
        $this->alergia->removeElement($alergia);
    }

    /**
     * Add notacita
     *
     * @param \HC\HCBundle\Entity\Notacita $notacita
     * @return Hci
     */
    public function addNotacitum(\HC\HCBundle\Entity\Notacita $notacita)
    {
        $this->notacita[] = $notacita;

        return $this;
    }

    /**
     * Remove notacita
     *
     * @param \HC\HCBundle\Entity\Notacita $notacita
     */
    public function removeNotacitum(\HC\HCBundle\Entity\Notacita $notacita)
    {
        $this->notacita->removeElement($notacita);
    }
    public function ObtenerReporteInsercion(){
        $pacienteNombre=$this->getIdpaciente()->getNombre();
            $pacienteApellido=$this->getIdpaciente()->getApellido();
             $descripcion="La Historia Clinica Inical del paciente ".$pacienteNombre." ".$pacienteApellido;

         return $descripcion;
    }
}
