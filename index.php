<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "registroestudiantes";
    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
    if (!$enlace) die("Error de conexión: " . mysqli_connect_error());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario</title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="submit" name="registro" value="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </body>
</html>

<?php
    if(isset($_POST['registro'])) {
        $nombre = mysqli_real_escape_string($enlace, $_POST['nombre']);
        $correo = mysqli_real_escape_string($enlace, $_POST['correo']);
        $telefono = mysqli_real_escape_string($enlace, $_POST['telefono']);
        
        $insertarDatos = "INSERT INTO datos (nombre, correo, telefono) 
                          VALUES ('$nombre', '$correo', '$telefono')";
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
        
        if ($ejecutarInsertar) {
            echo "<p>Datos guardados correctamente.</p>";
        } else {
            echo "<p>Error: " . mysqli_error($enlace) . "</p>";
        }
    }
?>