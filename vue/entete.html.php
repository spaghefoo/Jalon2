<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <style>
        @import url("CSS/base.css");
    </style>
    <div class="page">
        <nav class="page__menu page__custom-settings menu">
            <ul class="menu__list r-list">
                <li class="menu__group"><a href="./?action=accueil" class="menu__link r-link text-underlined">Marie♥Team</a></li>
                <li class="menu__group"><a href="./?action=qui-sommes-nous" class="menu__link r-link text-underlined">Qui sommes-nous ?</a></li>
                <li class="menu__group"><a href="./?action=destinations" class="menu__link r-link text-underlined">Destinations</a></li>
                <?php if (isLoggedOn()) {
                    if ($_SESSION['mailU'] == "AdminMarieTeam@gmail.com") { ?>
                        <li class="menu__group"><a href="./?action=panelAdmin" class="menu__link r-link text-underlined">Panel Administrateur</a></li>
                        <li class="menu__group"><a href="./?action=profil" class="menu__link r-link text-underlined">Profil</a></li>
                        <?php } else { ?>
                    <li class="menu__group"><a href="./?action=profil" class="menu__link r-link text-underlined">Profil</a></li>
                    <?php } } else { ?>
                    <li class="menu__group"><a href="./?action=connexion" class="menu__link r-link text-underlined">Connexion</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</head>