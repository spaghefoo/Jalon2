<section class='section'>
    <h1>Détail de la réservation <?php echo $idReservation?></h1><br><br><br><br><br><br>
    <div class='container'>
        <div class='content'>
            <?php
            if (count($listeDetailsReservation) > 0) {
                echo "<table id='reservations'>";
                echo "<tr><th>Categorie</th><th>Type de tarif</th><th>Quantité</th>";
                for ($i = 0; $i < count($listeDetailsReservation); $i++) {
                    echo "<tr>";
                    echo "<td>".$listeDetailsReservation[$i]['libelleCategorie']."</td>";
                    echo    "<td><a href=./?action=detail-reservation&TypeTarif=".
                        $listeDetailsReservation[$i]['TypeTarif']." title='Cliquez pour les détails du tarif'>#".
                        $listeDetailsReservation[$i]['TypeTarif'].
                        "</a></td>";
                    echo "<td>".$listeDetailsReservation[$i]['Quantite']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "PAS DE DETAIL DANS LA RESERVATION<br>";
            }
            ?>
        </div>
    </div>
</section>