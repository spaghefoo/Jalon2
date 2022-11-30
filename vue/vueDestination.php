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
    </div>
</div>
</section>
<script>
        autoComplete(document.getElementById('truc'));
</script>