<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $temperaturas = $_POST['temperaturas'];
        $resumen = [];

        foreach ($temperaturas as $nombreCiudad => $datosCiudad) {
            $max = max(array_column($datosCiudad, 'Tmax'));
            $min = min(array_column($datosCiudad, 'Tmin'));
            $med = (array_sum(array_column($datosCiudad, 'Tmax')) + array_sum(array_column($datosCiudad, 'Tmin'))) / 24;
            $resumen[$nombreCiudad] = ['Tmax' => $max, 'Tmin' => $min, 'Tmed' => $med];
        }

        $tmax = array_column($resumen, 'Tmax');
        $tmed = array_column($resumen, 'Tmed');
        $tmin = array_column($resumen, 'Tmin');

        array_multisort(
                $tmax, SORT_NUMERIC, SORT_DESC, $tmin, SORT_NUMERIC, SORT_ASC, $resumen);

        echo "<h1>Tabla Temperaturas</h1>";
        echo "<table border='1'>";
        foreach ($resumen as $nombre => $datosCiudad) {
            echo "<tr>";
            echo "<td style=padding:1em>", $nombre, "</td>";
            echo "<td style=padding:1em>", $datosCiudad['Tmax'], "</td>";
            echo "<td style=padding:1em>", $datosCiudad['Tmed'], "</td>";
            echo "<td style=padding:1em>", $datosCiudad['Tmin'], "</td>";
            print "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
