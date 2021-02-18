<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$db = new database();
		$user_username = mysqli_real_escape_string($db->con, $_POST['konto_brugernavn']);
		$user_password = password_hash($_POST['konto_adgangskode'], PASSWORD_DEFAULT); 
		$user_realname = mysqli_real_escape_string($db->con, $_POST['konto_navn']); 
		$user_email = mysqli_real_escape_string($db->con, $_POST['konto_email']); 
		$user_tlf = mysqli_real_escape_string($db->con, $_POST['konto_telefonnummer']); 
		$user_exists = mysqli_num_rows($db->query("SELECT * FROM konto WHERE konto_brugernavn = '$user_username'"));

		if(!$user_exists) {
			$db->query("INSERT INTO konto (konto_navn, konto_brugernavn, konto_adgangskode, konto_email, konto_telefonnummer) VALUES ('$user_realname','$user_username','$user_password','$user_email','$user_tlf')");
			
			if(!$db->errorno()){
				$_POST = array();
				$message = "Din konto blev oprettet succesfuldt!";
			} else {
				$message = $db->errormsg();
			}
			
		} else {
			$message = "En bruger med dette brugernavn eksisterer allerede!";
		}
	}
?>

<div class="register">
	<h2>Register bruger</h2>
	<form action="index.php?side=register" method="post" autocomplete="off">
		<input type="text" name="konto_brugernavn" placeholder="Brugernavn" id="konto_brugernavn" <?php if(isset($_POST['konto_brugernavn'])){ echo 'value="' . $_POST["konto_brugernavn"] . '"'; } ?> required>
		<input type="password" name="konto_adgangskode" placeholder="Adgangskode" id="konto_adgangskode" <?php if(isset($_POST['konto_adgangskode'])){ echo 'value="' . $_POST["konto_adgangskode"] . '"'; } ?> required>
		<input type="text" name="konto_navn" placeholder="Fulde navn" id="konto_navn" <?php if(isset($_POST['konto_navn'])){ echo 'value="' . $_POST["konto_navn"] . '"'; } ?> required>
		<input type="text" name="konto_email" placeholder="Email" id="konto_email" <?php if(isset($_POST['konto_email'])){ echo 'value="' . $_POST["konto_email"] . '"'; } ?> required>
		<input type="text" name="konto_telefonnummer" placeholder="Telefonnummer" id="konto_telefonnummer" <?php if(isset($_POST['konto_telefonnummer'])){ echo 'value="' . $_POST["konto_telefonnummer"] . '"'; } ?> required>
		<input type="submit" value="Register">
	</form></br>
	<p id="login_error_message"><?php echo $message; ?></p></br>
	<a href="index.php?side=login">Log ind her!</a>
</div>