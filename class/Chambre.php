<?php

class Chambre {
    private Hotel $_hotel;
    private int $_numeroChambre;
    private float $_prix;
    private bool $_wifi;
    private bool $_disponibilite;
    private array $_listeReservations;

    public function __construct($hotel, $numeroChambre, $prix, $wifi, $disponibilite) {
        $this->_hotel = $hotel;
        $this->_numeroChambre = $numeroChambre;
        $this->_prix = $prix;
        $this->_wifi = $wifi;
        $this->_disponibilite = $disponibilite;
        $this->_listeReservations = [];
        $hotel->addChambre($this);
    }

    public function setNchambre($nchambre) {
        $this->_numeroChambre = $nchambre;
    }
    public function setPrix($prix) {
        $this->_prix = $prix;
    }
    public function setWifi($wifi) {
        $this->_wifi = $wifi;
    }
    public function setDisponibilite($dispo) {
        $this->_disponibilite = $dispo;
    }

    public function getNchambre() {
        return $this->_nchambre;
    }
    public function getPrix() {
        return $this->_prix;
    }
    public function getWifi() {
        return $this->_wifi;
    }
    public function getDisponibilite() {
        return $this->_disponibilite;
    }

    public function addReservation($reservation) {
        $this->_listeReservations[] = $reservation;
    }
    public function getReservations() {
        return $this->_listeReservations;
    }

    public function __toString() {
        return "Le numéro de cette chambre est ".$this->_nchambre.", elle coûte ".$this->_prix." la nuit.<br>";
    }
}