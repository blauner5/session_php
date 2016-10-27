<?php
session_start();
?>
<html>
	<body>
		<form action="session_test.php" method="post">
			<p>Username:</p>
			<input type="text" name="username" required/>
			<p>Email:</p>
			<input type="email" name="email" required/>
			<br/>
			<br/>
			<input type="submit" value="Invia" name="invia"/>
		</form>
	</body>
</html>
<?php

//multiple database connection
$con = mysqli_connect("Host", "User_DB", "Pass_DB", "Your_DB");
$con2 = mysqli_connect("Host_2", "User_DB_2", "Pass_DB_2", "Your_DB2");

//array for SQL Injection protection
$str_cerca = array(";", ";;", "'", "_", "(", ")", "()", "^", '"', '""', " or", "or ");
$str_sostituisci = array("", "", "", "", "", "", "", "", "", "", "", "");

if(isset($_POST['invia'])){
	$_SESSION['username'] = "";
	$_SESSION['email'] = "";
	$username = trim(str_replace($str_cerca, $str_sostituisci, $_POST['username']));
	$email = trim(str_replace($str_cerca, $str_sostituisci, $_POST['email']));
	$_SESSION['username'] = $username;
	$_SESSION['email'] = $email;

	//check the connection to the second database
	if(!$con2){
		echo "<font style='color:red;'>Connessione al secondo database rifiutata</font>.<br/>";
		mysqli_close($con2);
	}
	else{
		echo "<font style='color:red;'>Connessione al secondo database riuscita</font>.<br/>";
	}
	//end check the connection to the second database

	//check the connection to the first database
	if(!$con){
		echo "<font style='color:red;'>Connessione al primo database rifiutata</font>.<br/>";
		mysqli_close($con);
	}
	else {
		$query = "SELECT name FROM user WHERE name ='".$_SESSION['username']."'";
		$risultato = mysqli_query($con, $query);
		$num_righe = mysqli_num_rows($risultato);

		if($num_righe == 0){
			echo "Database vuoto, nessun risultato trovato con nome: ".$_SESSION['username']."<br/><br/>";
			echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
			echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
		}
		else if($num_righe == 1){
			echo "C'è ". $num_righe ." riga presente nel database con nome: ".$_SESSION['username']."<br/><br/>";
			echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
			echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
		}
		else {
			echo "Ci sono ". $num_righe ." righe presenti nel database con nome: ".$_SESSION['username']."<br/><br/>";
			echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
			echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
		}
	}
	//end check the connection to the first database
}
?>
