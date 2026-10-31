<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td style='background-color: #8b9dc3;'></td>"; 

        // Bucle para la cabecera (números del 50 al 60)
        for ($i = 50; $i <= 60; $i++) {
            echo "<td style='background-color: #c4b5fd;'>$i</td>"; // Cabecera superior
        }
        echo "</tr>";

        // Cuerpo de la tabla (10 filas)
        for ($fila = 1; $fila <= 10; $fila++) {
            
            // 1. COLOR DE LA FILA (Par o Impar)
            if ($fila % 2 == 0) {
                echo "<tr style='background-color: peachpuff;'>"; 
            } else {
                echo "<tr style='background-color: lightyellow;'>"; 
            }

            echo "<td style='background-color: #c4b5fd;'>$fila</td>"; // Cabecera lateral

            // Columnas interiores de la fila
            for ($columna = 50; $columna <= 60; $columna++) {
                // 2. COMPROBAMOS LA DIVISIBILIDAD (Asterisco o Guion)
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