<?php
function getRandID($x){
$charset="OV3e9amXGijkPnYzQZ-uv56s0xN7W_J8bdBhlCfgD1HIrtULSoMwEyA4K2RpTcFq";
$rand_id = $charset[rand(0,strlen($charset)-1)];
for($i=0;$i<($x-1);$i++){
$rand_id .= $charset[rand(0,strlen($charset)-1)];
}
return $rand_id; 
}
?>