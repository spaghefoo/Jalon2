<section class='section'>
    
    <h1>Liste des réservations de <?php echo $mailU?></h1><br>
    <div class='container'>
        <div class='content'>

<?php
if (count($listeReservations) > 0) {
    echo "<table id='reservations'>";
    echo "<tr><th>#Reservation</th><th>Date réservation</th><th>#Traversée</th><th>Date traversée</th><th>Port départ</th><th>Port arrivée</th></tr>";
    for ($i = 0; $i < count($listeReservations); $i++) {
        echo "<tr>";
        echo    "<td><a href=./?action=detail-reservation&idReservation=".
                $listeReservations[$i]['IdReservation']." title='Cliquez pour les détails de la reservation'>#".
                $listeReservations[$i]['IdReservation'].
                "</a></td>";
        echo "<td>".$listeReservations[$i]['DateReservation']."</td>";
        echo "<td>".$listeReservations[$i]['numeroTraversee']."</td>";
        echo "<td>".$listeReservations[$i]['dateTraversee']."</td>";
        echo "<td>".$listeReservations[$i]['portDepart']."</td>";
        echo "<td>".$listeReservations[$i]['portArrivee']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else {
    echo "AUCUNE RESERVATION<br>";
}
?>
        </div>
</div>
</section>