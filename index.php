<?php
include_once('conexion/conexion.php');
session_start();


if(isset($_SESSION['id_user'])){

  $id = $_SESSION['id_user'];
  $QUERY = "SELECT * from user where id_user='$id'";
  $rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
  $countQUERY = mysqli_num_rows($rsQUERY);

  if($countQUERY <= 0){
    //header('location: index.php');
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
  <title>Menu</title>
</head>
<body>
  Bienvenido: <br>
  <h2>
    Menu Opciones
  </h2>
  <ol>
    <li>
      <a href="productos.php">Productos</a>
    </li>
  </ol>
</body>
</html>