<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel='stylesheet' type='text/css' href='../CSS/entete.css' /> -->
    <title><?php echo $titre ?></title>
    <style>
        @import url("CSS/base.css");
        @import url("CSS/entete.css");
    </style>
    <div class="page">
        <nav class="page__menu page__custom-settings menu">
            <ul class="menu__list r-list">
                <li class="menu__group"><a href="./?action=accueil"" class="menu__link r-link text-underlined">Marie♥Team</a></li>
                <li class="menu__group"><a href="./?action=qui-sommes-nous" class="menu__link r-link text-underlined">Qui sommes-nous ?</a></li>
                <li class="menu__group"><a href="./?action=destinations" class="menu__link r-link text-underlined">Destinations</a></li>
                <li class="menu__group"><a href="./?action=tarifs" class="menu__link r-link text-underlined">Tarifs</a></li>
                <?php if (isLoggedOn()) {?>
                <li class="menu__group"><a href="./?action=profil" class="menu__link r-link text-underlined">MonProfil</a></li>
                <?php }
                else{?>
                    <li class="menu__group"><a href="./?action=connexion" class="menu__link r-link text-underlined">Connexion</a></li>
                <?php }?>
            </ul>
        </nav>
    </div>
</head>
<body>
<!--Ici faire une navbar-->
<!--
<nav>
    <ul id="menuGeneral">
        <h2>Marie♥Team</h2>
        <li><a href="./?action=accueil">Accueil</a></li>
        <li><a href="./?action=recherche"><img src="images/rechercher.png" alt="loupe" />Recherche</a></li>
        <li></li>
        <li id="logo"><a href="./?action=accueil"><img src="images/logoBarre.png" alt="logo" /></a></li>
        <li></li>
        <li><a href="./?action=cgu">CGU</a></li>
        <?php if (isLoggedOn()) {?>
            <li class='connexion'><a href="./?action=monprofil"><img src="images/profil.png" alt="loupe" />MonProfil</a></li>
      <?php }
       else{?>
            <li class='connexion'><a href="./?action=connexion"><img src="images/profil.png" alt="loupe" />Connexion</a></li>
       <?php }?>

    </ul>
</nav>
-->
<!--Ne pas fermer l'html et le body (il est fermer dans la page pied.php)-->