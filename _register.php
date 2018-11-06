<?php include("conexion.php");
session_start();
	if (isset($_POST["Username"]))
	 {
$add="insert into user (nombre, apellido, usuario, contra) values('".$_POST["Username"]."','".$_POST["Lastname"]."','".$_POST["Email"]."','".$_POST["Password"]."')";
		$result=$db->query($add);
		if (isset($result)) {
	 	    header("Location:inicio.php");
	      }


	 }
	 

?>