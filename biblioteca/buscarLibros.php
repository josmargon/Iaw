<?php
include 'cabecera.php';

$conn = mysqli_connect($servidor, $userBD, $passwordBD, $nomBD);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//1. Comprobar si se ha enviado el formulario y si puntuacion es un número válido
if (isset($_POST['puntuacion']) && $_POST['puntuacion'] !== "") {
    $puntuacion = (int)$_POST['puntuacion'];
    $consulta =  sprintf("SELECT * FROM libros WHERE puntuacion = %d", $puntuacion);
} 
// Tambien lo realizamos con el resto de campos, comprobando que no estén vacíos y escapando los caracteres especiales para evitar inyecciones SQL
elseif (isset($_POST['nombre']) && $_POST['nombre'] !== "") {
    $nombre = $_POST['nombre'];
    $consulta =  sprintf("SELECT * FROM libros WHERE nombre LIKE '%%%s%%'", $nombre);
} 
elseif (isset($_POST['autor']) && $_POST['autor'] !== "") {
    $autor = $_POST['autor'];
    $consulta =  sprintf("SELECT * FROM libros WHERE autor LIKE '%%%s%%'", $autor);
} 
elseif (isset($_POST['isbn']) && $_POST['isbn'] !== "") {
    $isbn = $_POST['isbn'];
    $consulta =  sprintf("SELECT * FROM libros WHERE isbn LIKE '%%%s%%'", $isbn);
} 
elseif (isset($_POST['genero']) && $_POST['genero'] !== "") {
    $genero = $_POST['genero'];
    $consulta =  sprintf("SELECT * FROM libros WHERE genero LIKE '%%%s%%'", $genero);
} 
else {
    // Si no se busca nada seleccionamos todos los libros
    $consulta = "SELECT * FROM libros";
}

// 2. Ejecutar la consulta
$resultado = mysqli_query($conn, $consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            padding: 5px;
            text-align: left;
        }
        .fondo-form {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Mostrar Libros</h2>
    <!--  Mostrar la consulta realizada -->
    <p>Consulta realizada: <?php echo $consulta; ?></p>

    <form action="buscarLibros.php" method="POST">
        <table>  
        <!-- Fila 1: El formulario integrado en la tabla -->
            <tr class="fondo-form">
                <td></td>
                <td>Nombre<input type="text" name="nombre" id="nombre"></td>
                <td>Autor <input type="text" name="autor" id="autor"></td>
                <td>ISBN <input type="text" name="isbn" id="isbn"></td>
                <td>Puntuación 
                    <select name="puntuacion" id="puntuacion">
                        <option value="">--Selecciona--</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </td>
                <td>Genero <input type="text" name="genero" id="genero"></td>
                <td><input type="submit" value="Buscar"></td>
            </tr>

            <!-- Fila 2 y siguientes: Resultado de mySQL -->
            <?php
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['autor'] . "</td>";
                    echo "<td>" . $fila['isbn'] . "</td>";
                    echo "<td>" . $fila['puntuacion'] . "</td>";
                    echo "<td>" . $fila['genero'] . "</td>";
                    echo "<td></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>
<?php
// 3. Cerrar la conexión
mysqli_close($conn);
?>  