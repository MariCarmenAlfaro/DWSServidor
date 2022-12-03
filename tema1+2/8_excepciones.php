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
                    <li class="act"><a href="6_validar_get.php">Super constantes</a></li>
                    <li class="act"><a href="7_pruebaGET.php">Prueba GET</a></li>
                    <li class="act"><a href="8_excepciones.php">Excepciones</a></li>


                </ul>
            </div>
            <div class="segunda_columna"> <p>
                <?php
                ini_set('display_errors', 'On');
                ini_set('html_errors', 0);
                try{
                    $numero=10;
                    echo "Resultado: ".$numero/0;
                }
                catch(DivisionByZeroError $e)
                {
                    echo "ERROR: $e";
                }
                 // phpinfo(); te da informacion del sistema
                phpinfo();
                ?>
                </p></div>
            <div class="tercera_columna"><3</div>
            


        </div>
        <div class="tercer_caja"><3</div>
        <div class="pieDePagina">Pie de página</div>
    <div>
</body>
</html>

