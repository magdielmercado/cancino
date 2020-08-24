<?php
    
    session_start();

    $idusuario=$_SESSION['admin_id'];

    include "../config/config.php";

    if (isset($_FILES["file"]))
    {
        $file = $_FILES["file"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "../images/profiles/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          //echo "Error, el archivo no es una imagen"; 
            echo "<br><div class='alert alert-info' role='alert'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>¡Error!</strong> El archivo no es una imagen!
            </div>";
        }
        else if ($size > 1024*1024)
        {
          //echo "Error, el tamaño máximo permitido es un 1MB";
            echo "<br><div class='alert alert-danger' role='alert'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>¡Error!</strong> El tamaño máximo permitido es un 1MB!
            </div>";
        }
        else
        {
           $src = $carpeta.$nombre;
           $sql = "select * from usuario where idusuario = $idusuario;";
           $query = mysqli_query($con, $sql);
           $registro = mysqli_fetch_array($query);

           $filename = $registro['usuario']."jpg";
           @move_uploaded_file($filename, $src);

           $query=mysqli_query($con, "UPDATE usuario set fotousuario=\"$nombre\" where idusuario=$idusuario");
           if($query){
            echo "<br><div class='alert alert-success' role='alert'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>¡Bien hecho!</strong> Perfil Actualizado Correctamente
            </div>";
           }
        }
    }

?>