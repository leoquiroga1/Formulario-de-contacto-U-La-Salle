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
    <style>
        body {
            background: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        input[type="submit"], input[type="reset"] {
            width: 48%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #28a745;
            margin-right: 4%;
        }

        input[type="reset"] {
            background-color: #dc3545;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>

    <form action="#" method="post">
        <h2 style="text-align:center; color:#333;">Registro</h2>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <div style="display: flex; justify-content: space-between;">
            <input type="submit" name="registro" value="Enviar">
            <input type="reset" value="Limpiar">
        </div>
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
