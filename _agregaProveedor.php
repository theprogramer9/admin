 <?php
include("conexion.php");

$add="INSERT INTO proveedor(contacto, correo, empresa) values
('".$_POST["contacto"]."',
'".$_POST["correo"]."',
'".$_POST["empresa"]."');";
$result=$db->query($add);
if ($result) {
 header("Location: proveedor.php?Agregado=1");
}
else{
  header("Location: proveedor.php?Error=1");
}


?>