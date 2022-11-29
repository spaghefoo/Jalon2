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
    </div>
</div>
</section>
<script>
        autoComplete(document.getElementById('truc'));
</script>