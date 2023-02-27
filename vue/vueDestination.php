<script src="js/search.js"></script>
<style>
    table {
        background-color: white;
    }

    td {
        padding: 20px;
        margin: 3px;
    }
</style>
<link rel="stylesheet" href="./css/destinations.css" type="text/css" />
<section>

    <form autocomplete="off" id="truc" action="?action=destinations" method="POST">
        <div class="autocomplete" id="auto">
            <input type='text' id="destination_text" name='desti' class="destination" placeholder="Rechercher une destination, un secteur..." />
            <input type='submit' id="destination_submit" />
            <div id="elements" class='destination' class="test">

            </div>
        </div>
    </form>
    <table>
        <tbody>
            <?php
            if (!empty($destination)) {
            ?>
                <thead>
                    <tr>
                        <td>Numéro</td>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>Distance(Miles marins)</td>
                        <td>Port de départ</td>
                        <td>Port d'arrivée</td>
                    </tr>
                </thead>
        <tbody>
        <?php
                $button = "";
                if (isLoggedOn()) {
                    $ret = true;
                    $button = "Reservable";
                }
                for ($i = 0; $i < count($destination); $i++) {
                    echo '<tr>';
                    echo '<td>' . $destination[$i]['numeroTraversee'] . '</td><td>' . $destination[$i]['dateTraversee'] . '</td><td>' . $destination[$i]['heureTraversee'] . '</td><td>' . $destination[$i]['DistanceEnMillesMarin'] . '</td><td>' . $destination[$i]['libelleDepart'] . '</td><td>' . $destination[$i]['libelleArrivee'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '
            <tr>
            <td>
                Aucune destination trouvée.
            </td>
            </tr>';
            }
        ?>
        </tbody>
    </table>

    </div>
</section>
<script>
    autoComplete(document.getElementById('truc'));
</script>