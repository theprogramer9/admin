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

          $('#ventas1').dataTable({
           "ajax":{
            "url":"_consultas.php?consulta=ventas1","dataSrc":""
           },
           "columns" : [
             {"data":"id"},
             {"data":"fechas"},
            {"data":"horas"},
            {"data":"nombre"},
            {"data":"kilo"},
            {"data":"total"}


             
           ]
          });

               $(document).on('click', '.glyphicon-plus', function(){

             // $("#agregar").modal('show');
             //location.href="FormProveedor.php";      
                  });
       });

    </script>
  </head>
  
 <head>
    <meta charset="utf-8">
    
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
<?php   include("menus.php");  ?>

	<div class="main-inner">

	    <div class="container">
	    	
	     <div class="row">
	      	
	      	<div class="span12">
	      
	      	<div class="info-box">
               <div class="row-fluid stats-box">
                    <div class="panel-heading">
                          
                    </div>

                        <div class="panel-body">
                        <div class="table-responsive">
                          <!-- /.se adapta -->
                                <table class="table table-striped table-bordered table-hover" id="ventas1" >
                           
                             <!-- encabezados -->   
                              <thead>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>NOMBRE DEL PRODUCTO</th>
                                <th>KILOGRAMOS</th>
                                <th>TOTAL VENTA</th>
                                
                              </thead>

                                </table>
                        </div>
                        <!-- /.table-responsive -->
                        </div>
                </div>
                    
              </div>
            </div>
                   
               
        </div>
               
               
    </div>     
	      	
<?php include('_script.php'); ?>
  </body>

</html>
