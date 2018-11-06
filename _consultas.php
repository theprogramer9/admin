<?php   include("conexion.php");  

function array_utf8_encode_recursive($dat){
  if (is_string($dat)) {
      return utf8_encode($dat);
  }
  if (is_object($dat)) {
      $ovs=get_object_vars($dat);
      $new=$dat;
      foreach ($ovs as $k => $v) {
        $new->$k=array_utf8_encode_recursive($new->$k);
      }
      return $new;
  }
  if (!is_array($dat)) return $dat; 
  $ret = array();
  foreach ($dat as $i => $d) $ret[i]=array_utf8_encode_recursive($d);
  return $ret;
}
//----------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="clientes1")
{
    $con="SELECT id_cliente,nombre,apellido,usuario,contra
          from clientes
          where id_cliente = ".$_GET["id_cliente"]."; ";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class= "glyphicon glyphicon-trash" id="'.$obj->id_cliente.'">'; 

$acciones2='<span class= "glyphicon glyphicon-pencil" id="'.$obj->id_cliente.'">';

           $arr[]=array('id'=> array_utf8_encode_recursive($obj->id_cliente),
                        'nombre'=> array_utf8_encode_recursive($obj->nombre),
                        'apellido'=> array_utf8_encode_recursive($obj->apellido),
                        'usuario'=> array_utf8_encode_recursive($obj->usuario),
                        'contra'=> array_utf8_encode_recursive($obj->contra),
                        'acciones'=>array_utf8_encode_recursive($acciones),
                        'acciones2'=>array_utf8_encode_recursive($acciones2)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('id'=>'',
                        'nombre'=>'',
                        'apellido'=> '',
                        'usuario'=> '',
                        'contra'=> '',
                        'acciones'=>'',
                        'acciones2'=>''
                      );

        }
     echo json_encode($arr);
}










//----------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="clientes")
{
    $con="SELECT id_cliente,nombre,apellido,usuario,contra
          from clientes
          
          ";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class="glyphicon glyphicon-trash" id="'.$obj->id_cliente.'">';

$acciones2='<span class="glyphicon glyphicon-pencil" id="'.$obj->id_cliente.'">';

           $arr[]=array('id'=>array_utf8_encode_recursive($obj->id_cliente),
                        'nombre'=> array_utf8_encode_recursive($obj->nombre),
                        'apellido'=> array_utf8_encode_recursive($obj->apellido),
                        'usuario'=> array_utf8_encode_recursive($obj->usuario),
                        'contraseña'=> array_utf8_encode_recursive($obj->contra),
                        'acciones'=>array_utf8_encode_recursive($acciones),
                        'acciones2'=>array_utf8_encode_recursive($acciones2)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('id'=>'',
                        'nombre'=>'',
                        'apellido'=> '',
                        'usuario'=> '',
                        'contraseña'=> '',
                        'acciones'=>'',
                        'acciones2'=>''
                      );

        }
     echo json_encode($arr);
}
//----------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="categorias")
{
    $con="SELECT id_categoria,nom_categoria
          from categorias
          
          ";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class="glyphicon glyphicon-trash" id="'.$obj->id_categoria.'">';
           $arr[]=array('id'=>$obj->id_categoria,
                        'nombre'=> array_utf8_encode_recursive($obj->nom_categoria),
                        'acciones'=>array_utf8_encode_recursive($acciones)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('id'=>'',
                        'nombre'=>'',
                        'acciones'=>''
                      );

        }
     echo json_encode($arr);
}
//----------------------------------Proveedor---------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="proveedor1")
{
    $con="SELECT id,contacto,correo,empresa
          from proveedor
          
          ";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class="glyphicon glyphicon-trash" id="'.$obj->id.'">';

$acciones2='<span class="glyphicon glyphicon-pencil" id="'.$obj->id.'">';
           $arr[]=array(   'id'=>$obj->id,
            'persona'=> array_utf8_encode_recursive($obj->contacto),
            'correos'=> array_utf8_encode_recursive($obj->correo),
                     
                        'nombreEmpresa'=> array_utf8_encode_recursive($obj->empresa),
                        'acciones'=>array_utf8_encode_recursive($acciones)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('persona'=>'',
                        'correos'=>'',
                        'id'=>'',
                        'nombreEmpresa'=>'',
                        'acciones'=>'',
                        'acciones2'=>''
                      );

        }
     echo json_encode($arr);
}





