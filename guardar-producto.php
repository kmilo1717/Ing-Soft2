<?php

if(isset($_POST)){

    require_once 'config/database.php';
    $type = isset($_POST['type']) ? mysqli_real_escape_string($db, $_POST['type']) : false;
    $price = isset($_POST['price']) ? (int)$_POST['price'] : false;
    $size = isset($_POST['size']) ? (int)$_POST['size'] : false;
    $bedrooms = isset($_POST['bedrooms']) ? (int)$_POST['bedrooms'] : false;
    $year = isset($_POST['year']) ? (int)$_POST['year'] : false;
    $cars = isset($_POST['cars']) ? (int)$_POST['cars'] : false;
    $type_zone = isset($_POST['type_zone']) ? mysqli_real_escape_string($db, $_POST['type_zone']) : false;
    $address = isset($_POST['address']) ? mysqli_real_escape_string($db, $_POST['address']) : false;
    $pool = isset($_POST['pool']) ? 1 : 0;
    $fireplace = isset($_POST['fireplace']) ? 1 : 0;

    if (isset($_FILES)) {
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['foto']['name'];
        
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES['foto']['type'];
            $temp = $_FILES['foto']['tmp_name'];
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
                header("Location: administrar.php");
            } else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor

                if (move_uploaded_file($temp, 'images/productos/'.$_GET['editar'].'.png')) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('images/productos/'.$_GET['editar'].'.png', 0777);
                    
                    header("Location: administrar.php");
    
                }
            }
        }
    }



    if (isset($_GET['editar'])) {
        $producto_id = $_GET['editar'];

        $sql = "UPDATE estates SET type = '$type', size = $size, bedrooms = $bedrooms, garage_cars = $cars, address = '$address', pool = $pool, type_zone = '$type_zone', fireplace = $fireplace, years = $year, price = $price" .
            " WHERE id = $producto_id";
    } else {
        $sql = "INSERT INTO estates VALUES(null, '$type', $size, $bedrooms, $cars, '$address', $pool, '$type_zone', $fireplace, $year, $price);";
    }
    $guardar = mysqli_query($db, $sql);

    header("Location: administrar.php");

}
