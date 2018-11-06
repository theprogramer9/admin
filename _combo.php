  <?php 

include("conexion.php");
        echo '<select id="id_categoria">';

          $con="SELECT id_categoria, nom_categoria FROM categorias;";
          $result=$db->query($con);
          if ($result) {
            while($obj=mysqli_fetch_object($result))
            {

              echo '<option id="combo" value="'.$obj->id_categoria.'">'.$obj->nom_categoria.'</option>';
            }
          }
          echo '</select>';

        ?>