<?php
    /*-------------------------
    Autor: Amner Saucedo Sosa
    Web: www.abisoftgt.net
    E-Mail: waptoing7@gmail.com
    ---------------------------*/
	session_start();

	if (isset($_SESSION['user_id'])) {
		//session_destroy();
		unset($_SESSION['user_id']);
		header("location: ../index.php"); //estemos donde estemos nos redirije al index
	}

?>