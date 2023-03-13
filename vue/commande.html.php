<section class='section'>
<div class='container'>
    <h1>Commande destination n°: <?php echo $commande['numeroTraversee'];?></h1>
<form action='?action=commander&numeroTraversee=<?php echo $commande['numeroTraversee']; ?>' method='POST'>  
    <label>Nombre de passagers:</label>
    <input type='number' name='a1'/><label>Enfants</label>
    <input type='number' name='a2'/><label>Adolescents</label>
    <input type='number' name='a3'/><label>Adultes</label>
<br />
    <label>Nombres de véhicules > 2m:</label>
    <input type='number' name='b1'/>
<br />
    <label>Nombre de vehicules < 2m</label>
    <input type='number' name='b2'/>
    <input type="date" name='date' />
    <input type='submit' />
</form>
<div id="red">

</div>
</div>



</section>