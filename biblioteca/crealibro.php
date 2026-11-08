<?php
include 'cabecera.php';

// 1. Mostrar contenido de $_POST por pantalla (fase desarrollo)
echo "<h3>Datos recibidos por POST:</h3>";
print_r($_POST);
echo "<hr>";

$conn = mysqli_connect($servidor, $userBD, $passwordBD, $nomBD);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$isbn = $_POST['isbn'];
// Validar y convertir puntuación a entero
$puntuacion = (int)$_POST['puntuacion'];
$genero = $_POST['genero']; 

//2. Consulta para comprobar si existe un libro con el mismo ISBN
$consulta_isbn = sprintf("SELECT id FROM libros WHERE isbn='%s'", $isbn);

//Mostrar el contenido de la consulta antes de ejecutarlo
echo "<p>Consulta: " . $consulta_isbn . "</p>";

$resultado_isbn = mysqli_query($conn, $consulta_isbn);

if (mysqli_num_rows($resultado_isbn) > 0) {
    echo "<p>Ya existe un libro con el mismo ISBN. No se puede añadir.</p>";
} else {
    //3. Consulta para insertar el nuevo libro
    $consulta_insert = sprintf(
        "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) VALUES ('%s', '%s', '%s', %d, '%s')",
        $nombre,
        $autor,
        $isbn,
        $puntuacion,
        $genero
    );

    //Mostrar el contenido de la consulta antes de ejecutarlo
    echo "<p>Consulta: " . $consulta_insert . "</p>";

    if (mysqli_query($conn, $consulta_insert)) {
        echo "<p>Libro añadido correctamente.</p>";
    } else {
        echo "<p>Error al añadir el libro: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
