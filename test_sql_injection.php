<?php

//SQL Injection protection
$str_cerca = array(";", ";;", "'", "_", "(", ")", "()", "^");
$str_sostituisci = array("", "", "", "", "", "", "", "");

if(isset($_POST['submit'])){
	echo "Errore.";
}
else {

	//ucfirst funzione per mettere la prima lettera grande
	//trim funzione che sostituisce i caratteri per SQL Injection
	//str_replace funzione che sostituisce i caratteri elencati negli ARRAY definiti sopra.
	$nome = ucfirst(trim(str_replace($str_cerca, $str_sostituisci, $_POST['nome'])));
	$cognome = ucfirst(trim(str_replace($str_cerca, $str_sostituisci, $_POST['cognome'])));
	echo $nome. "\n";
	echo $cognome. "\n";
	}
?>
