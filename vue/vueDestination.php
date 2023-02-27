<script src="js/search.js"></script>
<style>
    table {
        background-color: white;
    }

    td {
        padding: 20px;
        margin: 3px;
    }

    a.connected
    {
        background-color:#4D88FF;
        border-radius:20px;

    }
    a.notconnected
    {
        background-color:#8a889b;
        border-radius:20px;
    }
    a
    {
        color:white;
        padding-top:3px;
        padding-bottom:3px;
        padding-left:18px;
        padding-right:18px; 
    }

</style>
<link rel="stylesheet" href="./css/destinations.css" type="text/css" />
<section>

    <form autocomplete="off" id="truc" action="?action=destinations" method="POST">
        <div class="autocomplete" id="auto">
            <input type='text' id="destination_text" name='desti' class="destination" placeholder="Rechercher une destination, un secteur..." />
            <input type='submit' id="destination_submit" />
            <div id="elements" class='destination' class="test">

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
                //$ret = true;
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
<script>
    autoComplete(document.getElementById('truc'));
</script>