<script src="js/search.js" ></script>
<section class='section'>

    <h1>Liste des destinations</h1>
    <div class='container'>
        <div class='content'>
            <!--- sofiane - formulaire de recherche à faire plus tard psk j'ai la flemme et pas le tps la -->
            <form autocomplete="off" id="truc">
                <div class="autocomplete" id="auto">   
                    <input type='text'>
                    <input type='submit'>
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
    </div>
</div>
</section>
<script>
    autoComplete(document.getElementById('truc'));
</script>