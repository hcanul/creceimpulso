<?php

namespace APP\Helpers;

class UserHelper
{
    public static function GeneratePassword($name, $apaterno, $amaterno)
    {
            // Separar los nombres en caso de que haya dos
        $nameParts = explode(' ', trim($name));

        if (count($nameParts) > 1) {
            // Si tiene dos nombres, tomamos la primera letra de cada uno
            $n = strtolower(substr($nameParts[0], 0, 2) . substr($nameParts[1], 0, 2));
        } else {
            // Si solo tiene un nombre, tomamos las dos primeras letras
            $n = strtolower(substr($nameParts[0], 0, 2));
        }

        // Tomar las primeras dos letras de los apellidos
        $ap = strtolower(substr(trim($apaterno), 0, 2));
        $am = strtolower(substr(trim($amaterno), 0, 2));

        // Generar 4 dígitos aleatorios
        $randomDigits = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Concatenar todo y retornar la contraseña
        return $n . $ap . $am . $randomDigits;
    }
}

?>
