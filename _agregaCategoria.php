 <?php
include("conexion.php");
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);
header("Location: inic.php");
$add="INSERT INTO categorias(nom_categoria, foto) values
('".$_POST["nombre"]."',
'$destino');";
$result=$db->query($add);
if ($result) {
 header("Location: categorias.php?Agregado=1");
}
else{
  header("Location: FormCategoria.php?Error=1");
}


?>