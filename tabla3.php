<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla 3</title>
</head>
<body>
    <?php
        // Archivo externo que contiene la función
        include 'recupera.php';

        // Función (ahora cargada desde el archivo externo)
        $inicio = recupera('inicio');
        $fin = recupera('fin');

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td style='background-color: #8b9dc3;'></td>"; 

        for ($i = 50; $i <= 60; $i++) {
            echo "<td style='background-color: #c4b5fd;'>$i</td>";
        }
        echo "</tr>";

        for ($fila = $inicio; $fila <= $fin; $fila++) {
            
            if ($fila % 2 == 0) {
                echo "<tr style='background-color: peachpuff;'>"; 
            } else {
                echo "<tr style='background-color: lightyellow;'>"; 
            }

            echo "<td style='background-color: #c4b5fd;'>$fila</td>";

            for ($columna = 50; $columna <= 60; $columna++) {
                if ($columna % $fila == 0) { 
                    echo "<td>*</td>"; 
                } else { 
                    echo "<td>-</td>"; 
                }
            }

            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>