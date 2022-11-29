<script src="js/search.js" ></script>
<link rel="stylesheet" href="./css/destinations.css" type="text/css" />
<section>


            <!--- sofiane - formulaire de recherche à faire plus tard psk j'ai la flemme et pas le tps la -->
            <form autocomplete="off" id="truc">
                <div class="autocomplete" id="auto">   
                    <input type='text' placeholder="Rechercher une destination, un secteur..." />
                    <input type='submit' />
                    <div id="elements">
                    
                    </div>
                </div>
            </form>
    <?php
    // Faire un bouton de recherche pour chercher les destinations saisies
    // Faire un boucle qui affichera toutes les destinations existantes

    // s - on recupere les traversées
    $traversees = getTraversees();

    // sofiane - petite boucle foreach afin d'afficher chaque traversée.
    foreach($traversees as $value)
    {
        echo '<p>'.$value['dateTraversee'].' '.$value['CodeLiaison'].'</p>';
    }
    ?> 

</section>
<script>
    autoComplete(document.getElementById('truc'));
</script>