<!DOCTYPE html>
<html lang="en">
<?php   include("conexion.php");  ?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
 
    <!-- CSS de Bootstrap -->
   

  <?php include('_metas.php'); ?>
  <!-- document ready es para indicar que la pagina este atenta -->
  <script>

       $(document).ready(function(){ 

          $('#clientes').dataTable({
           "ajax":{
            "url":"_consultas.php?consulta=clientes",
            "type":"POST",
            "dataSrc":""
           },
           "columns" : [
             {"data":"id"},
             {"data":"nombre"},
             {"data":"apellido"},
             {"data":"usuario"},
             {"data":"contraseña"},
            {"data":"acciones"},
            {"data":"acciones2"}
             
           ]
          });
    $(document).on('click', '.glyphicon-plus', function(){

              //$("#agregar").modal('show');
             location.href="FormCliente.php";      
                  });

         $(document).on('click', '.glyphicon-trash', function(){

              var dato = $(this).attr('id');

              if (confirm('Esta seguro de eliminar el arreglo')) {

                $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=borra_cliente&id="+dato,
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){
                      if (dataJson[x].bn==1) {
                        alert('Elemento eliminado');
                      }else{
                        alert('No fue posible eliminar');
                      }
                    } 
                  }

                });
              }
            });

//-----------------------editar clientes--------------------------------

       $(document).on('click', '.glyphicon-pencil', function(){



              var dato = $(this).attr('id');

                $.ajax({

                 
                  url:"_consultas.php?consulta=clientes1&id_cliente="+dato,
                   type:"POST",
                  dataSrc:"",
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){

                     $("#id").val(dataJson[x].id);
                     $("#nombre").val(dataJson[x].nombre);
                     $("#apellido").val(dataJson[x].apellido);
                     $("#usuario").val(dataJson[x].usuario);
                     $("#contra").val(dataJson[x].contra);
                    } 
                  }

                });
                
              $("#editar").modal('show');

            });
//




//_________________________________
 $("#btn_agregar").click(function(){

            alert("accion=agrega_arreglo&nombre="+$("#nombre").val()+"&precio="+$("#precio").val() +"&kilo="+$("#kilo").val()+"&categoria="+$("#id_categoria").val());

            $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=agrega_arreglo&nombre="+$("#nombre").val()+"&precio="+$("#precio").val()+"&kilo="+$("#kilo").val()+"&categoria="+$("#id_categoria").val(),
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){
                      if (dataJson[x].bn==1) {
                        alert('Arreglo Agregado');
                      }else{
                        alert('No fue posible agregar el arreglo');
                      }
                    }
                  }

                });
          });


            $("#btn_editar").click(function(){

            alert("accion=editar_cliente&id_cliente="+$("#id").val()+"&nombre="+$("#nombre").val()+"&apellido="+$("#apellido").val() +"&usuario="+$("#usuario").val()+"&contra="+$("#contra").val());

            $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=editar_cliente&id_cliente="+$("#id_cliente").val()+"&nombre="+$("#nombre").val()+"&apellido="+$("#apellido").val() +"&usuario="+$("#usuario").val()+"&contra="+$("#contra").val(),
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){
                      if (dataJson[x].bn==1) {
                        alert('Arreglo editado');
                      }else{
                        alert('No fue posible editar el arreglo');
                      }
                    }
                  }

                });
          });
       });
    </script>
  </head>


 <head>
    <meta charset="utf-8">
    <title>Reports - Bootstrap Admin Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/pages/reports.css" rel="stylesheet">

   

  </head>

<body>

<?php   include("menu.php");  ?>

    
	
	<div class="main-inner">

	    <div class="container">
	    	
	     <div class="row">
	      	
	      	<div class="span12">
	      
	      	<div class="info-box">
	      		<div class="panel panel-default">
                    <div class="panel-heading">
                           CLIENTES   
                           <span class="glyphicon glyphicon-plus"></span> 
                    </div>
                        <!-- /.panel-heading -->
                     <div class="panel-body">
                        <div class="table-responsive">
                          <!-- /.se adapta -->
                                <table class="table table-striped table-bordered table-hover" id="clientes" >
                           
                             <!-- encabezados -->   
                              <thead>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>USUARIO</th>
                                <th>CONTRASEÑA</th>
                                <th>Acciones Borrar</th>
                                <th>Acciones Editar</th>
                                
                              </thead>

                                </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                  </div>
               </div>
               
               
             </div>
               
               
         </div>
         </div>      
	    </div> <!-- /container -->   
    
</div> <!-- /main -->   
<div id="editar" class="modal fade" role="dialog" method="POST" autocomplete="off">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <label>id</label>
        <input type="text" id="id">
        <label>Nombre</label>
        <input type="text" id="nombre">
        <label>Apellido</label>
        <input type="text" id="apellido">
        <label>Usuario</label>
        <input type="text" id="usuario">
        <label>Contraseña</label>
        <input type="text" id="contra">
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btn_editar" type="button" class="btn btn-success" data-dismiss="modal">Editar</button>
      </div>
      </div>
<?php include('_script.php'); ?>
  </body>

</html>
