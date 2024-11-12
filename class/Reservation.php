<?php

class Reservation {
    private Chambre $_chambre;
    private Client $_client;
    private DateTime $_dateArrive;
    private DateTime $_dateDepart;

    public function setDateArrive($date) {
        $_dateArrive->$date = $date;
    }
    public function setDateDepart($date) {
        $_dateDepart->$date = $date;
    }

    public function getDateArrive() {
        return $_dateArrive->$date->format("d-m-Y");
    }
    public function getDateDepart() {
        return $_dateDepart->$date->format("d-m-Y");
    }

    public function __construct($chambre, $client, $dateArrive, $dateDepart) {
        $this->_chambre = $chambre;
        $this->_client = $client;
        $this->_dateArrive = new DateTime($dateArrive);
        $this->_dateDepart = new DateTime($dateDepart);
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