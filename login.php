<?php

	/* Kort script til at log ind med

	Scriptet starter med at tjekke om vi har noget data vi kan hente fra POST, og 
	så hvis der er starter en et instance af classen fra functions.php. Derfra tager den fat i dataen fra 
	POST og finder brugeren som den skal lede efter i databasen via en query. Så til sidst starter den
	en session hvis brugeren med det indtastet brugernavn og password er der. 
	*/

	if($_SERVER["REQUEST_METHOD"] == "POST") { 
		$db = new database(); 
		$user_username = mysqli_real_escape_string($db->con, $_POST['username']);
		$user_password = $_POST['password'];
		$db_query = $db->query("SELECT konto_id, konto_adgangskode FROM konto WHERE konto_brugernavn = '$user_username'");
		$db_array = mysqli_fetch_array($db_query);
		$user_exists = mysqli_num_rows($db_query);
		$user_password_verify = password_verify($user_password, $db_array["konto_adgangskode"]);

		if($user_exists && $user_password_verify) {
			session_regenerate_id();
			$_SESSION['loggedin'] = true;
			$_SESSION['konto_id'] = $db_array['konto_id'];
			header("location: index.php?side=forside");
		} else {
			$message = "Din adgangskode eller dit brugernavn er forkert!";
		}
	}
?>

<!-- Login boks og form hvor brugeren kan indtaste sin login-informationer og logge ind -->
<div class="login">
	<h2>Login</h2>

	<form action="" method="post">
		<label for="username"></label>
		<input type="text" name="username" placeholder="Username" id="username" <?php if(isset($_POST['username'])){ echo 'value="' . $_POST["username"] . '"'; } ?> required>

		<label for="password"></label>
		<input type="password" name="password" placeholder="Password" id="password" <?php if(isset($_POST['password'])){ echo 'value="' . $_POST["password"] . '"'; } ?> required>

		<input type="submit" value="Login">
	</form>
	<p id="login_error_message"><?php echo $message; ?></p>
	<a href="index.php?side=register">Du kan Registrere her!</a>
</div>