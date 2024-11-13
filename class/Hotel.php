<?php

class Hotel {
    private string $_nom;
    private string $_adresse;
    private string $_cp;
    private string $_ville;
    private array $_listeChambres;

    public function __construct($nom, $adresse, $cp, $ville) {
        $this->_nom = $nom;
        $this->_adresse = $adresse;
        $this->_cp = $cp;
        $this->_ville = $ville;
        $this->_listeChambres = [];
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }
    public function setAdresse($adresse) {
        $this->_adresse = $adresse;
    }
    public function setCp($cp) {
        $this->_cp = $cp;
    }
    public function setVille($ville) {
        $this->_ville = $ville;
    }

    public function getNom() {
        return $this->_nom;
    }
    public function getAdresse() {
        return $this->_adresse;
    }
    public function getCp() {
        return $this->_cp;
    }
    public function getVille() {
        return $this->_ville;
    }
    public function getTab() {
        return $this->_listeChambres;
    }

    public function addChambre($chambre) {
        $this->_listeChambres[] = $chambre;
    }

    public function countNbChambre() {
        return count($this->_listeChambres);
    }

    public function nbChambreDisponible() {
        $nbChambre = $this->countNbChambre();
        $tabChambres = $this->getTab();
        foreach ($tabChambres as $chambre) {
            if ($chambre->getDisponibilite() == false) {
                $nbChambre -= 1;
            }
        }
        return $nbChambre;
    }

    public function nbChambreReserve() {
        $nbChambre = 0;
        $tabChambres = $this->getTab();
        foreach ($tabChambres as $chambre) {
            if ($chambre->getDisponibilite() == false) {
                $nbChambre += 1;
            }
        }
        return $nbChambre;
    }
    
    public function afficherHotelInfo() {
        $result = $this->_nom." ".$this->_ville."<br>".$this->_adresse." ".$this->_cp." ".$this->_ville."<br>";
        $result .= "Nombre de chambres : ".$this->countNbChambre()."<br>Nombre de chambres réservées : ".$this->nbChambreReserve()."<br>";
        $result .= "Nombre de chambres dispo : ".$this->nbChambreDisponible();
        return $result;
    }

    public function afficherReservationHotel() {
        $i = 0;
        $result = "";
        foreach ($this->_listeChambres as $reservation) {
            $i += 1;
            foreach($reservation->getReservations() as $content) {
                $result .= $content->getClient()->getPrenom()." ".$content->getClient()->getNom()." - Chambre ".$content->getChambre()->getNchambre();
                $result .= " - du ".$content->getDateArrive()." au ".$content->getDateDepart()."<br>";
            }
        }
        $result1 = "Réservation de l'hôtel ".$this->_nom." ".$this->_ville."<br>".$i." RESERVATIONS<br>".$result;
        return $result1;
    }

    public function __toString() {
        return "Cette hotel s'appel ".$this->_nom." et possède ".$this->_nbchambre." chambres dont ".$this->_nbchambredispo." disponible.";
    }
}