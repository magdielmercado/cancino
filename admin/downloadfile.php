<?php

if(isset($_GET["id"])){
	include "config/config.php";
	$id = intval($_GET["id"]);
	$file=mysqli_query($con, "select * from tickets where id=$id");
	$row=mysqli_fetch_array($file);
		$image=$row['image'];
	

	if($image!=null){
		$fullpath = "../images/ticket/".$image;
		header("Content-Disposition: attachment; filename=$image");
		readfile($fullpath);
	}
}



?>