<section class='section'>
<div class='container'>
    <h1>Commande destination n°: <?php echo $commande['numeroTraversee'];?></h1>
<form action='?action=commander&numeroTraversee=<?php echo $commande['numeroTraversee']; ?>' method='POST'>  
<br>
    <label>Nombre de passagers:</label>
    <br><br>
    <label>Enfants : </label><input type='number' name='a1'/>
    <br><br>
    <label>Adolescents : </label><input type='number' name='a2'/>
    <br><br>
    <label>Adultes : </label><input type='number' name='a3'/>
<br /><br>
    <label>Nombres de véhicules > 2m : </label>
    <input type='number' name='b1'/>
<br />
<br>
    <label>Nombre de vehicules < 2m : </label>
    <input type='number' name='b2'/>
    <br>
    <br>
    <input type="date" name='date' />
    <br><br>
    <input type='submit' />
</form>
<div id="red">

</div>
</div>



</section>