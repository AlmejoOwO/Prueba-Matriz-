<!DOCTYPE html>
<html lang="es">
<head>
    <!--Codigo HTML para generar la matriz-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz </title>
    <style>
        td {
            width: 20px;
            height: 20px;
            text-align: center;
            border: 1px solid black;
            cursor: pointer;
        }
        .deshabilitado {
            background-color: #ccc;
        }
        .seleccionado {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <center><h1> Matriz </h1></center>

    <center><table></center>
    <!--Inicio codigo Php para hacer la matriz-->
    <?php
    //celdas y filas 10x5 
    $matriz = array (
        array (1, 2, 3, 4, 5),
        array (6, 7, 8, 9, 10),
        array (11, 12, 13, 14, 15),
        array (16, 17, 18, 19, 20),
        array (21, 22, 23, 24, 25),
        array (26, 27, 28, 29, 30),
        array (31, 32, 33, 34, 35),
        array (36, 37, 38, 39, 40),
        array (41, 42, 43, 44, 45),
        array (46, 47, 48, 49, 50),
    );


// codigo para desabilitar el numero de celda
    deshabilitarCelda($matriz, 40);
    function deshabilitarCelda(&$matriz, $numero) {
        for ($i = 0; $i < count($matriz); $i++) {
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                if ($matriz[$i][$j] == $numero) {
                    $matriz[$i][$j] = 'X'; 
                    return true;
                }
            }
        }
        return false;
    }
    
    deshabilitarCelda($matriz, 14);
    foreach ($matriz as $fila => $valores) {
        echo "<tr>";
        foreach ($valores as $columna => $valor) {
            $clase = $valor === 'X' ? ' class="deshabilitado"' : ' class="habilitado"';
            echo "<td id='celda-{$fila}-{$columna}'{$clase}>" . (is_numeric($valor) ? $valor : '&nbsp;') . "</td>";
        }
        echo "</tr>";

    }
    ?>
    </table>
<!--codigo Html boton para selecionar celda de maneta aleatoria -->
    <center><p><button onclick="seleccionarAleatorio()">Seleccionar Aleatorio</button></p></center>

    <script>
    // codigo en js para colorear la celda selecionada
        let seleccionadas = 0;
        document.querySelectorAll('.habilitado').forEach(celda => {
            celda.addEventListener('click', function() {
                if (seleccionadas < 5 && !this.classList.contains('seleccionado')) {
                    this.style.backgroundColor = 'yellow';
                    this.classList.add('seleccionado');
                    seleccionadas++;
                }
            });
        });
//mensaje al sobre pasar el numero de casillas selecionadas 
        function seleccionarAleatorio() {
            if (seleccionadas >= 5) {
                alert('Ya has seleccionado 5 celdas.');
                return;
            }
            const habilitados = Array.from(document.querySelectorAll('.habilitado:not(.seleccionado)'));
            if (habilitados.length === 0) {
                alert('No hay más celdas habilitadas disponibles.');
                return;
            }
            const aleatorio = Math.floor(Math.random() * habilitados.length);
            habilitados[aleatorio].style.backgroundColor = 'yellow';
            habilitados[aleatorio].classList.add('seleccionado');
            seleccionadas++;
        }
    </script>
</body>
</html>
