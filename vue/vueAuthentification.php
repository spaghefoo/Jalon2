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
                    <input type="text" id="connexion_text" name="mailU" placeholder="" /> <br /><br />

                    <p>Password</p>
                    <input type="password" id="connexion_password" name="mdpU" placeholder="" /> <br /><br />
                    <input type="submit" id="connexion_submit" />
                </form>
                <br><br>
                <p>Pas de compte ? <a href="?action=inscription"><b>Inscription</b></a></p>
                <br />
            </div>
        </div>
    </div>

</section>