//-----------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="proveedor")
{
    $con="SELECT id,contacto,correo,empresa
          from proveedor
          
          ";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class="glyphicon glyphicon-trash" id="'.$obj->id.'">';

$acciones2='<span class="glyphicon glyphicon-pencil" id="'.$obj->id.'">';
           $arr[]=array('id'=>$obj->id,
            'persona'=> array_utf8_encode_recursive($obj->contacto),
            'correos'=> array_utf8_encode_recursive($obj->correo),
                        
                        'nombreEmpresa'=> array_utf8_encode_recursive($obj->empresa),
                        'acciones'=>array_utf8_encode_recursive($acciones)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('persona'=>'',
                        'correos'=>'',
                        'id'=>'',
                        'nombreEmpresa'=>'',
                        'acciones'=>'',
                         'acciones2'=>''
                      );

        }
     echo json_encode($arr);
}
//------------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="productos")
{
    $con="SELECT clave,nombre_producto,categorias.nom_categoria,precio,kilogramos,producto.id_categoria 
          from producto
          INNER JOIN categorias on producto.id_categoria=categorias.id_categoria";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class= "glyphicon glyphicon-trash" id="'.$obj->clave.'">'; 
           $acciones2='<span class= "glyphicon glyphicon-pencil" id="'.$obj->clave.'">';
                        $arr[]=array('id'=>$obj->clave,
                        'nombre'=> array_utf8_encode_recursive($obj->nombre_producto),
                        'categoria'=> array_utf8_encode_recursive($obj->nom_categoria),
                        'precio'=> $obj->precio,
                        'kilo'=> array_utf8_encode_recursive($obj->kilogramos),
                        'acciones'=>array_utf8_encode_recursive($acciones),
                        'acciones2'=>array_utf8_encode_recursive($acciones2)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('id'=>'',
                        'nombre'=>'',
                        'categoria'=> '',
                        'precio'=> '',
                        'kilo'=> '',
                        'acciones'=>'',
                        'acciones2'=>''
                      );

        }
     echo json_encode($arr);
}
//--------------------------------------------------------------------------------------------
if(isset($_GET["consulta"]) and $_GET["consulta"]=="productos1")
{
    $con="SELECT clave,nombre_producto,categorias.nom_categoria,precio,kilogramos,producto.id_categoria 
          from producto
          INNER JOIN categorias on producto.id_categoria=categorias.id_categoria WHERE clave=".$_GET["clave"]."";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

           
           $acciones='<span class= "glyphicon glyphicon-trash" id="'.$obj->clave.'">'; 

           $acciones2='<span class= "glyphicon glyphicon-pencil" id="'.$obj->clave.'">';
                        $arr[]=array(
                        'clave'=>array_utf8_encode_recursive($obj->clave),
                        'nombre'=> array_utf8_encode_recursive($obj->nombre_producto),
                        'categoria'=> array_utf8_encode_recursive($obj->nom_categoria),
                        'precio'=>array_utf8_encode_recursive($obj->precio),
                        'kilo'=> array_utf8_encode_recursive($obj->kilogramos),
                        'acciones'=>array_utf8_encode_recursive($acciones),
                        'acciones2'=>array_utf8_encode_recursive($acciones2)
                      );

               

           }  

         
        }
        else
        {
            $arr[]=array(
                        'clave'=>'',
                        'nombre'=>'',
                        'categoria'=> '',
                        'precio'=> '',
                        'kilo'=> '',
                        'acciones'=>'',
                        'acciones2'=>''

                      );

        }
     echo json_encode($arr);
}






