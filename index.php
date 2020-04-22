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
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1>Tablas de Temperaturas</h1>
        <div>
            <form name="Formulario Tabla de Multiplicar" 
                  action="temperaturas.php" method="POST">
                      <?php
                      $ciudades = Array("San Sebastian", "Sevilla", "Barcelona", "Almería");
                      $meses = Array();
                      
                      setlocale(LC_TIME,null);
                      
                      for ($m = 1; $m <= 12; $m++) {
                          $mes = strftime("%B",mktime(0, 0, 0, $m));
                          $meses[] = $mes;
                      }
                     // $meses = Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                     //     "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                      $datos = Array("Tmax", "Tmin");
                      

                      foreach ($ciudades as $ciudad) {

                          echo "<table>";
                          echo "<tr>";
                          echo "<td>Mes</td>";
                          foreach ($datos as $dato) {
                              echo "<td>", $dato, "</td>";
                          }
                          echo "</tr>";
                          foreach ($meses as $mes) {
                              echo "<tr>";
                              echo "<td>$mes</td>";
                              foreach ($datos as $dato) {
                                  echo "<td><input type='number' max='80' min='-80' maxlength='2' size='2' value =" . rand(-10, 30) .
                                          " name = 'temperaturas[$ciudad][$mes][$dato]'/></td>";
                              }
                              echo "</tr>";
                          }
                          echo "</table>";
                      }
                      ?>

                <input class="submit" type="submit" 
                       value="Enviar Temperaturas" name="botonenvio" />
            </form>
        </div>

    </body>
</html>
