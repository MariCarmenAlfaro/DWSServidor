<html>
<head>
    <title>Esto es el titulo</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        li{
            list-style: none;
        }
    </style>
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

                </ul>
            </div>
            <div class="segunda_columna"> <p>
               <div>
            <?php
            $personas =["Carlos", "Oscar", "Jose"];
            ?>
               </div>
               <ul>
               <?php
                  foreach ($personas as $persona)
                  {
                    echo "<li>$persona</li>";
                  }

                  //TODO Modifica el codigo para que tambien se muestre el array
                  for ($i=0; $i < 10; $i++) { 
                    echo $i;
                 
                  }
                  echo "<br>";  
                  $j=1;
                  for($j=0;$j<count($personas); $j++){
                    echo $j;
                  }
                  echo "<br>"; 
                  $i=0;
                  while($i<count($personas)){
                    echo $i++;
                  }
                  

                ?>
                </ul>
                </p></div>
            <div class="tercera_columna">assas</div>
            


        </div>
        <div class="tercera_caja">ccc</div>
        <div class="pieDePagina">Pie de página</div>
    <div>
</body>
</html>

