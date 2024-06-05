<?php
include("./conexion.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$anio_publicacion = $_POST['anio_publicacion'];
$id_genero = $_POST['id_genero'];
$trailer_url = $_POST['trailer_url'];
$video_url = $_POST['video_url'];
$id_admin = $_POST['id_admin'];


$sql1 = "INSERT INTO peliculas (nombre, descripcion, anio_publicacion, id_genero, trailer_url, video_url, id_admin) VALUES ('$nombre', '$descripcion', '$anio_publicacion', '$id_genero', '$trailer_url', '$video_url', '$id_admin')";
mysqli_query($conexion, $sql1);


$propietario = $_POST["nombre"];
$targetDirectory = "../uploads/$propietario/";
$targetlocal = "./uploads/$propietario/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

foreach ($_FILES["imagenes_miniatura"]["name"] as $key => $name) {
    $targetFile = $targetDirectory . basename($name);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    
    
    $check = getimagesize($_FILES["imagenes_miniatura"]["tmp_name"][$key]);
    if ($check !== false) {
        
        if (move_uploaded_file($_FILES["imagenes_miniatura"]["tmp_name"][$key], $targetFile)) {

            $nombre_imagen = basename($name);
            $targetFile = $targetlocal . basename($name);
            $ruta_imagen = $targetFile;
           
            $sql2 = "INSERT INTO imagenes_miniatura (propietario, nombre_imagen, ruta_imagen) VALUES ('$propietario', '$nombre_imagen', '$ruta_imagen')";
            mysqli_query($conexion, $sql2);
            
                        
            

            echo "<script>
                alert('Guardado con exito')
                window.location= '../peliculas.php' 
            </script>";
            
            
        } else {
            echo "<script>
            alert('error en guardar')
            window.location= '../AgregarPelicula.php'
            </script>";
        }
    } else {
        echo "<script>
        alert('Formato no soportado')
        window.location= '../AgregarPelicula.php'
        </script>";
    }
}

?>