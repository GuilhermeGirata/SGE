<?php
	setcookie("Cookie1", "Este é um cookie de teste", time()+3600);
	setcookie("Cookie2", "Esse é o cookie 2 do mesmo site", time()+1800);
	
	echo "Cookie inserido com sucesso"."<br>";
	echo "Esse cookie vai durar 3600 segundos (1 hora)";
?>