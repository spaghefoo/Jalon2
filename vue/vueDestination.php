<script src="js/search.js"></script>
<section class="section">
            <form autocomplete="off" id="truc" action="?action=destinations" method="POST">
                <div class="autocomplete" id="auto">
                    <input type='text' name='desti' class="destination_text" placeholder="Rechercher une destination, un secteur..." />
                    <input type='submit' />
                    <div id="elements" class='destination' class="test">

                    </div>
                </div>
            </form>
        <table>
            <tbody>
    <?php
        if(!empty($destination))
        {
            ?>
            <thead>
                <tr>
                    <td>Numéro</td>
                    <td>Date</td>
                    <td>Heure</td>
                    <td>Distance(Miles marins)</td>
                    <td>Port de départ</td>
                    <td>Port d'arrivée</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            <?php
            $button = "";
            if(isLoggedOn())
            {
                $button = "Détails";
                $class = 'connected';
            }
            else
            {
                $button = "Connexion";
                $class = 'notconnected';
            }
            for($i = 0; $i < count($destination); $i++)
            {
                echo '<tr>';
                echo '<td>'.$destination[$i]['numeroTraversee'].'</td>
                <td>'.$destination[$i]['dateTraversee'].'</td>
                <td>'.$destination[$i]['heureTraversee'].'</td>
                <td>'.$destination[$i]['DistanceEnMillesMarin'].'</td>
                <td>'.$destination[$i]['libelleDepart'].'</td>
                <td>'.$destination[$i]['libelleArrivee'].'</td>';
                echo
                '<td><a class='.$class.' href= >'.$button.'</a></td></tr>';
            }
        }
        else
        {
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script>
    autoComplete(document.getElementById('truc'));
</script>