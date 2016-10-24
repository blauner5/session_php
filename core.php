<?php
//Configurazione per connettersi al database MySQL
include 'config.php';

//SQL Injection protection
$str_cerca = array(";", ";;", "'", "_", "(", ")", "()", "^");
$str_sostituisci = array("", "", "", "", "", "", "", "");
if(isset($_POST['submit'])){
	echo "Problema registrazione";
}
else {
	$nome = ucfirst(trim(str_replace($str_cerca, $str_sostituisci, $_POST['nome'])));
	$cognome = ucfirst(trim(str_replace($str_cerca, $str_sostituisci, $_POST['cognome'])));
	$gamertag = trim(str_replace($str_cerca, $str_sostituisci, $_POST['gamertag']));
	$email = trim(str_replace($str_cerca, $str_sostituisci, $_POST['email']));
	$ip = $_SERVER['REMOTE_ADDR'];
	$data = date("H:i:s d/m/Y");
	if(!$connessione) {
		echo "Connessione al database fallita.";
		mysql_close();
	}
	else {
		$controllo_gamertag = "SELECT gamertag FROM user WHERE gamertag = '$gamertag'";
		$risultato_gamertag = mysql_query($controllo_gamertag);
		$risultato_gamertag_numero = mysql_num_rows($risultato_gamertag);
		if($risultato_gamertag_numero == '0') {
			$query = "INSERT INTO user (nome, cognome, gamertag, email, ip, data) VALUES ('$nome', '$cognome', '$gamertag', '$email', '$ip', '$data')";
			$insert_query = mysql_query($query);
			echo "Registrazione avvenuta!";
			mysql_close();
		}
		else {
			echo "Gamertag già esistente, registrazione rifiutata!";
			mysql_close();
		}
	}
}

?>
