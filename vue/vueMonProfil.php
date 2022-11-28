<section class="section">
    <h2>Mon profil</h2>

    Mon Id client : <?= $util["IdClient"] ?> <br /></br>
    Mon Nom : <?= $util["Nom"] ?> <br /></br>
    Mon adresse électronique : <?= $util["AdresseMail"] ?> <br /></br>
    Mon code postal : <?= $util["CP"] ?> <br /></br>
    Ma Ville : <?= $util["Ville"] ?> <br /></br>

    <!--Indiquer les informations nécessaire-->
    <!--Faire un bouton déconnexion-->
    <!--
<div class="conexion/deconnexion">
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) : ?>
        <a href="?logout()">Se déconnecter</a>
    <?php else : ?>
        <a href="vueAuthentification.php">Se connecter</a>
    <?php endif; ?>
</div>
-->
    <a href="./?action=mesReservations">Mes inscriptions</a><br><br>
    <a href="./?action=deconnexion">Se déconnecter</a>

</section>