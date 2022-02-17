<?php
include_once('conexion/conexion.php');
session_start();

if(isset($_SESSION['id_producto'])){

  $id = $_SESSION['id_producto'];
  $QUERY = "SELECT * from productos where id_producto='$id'";
  $rsQUERY = mysqli_query($conn, $QUERY) or die ('Error: ' . mysqli_error($conn));
  $countQUERY = mysqli_num_rows($rsQUERY);

  if($countQUERY <= 0){
   // header('location: index.php');
  }
}else{
//  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php</title>
</head>
<body>
  <h2>Lista de Productos</h2>
  
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
    </tr>

    <?php
      $QUERY = "SELECT * from productos";
      $rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
      
      while($fileQUERY = mysqli_fetch_array($rsQUERY)){
        ?>
      <tr>
        <td>
          <?php
            echo $fileQUERY['id_producto'];
          ?>
        </td>
        <td>
          <?php
            echo $fileQUERY['nombre'];
          ?>
        </td>
        <td>
          <?php
            echo $fileQUERY['precio'];
          ?>
        </td>
        <td>
          <?php
            echo $fileQUERY['cantidad'];
          ?>
        </td>
        <td>
          <a href="modificarProducto.php?ID=<?php echo $fileQUERY['id_producto']; ?>" >modificar </a>
        </td>
        <td>
          <a href="#" name="Eliminar" title="Eliminar" onClick="eliminar(<?php echo $fileQUERY['id_producto'] ?>)"> eliminar</a>
        </td>
      </tr>
        <?php } ?>
  </table>
  <?php
    mysqli_close($conn);
  ?>
  <br>
  <a href="index.php">Regresar</a>
  <a href="agregarProductos.php">Agregar</a>

  <script>
    function eliminar(id){
      confirmar = confirm("Deseas Borrar el Registro");

      if(confirmar == true) {
        url = '/procesos/procesos.php?ID=' + id + '&borrar=si';
        location.href=url;

        alert("Eliminado, el registro se elimino por completo");
      }else{
        alert("Cancelado, el registro no se elimino");
        return false;
      }
      window.refresh();
    }
  </script>
</body>
</html>