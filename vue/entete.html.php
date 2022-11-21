<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
<!--Ici faire une navbar-->
<nav>

    <ul id="menuGeneral">
        <li><a href="./?action=accueil">Accueil</a></li>
        <li><a href="./?action=recherche"><img src="images/rechercher.png" alt="loupe" />Recherche</a></li>
        <li></li>
        <li id="logo"><a href="./?action=accueil"><img src="images/logoBarre.png" alt="logo" /></a></li>
        <li></li>
        <li><a href="./?action=cgu">CGU</a></li>
        <?php if (isLoggedOn()) {?>
            <li><a href="./?action=monprofil"><img src="images/profil.png" alt="loupe" />MonProfil</a></li>
        <?php }
        else{?>
            <li><a href="./?action=connexion"><img src="images/profil.png" alt="loupe" />Connexion</a></li>
        <?php }?>

    </ul>
</nav>
<!--Ne pas fermer l'html et le body (il est fermer dans la page pied.php)-->