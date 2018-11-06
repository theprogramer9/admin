<?php 
include("conexion.php");
  if (isset($_POST["Email"]) and isset($_POST["Pass"]))
    {
       $consulta = "SELECT nombre, apellido, usuario, contra FROM user
        WHERE  usuario='".$_POST["Email"]."' AND contra='".$_POST["Pass"]."'";
         $resultbuscar= $db->query($consulta);
           if($resultbuscar)
              {

                 if (mysqli_num_rows($resultbuscar)>0) 
                   {
                    session_start();

                  $_SESSION["usuario"] = "gus"; //usuario
                    
                    
                  $objbuscar=mysqli_fetch_object($resultbuscar);
                  $_SESSION["autentificado"]="si";
                  $_SESSION["nombre"]=$objbuscar->nombre;
                  //asignando el resultado del query a una variable de _session
                  $_SESSION["apellido"]=$objbuscar->apellido;
                  //Aqui vas a hacer una consulta que seleccione Usuario where nombre = $objbuscar-nombre 
                  //if($resultbuscar1)
                  $sql = "SELECT usuario from user WHERE nombre = '.$objbuscar->nombre.'";
                  $resultbuscar1= $db->query($sql);

                     if($resultbuscar1)
                       {
                        if ($objbuscar->usuario=='admin') {
                          header ("Location:index.php");//administrador
                        }else{
                            header ("Location:indexu.php");//usuarios

                        }

                   
                        }
                  
                  
        //concatenar variables de post
                    }else
                    {
                     //para mandar parametros de una pagina
                  
                       header("Location:login.html?error=1");

                


                    }
                }
            }
        else
        {
      header("Location:404.html");

        }

     
?>