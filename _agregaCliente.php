 <?php
include("conexion.php");

$add="INSERT INTO clientes(nombre, apellido,usuario,contra) values
('".$_POST["nombre"]."',
'".$_POST["apellido"]."',
'".$_POST["usuario"]."',
'".$_POST["contraseña"]."');";
$result=$db->query($add);
if ($result) {
 header("Location: clientes.php?Agregado=1");
}
else{
  header("Location: clientes.php?Error=1");
}


?>