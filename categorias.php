<!DOCTYPE html>
<?php   include("conexion.php");  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boostrap y Eventos</title>
 
    <!-- CSS de Bootstrap -->
   

  <?php include('_metas.php'); ?>
  <!-- document ready es para indicar que la pagina este atenta -->
  <script>

       $(document).ready(function(){ 

          $('#categorias').dataTable({
           "ajax":{
            "url":"_consultas.php?consulta=categorias","dataSrc":""
           },
           "columns" : [
             {"data":"id"},
             {"data":"nombre"},
            {"data":"acciones"},
           
             
           ]
          });

            $(document).on('click', '.glyphicon-plus', function(){

             // $("#agregar").modal('show');
             location.href="FormCategoria.php";      
                  });
       });
    </script>
  </head>




  
 <head>
    <meta charset="utf-8">
    <title>Categorias</title>
    
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
                           CATEGORIAS   
                             	<span class="glyphicon glyphicon-plus"></span> 
                    </div>
                        <!-- /.panel-heading -->
                     <div class="panel-body">
                        <div class="table-responsive">
                          <!-- /.se adapta -->
                                <table class="table table-striped table-bordered table-hover" id="categorias" >
                           
                             <!-- encabezados -->   
                              <thead>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>ACCION BORRAR</th>
                               
                                
                              </thead>

                                </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
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
