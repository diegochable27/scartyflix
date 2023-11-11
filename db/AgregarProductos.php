<?php
include("./conexion.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$categoria = $_POST['Categoria'];
$despachador = $_POST['despachador'];

$sql1 = "INSERT INTO productos (nombre, descripcion, id_categoria, cantidad, precio, id_Vendedor) VALUES ('$nombre', '$descripcion', '$categoria', '$cantidad', '$precio', '$despachador')";
mysqli_query($conexion, $sql1);


$propietario = $_POST["nombre"];
$targetDirectory = "../uploads/$propietario/";
$targetlocal = "./uploads/$propietario/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

foreach ($_FILES["imagenes"]["name"] as $key => $name) {
    $targetFile = $targetDirectory . basename($name);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    
    
    $check = getimagesize($_FILES["imagenes"]["tmp_name"][$key]);
    if ($check !== false) {
        
        if (move_uploaded_file($_FILES["imagenes"]["tmp_name"][$key], $targetFile)) {

            $nombre_imagen = basename($name);
            $targetFile = $targetlocal . basename($name);
            $ruta_imagen = $targetFile;
           
            $sql2 = "INSERT INTO imagenes (propietario, nombre_imagen, ruta_imagen) VALUES ('$propietario', '$nombre_imagen', '$ruta_imagen')";
            mysqli_query($conexion, $sql2);
            
                        
            

            echo "<script>
                alert('Guardado con exito')
                window.location= '../productos.php' 
            </script>";
            
            
        } else {
            echo "<script>
            alert('error en guardar')
            window.location= '../AgregarProductos.php'
            </script>";
        }
    } else {
        echo "<script>
        alert('Formato no soportado')
        window.location= '../AgregarProductos.php'
        </script>";
    }
}

?>