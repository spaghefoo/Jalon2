<h1>Inscription</h1>

<form action="?action=inscription" method="POST">
<!-- sofiane - j'ai fait le formulaire d'inscription avec les valeurs qui correspondent.-->
<input type="text" name="email" placeholder="Email de connexion" /> <br />
<input type="number" name="codePostal" placeholder="Code Postal" /><br />
<input type="text" name="nomVille" placeholder="Ville" /></br>
<input type="text" name="nom" placeholder="Votre nom" /><br />
<input type="password" name="password" placeholder="Mot de passe" /> <br />
<input type="submit" />

</form>
<p><?php 
if(isset($message))
{
// s - on affiche le message renovyé par createUser(j'aurai pu faire une gestion d'erreurs propre ceci-dit...)
echo $message; 
}
?></p>
<br />
<a href="?action=connexion">Déja un compte? Connexion.</a>