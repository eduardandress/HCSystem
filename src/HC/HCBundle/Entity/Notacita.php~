<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notacita
 */
class Notacita
{
    /**
     * @var integer
     */
    private $idnotacita;

    /**
     * @var float
     */
    private $presionarterial;

    /**
     * @var float
     */
    private $alturapaciente;

    /**
     * @var float
     */
    private $pesopaciente;

    /**
     * @var float
     */
    private $frecuenciacardiaca;

    /**
     * @var float
     */
    private $temperatura;

    /**
     * @var \HC\HCBundle\Entity\Cita
     */
    private $idcita;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prescripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $diagnostico;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $referencia;

    /**
     * @var \HC\HCBundle\Entity\Hci
     */
    private $idhci;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prescripcion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->diagnostico = new \Doctrine\Common\Collections\ArrayCollection();
        $this->referencia = new \Doctrine\Common\Collections\ArrayCollection();
    }
      public function __toString(){
            return "Nota cita nombre";
        }
    /**
     * Get idnotacita
     *
     * @return integer 
     */
    public function getIdnotacita()
    {
        return $this->idnotacita;
    }

    /**
     * Set presionarterial
     *
     * @param float $presionarterial
     * @return Notacita
     */
    public function setPresionarterial($presionarterial)
    {
        $this->presionarterial = $presionarterial;

        return $this;
    }

    /**
     * Get presionarterial
     *
     * @return float 
     */
    public function getPresionarterial()
    {
        return $this->presionarterial;
    }

    /**
     * Set alturapaciente
     *
     * @param float $alturapaciente
     * @return Notacita
     */
    public function setAlturapaciente($alturapaciente)
    {
        $this->alturapaciente = $alturapaciente;

        return $this;
    }

    /**
     * Get alturapaciente
     *
     * @return float 
     */
    public function getAlturapaciente()
    {
        return $this->alturapaciente;
    }

    /**
     * Set pesopaciente
     *
     * @param float $pesopaciente
     * @return Notacita
     */
    public function setPesopaciente($pesopaciente)
    {
        $this->pesopaciente = $pesopaciente;

        return $this;
    }

    /**
     * Get pesopaciente
     *
     * @return float 
     */
    public function getPesopaciente()
    {
        return $this->pesopaciente;
    }

    /**
     * Set frecuenciacardiaca
     *
     * @param float $frecuenciacardiaca
     * @return Notacita
     */
    public function setFrecuenciacardiaca($frecuenciacardiaca)
    {
        $this->frecuenciacardiaca = $frecuenciacardiaca;

        return $this;
    }

    /**
     * Get frecuenciacardiaca
     *
     * @return float 
     */
    public function getFrecuenciacardiaca()
    {
        return $this->frecuenciacardiaca;
    }

    /**
     * Set temperatura
     *
     * @param float $temperatura
     * @return Notacita
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    /**
     * Get temperatura
     *
     * @return float 
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * Set idcita
     *
     * @param \HC\HCBundle\Entity\Cita $idcita
     * @return Notacita
     */
    public function setIdcita(\HC\HCBundle\Entity\Cita $idcita = null)
    {
        $this->idcita = $idcita;

        return $this;
    }

    /**
     * Get idcita
     *
     * @return \HC\HCBundle\Entity\Cita 
     */
    public function getIdcita()
    {
        return $this->idcita;
    }

    /**
     * Add prescripcion
     *
     * @param \HC\HCBundle\Entity\Prescripcion $prescripcion
     * @return Notacita
     */
    public function addPrescripcion(\HC\HCBundle\Entity\Prescripcion $prescripcion)
    {
        $this->prescripcion[] = $prescripcion;

        return $this;
    }

    /**
     * Remove prescripcion
     *
     * @param \HC\HCBundle\Entity\Prescripcion $prescripcion
     */
    public function removePrescripcion(\HC\HCBundle\Entity\Prescripcion $prescripcion)
    {
        $this->prescripcion->removeElement($prescripcion);
    }

    /**
     * Get prescripcion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrescripcion()
    {
        return $this->prescripcion;
    }

    /**
     * Add diagnostico
     *
     * @param \HC\HCBundle\Entity\Diagnostico $diagnostico
     * @return Notacita
     */
    public function addDiagnostico(\HC\HCBundle\Entity\Diagnostico $diagnostico)
    {
        $this->diagnostico[] = $diagnostico;

        return $this;
    }

    /**
     * Remove diagnostico
     *
     * @param \HC\HCBundle\Entity\Diagnostico $diagnostico
     */
    public function removeDiagnostico(\HC\HCBundle\Entity\Diagnostico $diagnostico)
    {
        $this->diagnostico->removeElement($diagnostico);
    }

    /**
     * Get diagnostico
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Add referencia
     *
     * @param \HC\HCBundle\Entity\Referencia $referencia
     * @return Notacita
     */
    public function addReferencia(\HC\HCBundle\Entity\Referencia $referencia)
    {
        $this->referencia[] = $referencia;

        return $this;
    }

    /**
     * Remove referencia
     *
     * @param \HC\HCBundle\Entity\Referencia $referencia
     */
    public function removeReferencia(\HC\HCBundle\Entity\Referencia $referencia)
    {
        $this->referencia->removeElement($referencia);
    }

    /**
     * Get referencia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set idhci
     *
     * @param \HC\HCBundle\Entity\Hci $idhci
     * @return Notacita
     */
    public function setIdhci(\HC\HCBundle\Entity\Hci $idhci = null)
    {
        $this->idhci = $idhci;

        return $this;
    }

    /**
     * Get idhci
     *
     * @return \HC\HCBundle\Entity\Hci 
     */
    public function getIdhci()
    {
        return $this->idhci;
    }
    //Setters de prescripcion, referencia y diagnostico
    public function setPrescripcion($prescripciones,$Medico ){
            $this->prescripcion=$prescripciones;
            foreach ($prescripciones as $prescripcion) {
                $prescripcion->setIdnotacita($this);
                $prescripcion->setIdusuario($Medico);
            }
    }
    public function setReferencia($referencias,$Medico){
            $this->referencia=$referencias;
            foreach ($referencias as $referencia) {
                $referencia->setIdnotacita($this);
                $referencia->setIdusuario($Medico);

            }
    }
    public function setDiagnostico($diagnosticos,$Medico){

            $this->diagnostico=$diagnosticos;
            foreach ($diagnosticos as $diagnostico) {
                $diagnostico->setIdnotacita($this);
                $diagnostico->setIdusuario($Medico);
            }
    }

    



    /**
     * Add referencia
     *
     * @param \HC\HCBundle\Entity\Referencia $referencia
     * @return Notacita
     */
    public function addReferencium(\HC\HCBundle\Entity\Referencia $referencia)
    {
        $this->referencia[] = $referencia;

        return $this;
    }

    /**
     * Remove referencia
     *
     * @param \HC\HCBundle\Entity\Referencia $referencia
     */
    public function removeReferencium(\HC\HCBundle\Entity\Referencia $referencia)
    {
        $this->referencia->removeElement($referencia);
    }
    public function getId(){
        return $this->idnotacita;
    }
}
