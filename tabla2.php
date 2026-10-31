<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla1</title>
</head>
<body>
    <?php
        // Función para recepcionar los valores
        function recupera($nombre_campo) {
            if (isset($_POST[$nombre_campo])) {
                return $_POST[$nombre_campo];
            }
            return 0; // Valor de seguridad por si no llega el dato
        }

        // Usamos la función para obtener los números del formulario
        $inicio = recupera('inicio');
        $fin = recupera('fin');

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td style='background-color: #8b9dc3;'></td>"; 

        // Bucle para la cabecera (números del 50 al 60)
        for ($i = 50; $i <= 60; $i++) {
            echo "<td style='background-color: #c4b5fd;'>$i</td>";
        }
        echo "</tr>";

        // Cuerpo de la tabla (ahora el bucle va desde el $inicio hasta el $fin introducidos)
        for ($fila = $inicio; $fila <= $fin; $fila++) {
            
            // 1. COLOR DE LA FILA (Par o Impar)
            if ($fila % 2 == 0) {
                echo "<tr style='background-color: peachpuff;'>"; 
            } else {
                echo "<tr style='background-color: lightyellow;'>"; 
            }

            echo "<td style='background-color: #c4b5fd;'>$fila</td>"; // Cabecera lateral

            // Columnas interiores de la fila
            for ($columna = 50; $columna <= 60; $columna++) {
                // 2. COMPROBAMOS LA DIVISIBILIDAD
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