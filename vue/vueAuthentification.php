<link rel="stylesheet" href="../CSS/connexion.css">
<!--<meta http-equiv="refresh" content="3">-->
<div id="connexionTitre">
    <h1>Connexion</h1>
</div>
<div class="container">
    <div class="card">
        <div class="content">
            <form id="centre" action="./?action/controleur/connexion.php" method="POST">
                <p>Email</p>
                <input type="text" name="mailU" placeholder="" /> <br /><br />

                <p>Password</p>
                <input type="password" name="mdpU" placeholder="" /> <br /><br />
                <input type="submit" />
            </form>
            <br><br><p>Pas de compte ? <a href="#"><b>Inscription</b></a></p>
            <br />
        </div>
    </div>
</div>