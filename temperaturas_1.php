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
      //  $temperaturas = $_POST();
        
        $tablaTemperaturas = [
            "Madrid" => ["TMax" => 42, "TMed" => 21, "TMin" => -2],
            "Barcelona" => ["TMax" => 37, "TMed" => 19, "TMin" => 5],
            "Sevilla" => ["TMax" => 45, "TMed" => 23, "TMin" => 10],
            "Bilbao" => ["TMax" => 37, "TMed" => 19, "TMin" => 4]];
        
        foreach ($tablaTemperaturas as $ciudad => $datosCiudad) {
            $nombres[] = $ciudad;
            $tmax[] = $datosCiudad['TMax'];
            $tmed[] = $datosCiudad['TMed'];
            $tmin[] = $datosCiudad['TMin'];
        }

        array_multisort(
                $nombres, SORT_STRING, SORT_ASC, $tmax, SORT_DESC, $tmin, SORT_ASC, $tablaTemperaturas);

        echo "<h1>Tabla Temperaturas</h1>";
        echo "<table border='1'>";
        foreach ($tablaTemperaturas as $nombre => $datosCiudad) {
            echo "<tr>";
            echo "<td style=padding:1em>", $nombre, "</td>";
            echo "<td style=padding:1em>", $datosCiudad['TMax'], "</td>";
            echo "<td style=padding:1em>", $datosCiudad['TMed'], "</td>";
            echo "<td style=padding:1em>", $datosCiudad['TMin'], "</td>";
            print "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
