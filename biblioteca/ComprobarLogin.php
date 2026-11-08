<?php
    include 'cabecera.php';

    $conn = mysqli_connect($servidor, $userBD, $passwordBD, $nomBD);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    // Consulta utilizando sprintf y encriptando la clave con md5

    $consulta = sprintf("SELECT * FROM usuarios WHERE nombre='%s' AND clave='%s'",
       $nombre,
        md5($clave)
    );
    
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "Login correcto. Bienvenido, " . $nombre;
    } else {
        // Usuario no encontrado, mostrar mensaje de error
        echo "Nombre de usuario o contraseña incorrectos.";
    }
    mysqli_close($conn);
?>



