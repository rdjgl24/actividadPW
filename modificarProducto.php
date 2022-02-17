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

if(isset($_GET['id_producto'])){
  $id_producto = $_GET['id_producto'];
}else{
  header('location: productos.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Producto</title>
</head>
<body>
  <h2>Modificar Usuario</h2>

  <form action="procesos/procesos.php" method="post" name="form1" enctype="multipart/form-data">

    <?php
      $QUERYmod = "SELECT * from productos Where id_producto='$id_producto'";
      $rsQUERYmod = mysqli_query($conn,$QUERYmod) or die('Error: ' . mysqli_error($conn));
      $fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
    ?>

    <table border="0">
      <tr>
        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
      </tr>
      <tr>
        <th>Nombre</th>
        <td><input type="text" name="nombre" value="<?php echo $fileQUERYmod['nombre']; ?>"></td>
      </tr>
      <tr>
        <th>Precio</th>
        <td><input type="text" name="precio" value="<?php echo $fileQUERYmod['precio']; ?>"></td>
      </tr>
      <tr>
        <th>Cantidad</th>
        <td><input type="text" name="cantidad" value="<?php echo $fileQUERYmod['cantidad']; ?>"></td>
      </tr>
    </table>
    <br>
    <input type="submit" name="modificar" value="GUARDAR">
  </form>
  <br>
  <a href="productos.php">Regresar</a>

  <?php
  mysqli_close($conn);
  ?>
</body>
</html>