<section class="section">
    <div id="connexionTitre">
        <h1>Inscription</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="content">
                <form id="centre" action="?action=inscription" method="POST">
                    <input type="text" name="email" placeholder="Email de connexion" /> <br />
                    <input type="number" name="codePostal" placeholder="Code Postal" /><br />
                    <input type="text" name="nomVille" placeholder="Ville" /></br>
                    <input type="text" name="nom" placeholder="Votre nom" /><br />
                    <input type="password" name="password" placeholder="Mot de passe" /> <br />
                    <input type="submit" />

                </form>
                <p><?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?></p>
            </div>
        </div>
    </div>
    <br />
    <a href="?action=connexion">Déja un compte? Connexion.</a>
</section>