<?php
include_once('../conexion/conexion.php');
session_start();

if(isset($_SESSION['id_producto'])){

  $id = $_SESSION['id_producto'];
  $QUERY = "SELECT * from productos where id_producto='$id'";
  $rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
  $countQUERY = mysqli_num_rows($rsQUERY);

  if($countQUERY <= 0){
    //header('location: index.php');
  }
}else{
 // header('location: index.php');
}

if(isset($_POST['nuevo'])){
  if($_POST['nuevo'] == 'Registrar'){

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $QUERYInt = "INSERT into productos (nombre, precio, cantidad) values('$nombre', '$precio', '$cantidad')";
    $rsQUERYInt = mysqli_query($conn, $QUERYInt) or die('Error: ' . mysqli_error($conn));

    if($rsQUERYInt == true){
      header('location: ../productos.php');
    }if($rsQUERYInt == false){
      echo "Error no se pudo registrar el producto";
    }else{
      echo "Posible ataque de subida";
    }
  }
}

if(isset($_POST['modificar'])){
  if($_POST['modificar'] == 'GUARDAR'){

    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $query = "SELECT * from productos Where id_producto='$id_producto'";
    $rsquery = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));
    $filequery = mysqli_fetch_array($rsquery);

    $QUERYmod = "UPDATE productos SET nombre='$nombre',precio='$precio',cantidad='$cantidad' Where id_producto='$id_producto'";
    $rsQUERYmod = mysqli_query($conn, $QUERYmod) or die('Error: ' . musqli_error($conn));

    if($rsQUERYmod == true){
      header('location: ../productos.php');
    }if($rsQUERYmod == false){
      echo "Error no se pudo Actualizar el usuario";
    }
  }
}

if(isset($_GET['Eliminar'])){
  if($_GET['Eliminar'] == 'si'){

    $id_producto = $_GET['$id'];

    $QUERYdel = "DELETE from productos Where id_producto='$id_producto'";
    $rsQUERYdel = mysqli_query($conn, $QUERYdel) or die('Error: ' . mysqli_error($conn));

    if($rsQUERYdel == true){
      header('location: ../productos.php');
    }if($rsQUERYdel == false) {
      echo "Error no se pudo Eliminar el producto";
    }
  }
}
mysqli_close($conn);
?>