<?php
include_once('conexion/conexion.php');
session_start();



if(isset($_SESSION['id_productos'])){

  $id = $_SESSION['id_productos'];
  $QUERY = "SELECT * from productos where id_productos='$id'";
  $rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
  $countQUERY = mysqli_num_rows($rsQUERY);
  if($countQUERY <= 0){
  //  header('location: index.php');
  }
}else{
 // header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar productos</title>
</head>
<body>
  <h2>Aregar producto</h2>

  <form action="./procesos/procesos.php" method="post" enctype="multipart/from-data" name="form1">

    <table border="1">
      <th>Nombre</th>
      <td><input type="text" name="nombre"></td>
      <br>
      <th>Precio</th>
      <td><input type="text" name="precio"></td>
      <br>
      <th>Cantidad</th>
      <td><input type="text" name="cantidad"></td>
    </table>
    <br>
    <input type="submit" name="nuevo" value="Registrar">
  </form>
  <br>
  <a href="productos.php">Regresar</a>

  <?php
  mysqli_close($conn);
  ?>
  
</body>
</html>