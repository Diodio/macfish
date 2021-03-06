<?php

namespace Facture;

/** @Entity @HasLifecycleCallbacks 
 * @Table(name="conteneur_temp") * */
class ConteneurTemp {

    /** @Id
     * @Column(type="integer"), @GeneratedValue
     */
    protected $id;
  
    /**
     * @Column(type="integer", nullable=true)
     * */
    protected $facture;
    
    /**
     * @Column(type="string", length=60, nullable=true)
     * */
    protected $numConteneur;
    
    /**
     * @Column(type="string", length=60, nullable=true)
     * */
    protected $numPlomb;
    
    
    public function getId() {
        return $this->id;
    }

    public function getFacture() {
        return $this->facture;
    }

    public function getNumConteneur() {
        return $this->numConteneur;
    }

    public function getNumPlomb() {
        return $this->numPlomb;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFacture($facture) {
        $this->facture = $facture;
    }

    public function setNumConteneur($numConteneur) {
        $this->numConteneur = $numConteneur;
    }

    public function setNumPlomb($numPlomb) {
        $this->numPlomb = $numPlomb;
    }



    }
