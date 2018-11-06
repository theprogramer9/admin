<!DOCTYPE html>
<html lang="en">

<?php   include("conexion.php");  ?>

<head>

    <meta charset="utf-8">
    <title>Carnes Frias</title>
     <?php include('_metas.php'); ?>


       <script>

       $(document).ready(function(){ 

          $('#arreglos').dataTable({

           "ajax":{

            "url":"_consultas.php?consulta=productos","dataSrc":""

           },
           "columns" : [
             {"data":"id"},
             {"data":"nombre"},
             {"data":"categoria"},
             {"data":"precio"},
             {"data":"kilo"},
             
           ]
          });

         

               $(document).on('click', '.glyphicon-plus', function(){

              // $("#agregar").modal('show');
             location.href="FormProducto.php";      
                  });



            $(document).on('click', '.glyphicon-trash', function(){

              var dato = $(this).attr('id');
              if (confirm('Esta seguro de eliminar el arreglo')) {

                $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=borra_arreglo&id="+dato,
                  
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

                 
                  url:"_consultas.php?consulta=productos1&clave="+dato,
                   type:"POST",
                  dataSrc:"",
                  
                  success: function(datos){

                    var dataJson = eval(datos);
                    for(var x in dataJson){

                     $("#clave").val(dataJson[x].clave);
                     $("#nombre1").val(dataJson[x].nombre);
                     $("#categoria1").text(dataJson[x].nom_categoria);
                     $("#precio1").val(dataJson[x].precio);
                     $("#kilo1").val(dataJson[x].kilo);
                    } 
                  }

                });
              $("#editar").modal('show');

            });

       

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

            alert("accion=editar_arreglo&clave="+$("#clave").val()+"&nombre="+$("#nombre1").val()+"&precio="+$("#precio1").val() +"&kilo="+$("#kilo1").val()+"&categoria="+$("#id_categoria").val());

            $.ajax({

                  type:"GET",
                  url:"_consultas.php",
                  data:"accion=editar_arreglo&clave="+$("#clave").val()+"&nombre="+$("#nombre1").val()+"&precio="+$("#precio1").val() +"&kilo="+$("#kilo1").val()+"&categoria="+$("#id_categoria").val(),
                  
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
    <title>productos</title>
    
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
                  <div class="panel panel-default">
                   <div class="panel-heading">
                          PRODUCTOS  
                        <span class="glyphicon glyphicon-plus"></span>
                    </div>

                        <div class="panel-body">
                        <div class="table-responsive">
                          <!-- /.se adapta -->
                                <table class="table table-striped table-bordered table-hover" id="arreglos" >
                           
                             <!-- encabezados -->   
                              <thead>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                                <th>PRECIO</th>
                                <th>KILOGRAMOS</th>
                                
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
	      	
	  	  <!-- /row -->   
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->    
<?php include('_script.php'); ?>
  </body>

</html>
