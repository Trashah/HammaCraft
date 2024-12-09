<?php
    $id=$_GET['id'];

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "HammaCraft";

    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);

    $sql="delete from productos where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
                alert('Los datos se eliminaron correctamente de la BD');
                location.assign('../admin.php');
                </script>";
    }else{
        echo "<script languaje='JavaScript'>
                alert('Los datos NO se eliminaron de la BD');
                location.assign('../admin.php');
                </script>";
    }
?>