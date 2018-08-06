<?php
	//$connection=new mysqli("localhost", "p-142_root", "87758169736Yerbolat!", "p-14287_booking");
	$connection=new mysqli("localhost", "root", "", "hotspot");
	if($connection->connect_error){
		echo "Error with db connection.";
	}
?>
