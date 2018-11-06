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
        <h2>Registro Clientes</h2>
        <form action="_agregaCliente.php" method="POST" id="Registro" enctype="multipart/form-data" >
            <div class="form-group" enctype="multipart/form-data"  >
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre Cliente" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="precio">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
            </div>
            <div class="form-group">
                <label for="kilogramos">Usuario</label>
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
            </div>
            <div class="form-group">
                <label for="kilogramos">Contraseña</label>
                <input type="text" class="form-control" placeholder="Contraseña" id="contraseña" name="contraseña">
            </div>
            <div class="form-group">
               
            </div>
            
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search"> <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
        </form>
    </div>
</body>

</html>
