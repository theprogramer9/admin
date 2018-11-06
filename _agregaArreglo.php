 <?php
include("conexion.php");
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);
header("Location: inic.php");
$add="INSERT INTO producto(nombre_producto, precio,kilogramos,foto, id_categoria) values
('".$_POST["nombre"]."',
'".$_POST["precio"]."',
'".$_POST["kilogramos"]."',
'$destino',
'2');";
$result=$db->query($add);
if ($result) {
 header("Location: productos2.php?Agregado=1");
}
else{
  header("Location: FormProducto.php?Error=1");
}


?>