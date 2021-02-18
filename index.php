<?php
	session_start(); // Starter en session s� vi kan logge personen ind/tjekke om personen er logget ind
	require_once('functions.php'); // Tilf�jer functionsfilen til dokumentet, s� alle sider kan bruge dens kode p� siden
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> <!-- S�tter sidens charset til utf-8, frem for ascii, s�ledes at nordiske tegn kan bruges p� siden (���) -->
		<title>Mr. Black</title>
	</head>
	<body>
		<?php
			// Hvis undersiden brugeren er inde p� er valid, inds�t dens indhold her
			if(isset($_GET['side']) && in_array($_GET['side'], $pages)){
				require_once($_GET['side'] . ".php"); // Inkludere den valgte sides indhold

				// Hvis siden ikke er login eller register, smid et link ind p� alle andre sider s� brugeren kan logge ud igen
				// Alle sider der ikke er disse skal brugeren v�ret logget ind for at se alligevel
				//if($_GET['side'] != "register" && $_GET['side'] != "login"){
				//	echo '<a href="index.php?side=logud">Log ud</a>'; // Printer linket til logud siden
				//}
			} else {
				require_once("forside.php"); // Siden eksistere ikke, inkludere i stedet s� bare login siden
			}
		?>
	</body>
</html>