<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTS</title>
    <link rel="stylesheet" href="">
</head>

<body>


    <?php
    //  ini_set('display_errors', 'On');
    // ini_set('html_errors', 0);


    function test_baseDatos()
    {
        $conexion = mysqli_connect('localhost', 'rot', '12345');

        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL" . mysqli_connect_error();
        }

        mysqli_select_db($conexion, 'carteleria');
        return ($conexion == false);
    }
    function test_IdErroneo()
    {

        require('conexionBD.php');
        $id_categoria = 0;
        $ordenacion = 0;
        $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
        $sanitized_ordenacion = mysqli_real_escape_string($conexion, $ordenacion);

        switch ($sanitized_ordenacion) {
            case 1:
                $tipoOrden = "order by votos";
                break;
            case 2:
                $tipoOrden = "order by votos desc";
                break;
            case 3:
                $tipoOrden = "order by titulo";
                break;
            case 4:
                $tipoOrden = "order by titulo desc ";
                break;
            default:
                $tipoOrden = '';
        }

        $consulta = "SELECT id, titulo, año, duracion,sinopsis,imagen, votos, id_categoria FROM T_PELICULA  where id_categoria=" . $sanitized_categoria_id . " " . $tipoOrden . ";";

        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            return false;
        } else {
            $arrayPeli = [];
            if (($resultado->num_rows) > 0) {
                while ($registro = mysqli_fetch_assoc($resultado)) {

                    $peli = new Pelicula(
                        $registro['id'],
                        $registro['titulo'],
                        $registro['año'],
                        $registro['duracion'],
                        $registro['sinopsis'],
                        $registro['imagen'],
                        $registro['votos'],
                        $registro['id_categoria']
                    );
                    $arrayPeli[] = $peli;
                }
            } else {
                return false;
            }
            return ($arrayPeli == true);
        }
    }

    function test_DatosBDCorrecto()
    {

        require('conexionBD.php');
        $id_categoria = 1;
        $ordenacion = 1;
        $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
        $sanitized_ordenacion = mysqli_real_escape_string($conexion, $ordenacion);

        switch ($sanitized_ordenacion) {
            case 1:
                $tipoOrden = "order by votos";
                break;
            case 2:
                $tipoOrden = "order by votos desc";
                break;
            case 3:
                $tipoOrden = "order by titulo";
                break;
            case 4:
                $tipoOrden = "order by titulo desc ";
                break;
            default:
                $tipoOrden = '';
        }

        $consulta = "SELECT id, titulo, año, duracion,sinopsis,imagen, votos, id_categoria FROM T_PELICULA  where id_categoria=" . $sanitized_categoria_id . " " . $tipoOrden . ";";

        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            return false;
        } else {
            $arrayPeli = [];
            if (($resultado->num_rows) > 0) {
                while ($registro = mysqli_fetch_assoc($resultado)) {

                    $peli = new Pelicula(
                        $registro['id'],
                        $registro['titulo'],
                        $registro['año'],
                        $registro['duracion'],
                        $registro['sinopsis'],
                        $registro['imagen'],
                        $registro['votos'],
                        $registro['id_categoria']
                    );
                    $arrayPeli[] = $peli;
                }
            } else {
                return false;
            }
            return ($arrayPeli == true);
        }
    }
    function test_DatosBDErroneo()
    {

        require('conexionBD.php');
        $id_categoria = 1;
        $ordenacion = 1;
        $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
        $sanitized_ordenacion = mysqli_real_escape_string($conexion, $ordenacion);

        switch ($sanitized_ordenacion) {
            case 1:
                $tipoOrden = "order by votos";
                break;
            case 2:
                $tipoOrden = "order by votos desc";
                break;
            case 3:
                $tipoOrden = "order by titulo";
                break;
            case 4:
                $tipoOrden = "order by titulo desc ";
                break;
            default:
                $tipoOrden = '';
        }

        $consulta = "SELECT id, titulo, año, duracion,sinopsis,imagen, votos, id_categoria FROM T_PELICULA  where id_categoria=" . $sanitized_categoria_id . " " . $tipoOrden . ";";

        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            return false;
        } else {
            $arrayPeli = [];
            if (($resultado->num_rows) > 0) {
                while ($registro = mysqli_fetch_assoc($resultado)) {

                    $peli = new Pelicula(
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola'],
                        $registro['Hola']
                    );
                    $arrayPeli[] = $peli;
                }
            } else {
                return false;
            }
            return ($arrayPeli == true);
        }
    }
    function test_votos()
    {
        
        require('conexionBD.php');

        $id_peli = 0;
    
        $sanitized_peli_id = mysqli_real_escape_string($conexion, $id_peli);
        $consulta1 = "update T_PELICULA set votos = votos-1 where id=" . $sanitized_peli_id . ";";
    
        $resultado = mysqli_query($conexion, $consulta1);
        if($consulta1<0){
            return false;
        }
    
    }
    function test($testEjecutar)
    {
        try {
            echo "<br>";
            $resultadoTest = $testEjecutar();
            $mensaje = 'El test: ' . $testEjecutar . ' ';
            $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
            if ($resultadoTest) {
                echo "<span class='ok'>$mensaje $mensajeResultado</span>";
            } else {
                echo "<span class='ko'>$mensaje $mensajeResultado</span>";
            }
        } catch (Exception $e) {
            echo "<br>" . "Se ha producido una excepción al ejecutar: " . $testEjecutar . "<br>";
        }
    }
    echo "Test de las películas:<br>";
    test("test_baseDatos");
    test("test_IdErroneo");
    test("test_DatosBDCorrecto");
    test("test_DatosBDErroneo");
    test("test_votos");
    class Pelicula
    {
        public $id;
        public $titulo;
        public $año;
        public $duracion;
        public $sinopsis;
        public $imagen;
        public $votos;
        public $id_categoria;
        function __construct($id, $titulo, $año, $duracion, $sinopsis, $imagen, $votos, $id_categoria)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->año = $año;
            $this->duracion = $duracion;
            $this->sinopsis = $sinopsis;
            $this->imagen = $imagen;
            $this->votos = $votos;
            $this->id_categoria = $id_categoria;
        }
    }
    ?>
</body>

</html>