<?php 

    //Hurtig log ud fil som sletter dataen i sessionen og redirecter en til loginsiden
	session_destroy();
	header("location: index.php?side=forside");
?>