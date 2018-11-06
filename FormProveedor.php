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
        <h2>Registro proveedor</h2>
        <form action="_agregaProveedor.php" method="POST" id="Registro" enctype="multipart/form-data" >
            <div class="form-group" enctype="multipart/form-data"  >
                <label for="nombre">Proveedor</label>
                <input type="text" class="form-control" placeholder="Nombre Contacto" id="nombre" name="contacto">
            </div>
            <div class="form-group">
                <label for="precio">Correo</label>
                <input type="text" class="form-control" placeholder="Correo" id="precio" name="correo">
            </div>
            <div class="form-group">
                <label for="Empresa">Nombre empresa</label>
                <input type="text" class="form-control" placeholder="Empresa" id="Empresa" name="empresa">
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search"> <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
        </form>
    </div>
</body>

</html>