//-----------------------------ventas----------------------------------//
if(isset($_GET["consulta"]) and $_GET["consulta"]=="ventas1")
{
    $con="SELECT venta.venta_folio, fecha, hora, detalle_venta.nombre_producto, detalle_venta.kilogramos, venta_total FROM venta
          INNER JOIN detalle_venta ON venta.venta_folio=detalle_venta.venta_folio";

    $result =$db->query($con);
    if($result)
       {
         while($obj=mysqli_fetch_object($result))
           {

$acciones='<span class= "glyphicon glyphicon-trash" id="'.$obj->venta_folio.'">'; 
           $acciones2='<span class= "glyphicon glyphicon-pencil" id="'.$obj->venta_folio.'">';
                        $arr[]=array('id'=>$obj->venta_folio,
                        'fechas'=> array_utf8_encode_recursive($obj->fecha),
                        'horas'=> array_utf8_encode_recursive($obj->hora),
                        'nombre'=> array_utf8_encode_recursive($obj->nombre_producto),
                        'kilo'=> array_utf8_encode_recursive($obj->kilogramos),
                        'total'=> array_utf8_encode_recursive($obj->venta_total)
                      );

               

           }  

         
        }
        else
        {
              $arr[]=array('id'=>'',
                        'fechas'=>'',
                        'horas'=> '',
                        'nombre'=> '',
                        'kilo'=> '',
                        'total'=> ''
                      );

        }
     echo json_encode($arr);
}

//-----------------------------

if (isset($_GET["accion"])and$_GET["accion"]=="borra_arreglo") {
$del="DELETE from producto
where clave=".$_GET["id"];
$result=$db->query($del);
if($result)
  $arr[]=array('bn'=>'1');
else
  $arr[]=array('bn'=>'0');
echo json_encode($arr);
}
//---------------borra cliente---------------------------------------

if (isset($_GET["accion"])and$_GET["accion"]=="borra_cliente") {
$del="DELETE from clientes
where id_cliente=".$_GET["id"];
$result=$db->query($del);
if($result)
  $arr[]=array('bn'=>'1');
else
  $arr[]=array('bn'=>'0');
echo json_encode($arr);
}
//--------------------------------------------Borra proveedor--------------------------------------------------

if (isset($_GET["accion"])and$_GET["accion"]=="borra_proveedor") {
$del="DELETE from proveedor
where id=".$_GET["id"];
$result=$db->query($del);
if($result)
  $arr[]=array('bn'=>'1');
else
  $arr[]=array('bn'=>'0');
echo json_encode($arr);
}



//-----------------------------------------------------------------------------------------------------

  if (isset($_GET["accion"]) and $_GET["accion"] == "agrega_arreglo") {
      
       $add = "INSERT INTO producto(nombre_producto, precio,kilogramos, id_categoria) 
     VALUES('".$_GET["nombre"]."', ".$_GET["precio"].",".$_GET["kilo"].",'".$_GET["categoria"]."');";
        $result=$db->query($add);
        
        if ($result) {
          $arr[]=array('bn'=>'1');

        }else{
          $arr[]=array('bn'=>'0');
        }
        echo json_encode($arr);
      }

//-------------------------EDITAR Producto-------------------

       if (isset($_GET["accion"]) and $_GET["accion"] == "editar_arreglo") {

    //falta revisar los campos
        
        $add = "UPDATE producto SET clave='".$_GET["clave"]."',nombre_producto='".$_GET["nombre"]."',precio='".$_GET["precio"]."',kilogramos='".$_GET["kilo"]."',id_categoria='".$_GET["categoria"]."'
WHERE clave='".$_GET["clave"]."'";

//cambiar
        $result=$db->query($add);
        
        if ($result) {
          $arr[]=array('bn'=>'1');

        }else{
          $arr[]=array('bn'=>'0');
        }
        echo json_encode($arr);
      }
//-----------------------------------------------------------------------------
          if (isset($_GET["accion"]) and $_GET["accion"] == "editar_cliente") {

    //falta revisar los campos
        
        $add = "UPDATE clientes SET id='".$_GET["id"]."',nombre='".$_GET["nombre"]."',apellido='".$_GET["apellido"]."',usuario='".$_GET["usuario"]."',contra='".$_GET["contra"]."'
WHERE id_cliente='".$_GET["id_cliente"]."'";

//cambiar
        $result=$db->query($add);
        
        if ($result) {
          $arr[]=array('bn'=>'1');

        }else{
          $arr[]=array('bn'=>'0');
        }
        echo json_encode($arr);
      }


?>





