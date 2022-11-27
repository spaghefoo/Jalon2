<!-- Galdric en commentaire car j'arrive pas à regler le probleme css (desole Theophane) <link rel="stylesheet" href="../CSS/connexion.css"> -->
<!--<meta http-equiv="refresh" content="3">-->

<section class="section">
<div id="connexionTitre">
    <h1>Connexion</h1>
</div>
<div class="container">
    <div class="card">
        <div class="content">
            <form id="centre" action="./?action=connexion" method="POST">
                <p>Email</p>
                <input type="text" name="mailU" placeholder="" /> <br /><br />

                <p>Password</p>
                <input type="password" name="mdpU" placeholder="" /> <br /><br />
                <input type="submit" />
            </form>
            <br><br><p>Pas de compte ? <a href="?action=inscription"><b>Inscription</b></a></p>
            <br />
        </div>
    </div>
</div>

</section>