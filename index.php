<?php

include "class/Hotel.php";
include "class/Chambre.php";
include "class/Client.php";
include "class/Reservation.php";


$client1 = new Client ("MURMANN", "Micka");
$client2 = new Client ("GIBELLO", "Virgile");
$client3 = new Client ("Monsieur", "Monsieur");
$client4 = new Client ("Madame", "Madame");

$hotel1 = new Hotel ("Hilton", "10 route de la Gare", "67000", "Strasbourg");
$hotel2 = new Hotel ("Hôtel Regent", "1 rue des Abeilles", "Paris", "Paris");
$chambre1 = new Chambre ($hotel1, 1, 100, true, true);
$chambre2 = new Chambre ($hotel1, 2, 100, true, true);
$chambre3 = new Chambre ($hotel1, 3, 100, false, true);
$chambre4 = new Chambre ($hotel1, 4, 100, false, true);
$chambre5 = new Chambre ($hotel2, 1, 100, false, true);
$chambre6 = new Chambre ($hotel2, 2, 100, false, true);
$chambre7 = new Chambre ($hotel2, 3, 100, true, true);
$chambre8 = new Chambre ($hotel2, 4, 100, true, true);

$reservation1 = new Reservation ($chambre1, $client1, "12-11-2024", "24-11-2024");
$reservation2 = new Reservation ($chambre2, $client1, "12-12-2024", "24-12-2024");
$reservation3 = new Reservation ($chambre3, $client2, "12-11-2024", "24-11-2024");
$reservation4 = new Reservation ($chambre5, $client3, "12-11-2024", "24-11-2024");
$reservation5 = new Reservation ($chambre6, $client3, "12-12-2024", "24-12-2024");
$reservation6 = new Reservation ($chambre7, $client4, "12-11-2024", "24-11-2024");


echo $hotel1->afficherHotelInfo();
echo "<br><br>";
echo $hotel2->afficherHotelInfo();
echo "<br><br>";
echo $hotel1->afficherReservationHotel();
echo "<br><br>";
echo $hotel2->afficherReservationHotel();

echo "<br><br>";
echo "<br><br>";

echo afficherChambreHTML($hotel1);

function afficherChambreHTML($hotel) {
    $result = "
    <style>
    table {
        border-collapse: collapse;
    }
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #000000;
    }
    th {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #000000;
        background-color: #f4f4f4;
        font-weight: bold;
    }
    </style>
    <br>
    <table border=1>
                <thead>
                    <tr>
                        <th>Chambre</th>
                        <th>Prix</th>
                        <th>Wifi</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>";
    $wifi ="";
    $disponibilite = "";
    foreach($hotel->getTab() as $chambre) {
        if ($chambre->getWifi() == true) {
            $wifi = "<img src='img/wifi.png'></i>";
        }
        else {
            $wifi = "";
        }
        if ($chambre->getDisponibilite() == true) {
            $disponibilite = "<p style='background-color:DarkSeaGreen; color:white;'>Disponible</p>";
        }
        else {
            $disponibilite = "<p style='background-color:LightCoral; color:white;'>Reservé</p>";
        }
        $result .= "<tr>
                        <td>Chambre ".$chambre->getNchambre()."</td>
                        <td>".$chambre->getPrix()." €</td>
                        <td>".$wifi."</td>
                        <td>".$disponibilite."</td>
                    </tr>";
    }
    $result .= "</tbody></table>";
    return $result;
}