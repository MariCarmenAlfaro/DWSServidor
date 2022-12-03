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
                    <li class="act"><a href="3_arrays_bucles.php">Arrays y bucles</a></li>
                    <li class="act"><a href="4_constantes.php">Constantes</a></li>
                    <li class="act"><a href="5_superGlobales.php">Super constantes</a></li>

                </ul>
            </div>
            <div class="segunda_columna"> <p>
                <?php
                   function obtenerInformacion($variable)
                   {
                    $cadena='[ ';
                    foreach($variable as $key=>$val)
                    {
                        $cadena.=$key.'=>'.$val.",<br>";
                    
                    }
                    $cadena.=']';
                    return $cadena;
                   }
                ?>
                <?php
                //+Tarea con solución: ¿Cómo mostrar uno de los valores de una de las variables?
               echo 'Variable $_SERVER[]'. $_GET["HTTP_SERVER_AGENT"]."<br>";
                echo 'Variable $_GET'. obtenerInformacion($_GET)
            
                ?>
                <!--
                    Prueba a ejecutar el script con otra 
                    $_GLOBALS
                    $_GET
                    $_POST
                    $_REQUEST
                    $_ENV
                -->
                </p></div>
            <div class="tercera_columna">assas</div>
            


        </div>
        <div class="tercera_caja">ccc</div>
        <div class="pieDePagina">Pie de página</div>
    <div>
</body>
</html>

