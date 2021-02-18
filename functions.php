<?php
/*
----------------------------------------------------------------------------------------------------------------------------------
funktions fil:
Funktioner som bliver brugt ofte i programmet

Class database:
Klassen database indeholder funktionerne som bruges til at have med databasen at gøre, dvs.
håndtering af queries, fejl osv.

__construct:					     __construct funktionen køre i starten af php scriptet og bruges 
									 til at forbinde til databasen.
__destruct:							 __destruct bliver brugt når php scriptet holder op med at køre og 
									 disconnecter fra databasen af sikkerhedsåsager.
query:								 query er en simplifisering/forkortelse af at sende en querry.
inserted_id:						 Tager et ID, for at kunne overfører ID'et fra en række til en anden igennem deres relation.
errorno:							 returnere en fejlkode.
errormsg:							 returnere en fejlbesked.
is_user_logged_in:					 returnere en true eller false om det var den rigtige adgangskode
is_user_not_logged_in_then_redirect: Sender brugeren tilbage til login siden, hvis personen ikke er logget ind
-----------------------------------------------------------------------------------------------------------------------------------
*/
	$pages = array("login", "register", "logout", "blackjack", "forside", "testy");
	$message = "";

	class database {
		//Private og offentlige variabler til brug af forbindelse til databasen
		private $DATABASE_HOST = 'localhost';
		private $DATABASE_USER = 'root';
		private $DATABASE_PASS = '';
		private $DATABASE_NAME = 'blackjack';
		public $con;

		function __construct(){
			$this->con = mysqli_connect($this->DATABASE_HOST, $this->DATABASE_USER, $this->DATABASE_PASS, $this->DATABASE_NAME);
			
			if (mysqli_connect_errno()) {
				die ('Kunne ikke connect til serveren: ' . mysqli_connect_error());
			}
		}
		
		function __destruct(){
			$this->con->close();
		}

		public function query($sql_string){
			return mysqli_query($this->con, $sql_string);
		}

		public function inserted_id(){
			return mysqli_insert_id($this->con);
		}

		public function errorno(){
			return mysqli_errno($this->con);
		}

		public function errormsg(){
			return mysqli_error($this->con);
		}
	}

	function is_user_logged_in(){
		if(isset($_SESSION['loggedin']) && isset($_SESSION['konto_id'])){
			$db = new database();
			$myuserid = mysqli_real_escape_string($db->con, $_SESSION['konto_id']);
			$count = mysqli_num_rows($db->query("SELECT * FROM konto WHERE konto_id = '$myuserid'"));

			if($count == 1) {
				return true;
			}
		}

		return false;
	}

	function is_user_not_logged_in_then_redirect(){
		if(!is_user_logged_in()){
			header("location: index.php");
		}
	}
?>