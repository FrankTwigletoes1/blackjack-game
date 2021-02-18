<?php
	session_start(); // Starter en session så vi kan logge personen ind/tjekke om personen er logget ind
	require_once('functions.php'); // Tilføjer functionsfilen til dokumentet, så alle sider kan bruge dens kode på siden
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> <!-- Sætter sidens charset til utf-8, frem for ascii, således at nordiske tegn kan bruges på siden (æøå) -->
		<title>Mr. Black</title>
	</head>
	<body>
		<?php
			// Hvis undersiden brugeren er inde på er valid, indsæt dens indhold her
			if(isset($_GET['side']) && in_array($_GET['side'], $pages)){
				require_once($_GET['side'] . ".php"); // Inkludere den valgte sides indhold

				// Hvis siden ikke er login eller register, smid et link ind på alle andre sider så brugeren kan logge ud igen
				// Alle sider der ikke er disse skal brugeren været logget ind for at se alligevel
				//if($_GET['side'] != "register" && $_GET['side'] != "login"){
				//	echo '<a href="index.php?side=logud">Log ud</a>'; // Printer linket til logud siden
				//}
			} else {
				require_once("forside.php"); // Siden eksistere ikke, inkludere i stedet så bare login siden
			}
		?>
	</body>
</html>