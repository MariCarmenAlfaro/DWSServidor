
<?php
$conexion = mysqli_connect('localhost', 'root', '12345');

if (mysqli_connect_errno()) {
    echo "Error al conectar a MySQL" . mysqli_connect_error();
}

mysqli_select_db($conexion, 'carteleria');