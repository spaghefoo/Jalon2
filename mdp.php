<?php
$des="gal";


$mdp1= "toto";
echo "$mdp1 : ",  crypt($mdp1,$des), "<br>";
$mdp1= "titi";
echo "$mdp1 : ",  crypt($mdp1,$des), "<br>";

$mdp1= "zorg";
echo "$mdp1 : ",  crypt($mdp1,$des), "<br>";


?>