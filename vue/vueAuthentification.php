<section class="sectionConnexion" style="height : 410px">
    <div id="connexionTitre">
        <br><h1>Connexion</h1> 
    </div>
    <div class="container">
        <div class="content">
            <form id="centre" action="./?action=connexion" method="POST">
                <br><br>Email<br>
                <input type="text" id="connexion_text" name="mailU" placeholder="" /> <br /><br />

                Password<br>
                <input type="password" id="connexion_password" name="mdpU" placeholder="" /> <br /><br />
                <input type="submit" id="connexion_submit" />
            </form>
            
            <p>Pas de compte ? <a href="?action=inscription"><b>Inscription</b></a></p>
            <?php
                if(isset($erreur))
                {
                    echo "<p style='color:red'>".$erreur."</p>";
                }
            ?>

            <br />
            
        </div>
    </div>
</section>