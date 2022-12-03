<?php
function saberPosicion($valor){
$numeros=array(5,9,6,7,5,2,4,9);
$total=count($numeros);
for ($i=0; $i < $total ; $i++) { 
   if($valor=$numeros[$i]){
    $posicion=$i;
   }
}
return $posicion;
}
echo saberPosicion(2);