<section class="section">
    <h2>Panel Administrateur - Détail Statistique</h2>
    <?php

    // vérifier si une date de traversée a été sélectionnée
    if (isset($_GET['dateTraversee'])) {
        $date = $_GET['dateTraversee'];

        // récupérer les statistiques pour cette date de traversée
        $statistiques = getStatistiquesParDate($date);

        // vérifier si les statistiques sont disponibles pour la date donnée
        if (empty($statistiques)) {
            echo "<p>Aucune statistique pour la date de traversée : $date</p>";
            exit();
        }

        // extraire les données de statistiques
        $totalPassagers = $statistiques['TotalPassagers'];
        $passagersTypeA2 = $statistiques['PassagersA2'];
        $passagersTypeA3 = $statistiques['PassagersA3'];
    }

    // afficher les statistiques pour cette date de traversée
    if (!empty($statistiques)) {
        echo "<h2>Statistiques pour la date de traversée : $date</h2>";
        echo "<table>";
        echo "<tr><th>Type de passager</th><th>Nombre de passagers</th></tr>";
        echo "<tr><td>Total</td><td>$totalPassagers</td></tr>";
        echo "<tr><td>Type A2</td><td>$passagersTypeA2</td></tr>";
        echo "<tr><td>Type A3</td><td>$passagersTypeA3</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Aucune statistique pour la date de traversée : $date</p>";
    }
    ?>
</section>