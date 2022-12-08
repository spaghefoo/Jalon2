<script src="js/search.js" ></script>
<style>
    table
    {
        background-color:white;
    }
</style>
<link rel="stylesheet" href="./css/destinations.css" type="text/css" />
<section>


            <!--- sofiane - formulaire de recherche à faire plus tard psk j'ai la flemme et pas le tps la -->
            <form autocomplete="off" id="truc" action="?action=destinations" method="POST">
                <div class="autocomplete" id="auto">   
                    <input type='text' name='desti' class="destination" placeholder="Rechercher une destination, un secteur..." />
                    <input type='submit' />
                    <div id="elements" class='destination' class="test">
                    
                    </div>
                </div>
            </form>
        <table>
            <tbody>
    <?php
        if(!empty($_POST))
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
                </tr>
            </thead>
            <tbody>
            <?php
            for($i = 0; $i < count($destination); $i++)
            {
                echo '<tr>';
                echo '<td>'.$destination[$i]['numeroTraversee'].'</td><td>'.$destination[$i]['dateTraversee'].'</td><td>'.$destination[$i]['heureTraversee'].'</td><td>'.$destination[$i]['DistanceEnMillesMarin'].'</td><td>'.$destination[$i]['libelleDepart'].'</td><td>'.$destination[$i]['libelleArrivee'].'</td>';
                echo '</tr>';
            }
        }
    ?> 
            </tbody>
        </table>

        </div>
</section>
<script>
        autoComplete(document.getElementById('truc'));
</script>