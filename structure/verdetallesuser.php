<?php
session_start();
error_reporting(E_ALL); // Muestra todos los errores
include_once("funcs.php");
// Creo la función que mostrará los detalles del usuario

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../assets/scss/custom.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
    <title>Document</title>
</head>
<body>
    
    <!-- Section y clase para el menu. -->
<section class='menu__wrapper navbar navbar-expand-lg bg-body-tertiary'>
    <?php
        require_once('menu.php');
    ?>
</section>
<br><br><br>
<!-- Hago lo mismo, pero para la tabla de los detalles. -->
<section class='container'>

<?php

// Llamo al archivo Db.
include_once('Db.php');

// Recibo el valor del HTML.
$DNI = $_GET['valor'];

// Si $DNI tiene un valor, hace lo siguiente.
if (isset($DNI)) {
    echo "<script>alert('Conexión exitosa');</script>";

    // Conexión a la base de datos
    $conexion = Conexion('base_de_datos');

    // Consulta 
    $consulta = "SELECT * FROM USUARIO WHERE DNI = '$DNI'";
    $result = Ejecutar_Consulta($conexion, $consulta);
//Si hay algun usuario:
    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $apellido = $row['Apellido'];
        $edad = $row['Edad'];
        $dni = $row['DNI'];
        $cargo = $row['Permiso'];
        $usuario = $row['Usuario'];

        //Llamo la funcion "cargo", que segun el permiso, determina el cargo del usuario.

        //El valor que retorne, lo almaceno en $cargoF, que luego llenará la funcion "verdetallesuser".
        $cargoF = cargo($cargo);

        // Llamo la variable, con los datos del usuario correspondiente.
        verdetallesuser($nombre, $apellido, $cargoF, $edad, $usuario, $dni);
    } else {
        echo "<div class='container justify-content-center'>
                <h1>Usuario no encontrado</h1>
              </div>";
    }
    //Cierro la conexion.
    $conexion->close();
} else {
  // Si no se puede conectar, muestra lo sig.
    echo "
            <script>alert('Conexión exitosa');</script>;
          ";
}

?>
</section>
</body>
</html>
