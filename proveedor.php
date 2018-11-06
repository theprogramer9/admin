<!DOCTYPE html>
<?php   include("conexion.php");  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSS de Bootstrap -->
   

  <?php include('_metas.php'); ?>
  <!-- document ready es para indicar que la pagina este atenta -->
  <script>

       $(document).ready(function(){ 

          $('#proveedor').dataTable({
           "ajax":{
            "url":"_consultas.php?consulta=proveedor","dataSrc":""
           },
           "columns" : [
           {"data":"id"},
             {"data":"persona"},
             {"data":"correos"},
            {"data":"nombreEmpresa"},
            {"data":"acciones"},

           
           ]
          });



               $(document).on('click', '.glyphicon-plus', function(){

             // $("#agregar").modal('show');
             location.href="FormProveedor.php";      
                  });


         $(document).on('click', '.glyphicon-trash', function(){

              var dato = $(this).attr('id');

              if (confirm('Esta seguro de eliminar el arreglo')) {

                $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=borra_proveedor&id="+dato,
                  
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


  $(document).on('click', '.glyphicon-pencil', function(){



              var dato = $(this).attr('id');

                $.ajax({

                 
                  url:"_consultas.php?consulta=proveedor1&id="+dato,
                   type:"POST",
                  dataSrc:"",
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){

                     $("#id").val(dataJson[x].id);
                     $("#persona").val(dataJson[x].nombre);
                     $("#correos").val(dataJson[x].apellido);
                     $("#nombreEmpresa").val(dataJson[x].usuario);
                   
                    } 
                  }

                });
                
              $("#editar").modal('show');

            });
//----------------------------------------------------------------------------------------
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
    <title>Proveedor</title>
    
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
             <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                           Proveedor  
                                 <span class="glyphicon glyphicon-plus"></span>
                    </div>
                        <!-- /.panel-heading -->
                     <div class="panel-body">
                        <div class="table-responsive">
                          <!-- /.se adapta -->
                                <table class="table table-striped table-bordered table-hover" id="proveedor" >
                           
                             <!-- encabezados -->   
                              <thead>
                                    <th>Id</th>
                                <th>Proveedor</th>
                                <th>Correo</th>
                                <th>Empresa</th>
                                <th>Accion borrar</th>
                               
                           
                                
                              </thead>

                                </table>
                        	</div>
                        </div>
                     </div> 
                 </div>
               
               
         			</div>
         		</div>  
         	</div> 
        </div>   
	      		      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
   <?php include('_script.php'); ?>
  </body>

</html>
