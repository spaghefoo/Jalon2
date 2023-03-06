<section class="section">
    <h2>Mon profil</h2>

    Mon Id client : <?= $util["IdClient"] ?> <br /></br>
    Mon Nom : <?= $util["Nom"] ?> <br /></br>
    Mon adresse électronique : <?= $util["AdresseMail"] ?> <br /></br>
    Mon code postal : <?= $util["CP"] ?> <br /></br>
    Ma Ville : <?= $util["Ville"] ?> <br /></br>

    <a href="./?action=mesReservations">Mes réservations</a><br><br>
    <a href="./?action=deconnexion">Se déconnecter</a>

</section>