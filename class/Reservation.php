<?php

class Reservation {
    private Chambre $_chambre;
    private Client $_client;
    private DateTime $_dateArrive;
    private DateTime $_dateDepart;

    public function setDateArrive($date) {
        $_dateArrive = new DateTime($date);
    }
    public function setDateDepart($date) {
        $_dateDepart = new DateTime($date);
    }
    public function setChambre($chambre) {
        $_chambre = $chambre;
    }
    public function setClient($client) {
        $_client = $client;
    }

    public function getDateArrive() {
        return $this->_dateArrive->format("d-m-Y");
    }
    public function getDateDepart() {
        return $this->_dateDepart->format("d-m-Y");
    }
    public function getChambre() {
        return $this->_chambre;
    }
    public function getClient() {
        return $this->_client;
    }

    public function __construct($chambre, $client, $dateArrive, $dateDepart) {
        $this->_chambre = $chambre;
        $this->_client = $client;
        $this->_dateArrive = new DateTime($dateArrive);
        $this->_dateDepart = new DateTime($dateDepart);
        $chambre->setDisponibilite(false);
        $chambre->addReservation($this);
        $client->addReservation($this);
    }

    public function addReservation($chambre, $client, $dateArrive, $dateDepart) {
        $this->_dateArrive = $dateArrive;
        $this->_dateDepart = $dateDepart;
        $chambre->setDisponibilite(false);
        $chambre->addReservation($this);
        $client->addReservation($this);
    }

    public function __toString() {
        return "Reservation faites par : ".$_client->$_prenom." ".$_client->$_nom." dans l'hotel ".$_chambre->$_hotel->$_nom.".<br>";
    }
}