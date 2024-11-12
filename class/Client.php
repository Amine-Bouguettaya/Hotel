<?php

class Client {
    private string $_nom;
    private string $_prenom;
    private array $_listeReservations;

    public function __construct($nom, $prenom) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_listeReservations = [];
    }
    public function setNom($nom) {
        $this->_nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function getNom() {
        return $this->_nom;
    }
    public function getPrenom() {
        return $this->_prenom;
    }

    public function addReservation($reservation) {
        $this->_listeReservations[] = $reservation;
    }

    public function __toString() {
        return "Ce client s'appel ".$this->_prenom." ".$this->_nom.".<br>";
    }
}