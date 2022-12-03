<html>
<head>
    <title>Esto es el titulo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
            <a href="0_index.php">INICIO</a> <br>
            <a href="pagina1.html">Primera página</a> <br>
            <a href="pagina2.html">Segunda página</a>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">
                <ul class="listaAct">
                    <li class="act"> <a href="1_hola_mundo_comentarios.php">Probando comentarios</a></li>
                    <li class="act" > <a href="2_variables y tipos.php"> Variables y tipos</a></li>

                </ul>
            </div>
            <div class="segunda_columna"> <p>
                <?php
                   $numero_entero=5;
                   $numero_flotante=6.5;
                   $cadena="Hi!";

                   echo gettype($numero_entero)."".$numero_entero."<br>";
                   echo gettype($numero_flotante)."".$numero_flotante."<br>";
                   echo gettype($cadena)."".$cadena."<br>";

                ?>
                </p></div>
            <div class="tercera_columna">assas</div>
            


        </div>
        <div class="tercera_caja">ccc</div>
        <div class="pieDePagina">Pie de página</div>
    <div>
</body>
</html>

