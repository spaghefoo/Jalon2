
<h1>Mon profil</h1>

Mon adresse électronique : </br>
Mon pseudo : </br>

<!--Indiquer les informations nécessaire-->
<!--Faire un bouton déconnexion-->
<div class="conexion/deconnexion">
    <?php if( isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null ) : ?>
        <a href="?logout()">Se déconnecter</a>
    <?php else : ?>
        <a href="vueAuthentification.php">Se connecter</a>
    <?php endif; ?>
</div>
