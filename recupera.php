<?php
    function recupera($nombre_campo) {
        if (isset($_POST[$nombre_campo])) {
            return $_POST[$nombre_campo];
        }
        return 0; // Valor de seguridad por si no llega el dato
    }
?>