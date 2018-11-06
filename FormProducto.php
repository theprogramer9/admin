<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>CARNES FRIAS</title>
</head>
<body>
    <div class="container" id="advanced-search-form">
        <h2>Registro Productos</h2>
        <form action="_agregaArreglo.php" method="POST" id="Registro" enctype="multipart/form-data" >
            <div class="form-group" enctype="multipart/form-data"  >
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre Producto" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" placeholder="Precio" id="precio" name="precio">
            </div>
            <div class="form-group">
                <label for="kilogramos">Kilogramnos</label>
                <input type="text" class="form-control" placeholder="Kilogramos" id="kilogramos" name="kilogramos">
            </div>
            <div class="form-group">
                <label for="foto">Imagen</label>
                <input type="file"  placeholder="Phone number" id="foto" name="foto">
            </div>
            <div class="form-group">
               
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id ="combo" name="combo">
                 <option selected="selected">Selecciona..</option>   
            <?php 


        include("conexion.php");
        

          $con="SELECT id_categoria, nom_categoria FROM categorias;";
          $result=$db->query($con);
          if ($result) {
            while($obj=mysqli_fetch_object($result))
            {

              echo '<option value="'.$obj->id_categoria.'">'.$obj->nom_categoria.'</option>';
            }
          }
          echo '</select>';

        ?>
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search"> <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
        </form>
    </div>
</body>

</html>
