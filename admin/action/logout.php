<?php
session_start();
if (isset($_SESSION['admin_id'])) {
		//session_destroy();
		unset($_SESSION['admin_id']);
		header('Location: ../index.php?alert=2'); //estemos donde estemos nos redirije al index
	}

?>