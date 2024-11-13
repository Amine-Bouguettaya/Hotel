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
$chambre1 = new Chambre ($hotel1, 1, 100, 1, false);
$chambre2 = new Chambre ($hotel1, 2, 100, 1, false);
$chambre3 = new Chambre ($hotel1, 3, 100, 1, false);
$chambre4 = new Chambre ($hotel1, 4, 100, 1, true);
$chambre5 = new Chambre ($hotel2, 1, 100, 1, false);
$chambre6 = new Chambre ($hotel2, 2, 100, 1, false);
$chambre7 = new Chambre ($hotel2, 3, 100, 1, true);
$chambre8 = new Chambre ($hotel2, 4, 100, 1, true);

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