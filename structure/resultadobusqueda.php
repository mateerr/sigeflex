<?php
error_reporting();
session_start();

$nombre=$_SESSION['nom'];
$apellido=$_SESSION['ap'];

$dni = $_SESSION['dni'];
$cargo = $_SESSION['cargo'];
$imagen=$_SESSION['dni']; // Carga los datos del usuario 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/styles/principal.css"> <!-- Llamo a mi hoja de estilos-->

    <link rel="stylesheet" href="../assets/scss/custom.css">
    <title> Pagina Principal</title>

    <!-- Tipografias -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Libre+Baskerville:ital@1&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Oswald&family=Roboto+Slab:wght@400;700&family=Roboto:wght@300&display=swap" rel="stylesheet">

    

        
                                <!-- BOOSTSTRAP -->

                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
         
    
</head> 
<body>
    <main class="main">
<section class="menu__wrapper navbar navbar-expand-lg bg-body-tertiary">
<?php include('menu.php'); 
        
?>

</section>

<!-- Llamo al archivo tabla, antes, le creo una seccion -->
 <section>
 <?php

 // Uso Estructura similar a la de principal.php

$busqueda = $_POST['busqueda']; 
// Ya que mi buscador, es al mismo tiempo un formulario,
# recibo el valor escrito y lo almaceno acá.

$consulta_busq = "SELECT * FROM usuario WHERE (Apellido LIKE '%$busqueda%' OR Nombre LIKE '%$busqueda%' OR Usuario 
LIKE '%$busqueda%' OR Edad LIKE '%$busqueda%') order by Apellido";

// Doy la instrucción de lo que tiene que consultar, implemento el resultado de la variable $busqueda.

include('tabla.php');

// Llamo a mi tabla.

if(isset($busqueda)){ // -Si- Mi variable $busqueda es funcional, util, hago lo siguiente.

    // Llamo la función que muestra la tabla,
    // la cual fue modificada para aceptar dos parametros distintos.
    // La base de datos y la instruccion. En este caso usa la instrucción de arriba.
Mi_mostrar_tabla($Db,$consulta_busq);
}
// Si mi variable no es compuesta, (sin valor, es decir, null) hago lo siguiente.
else{
    // Doy un aviso mediante un script, y doy un mensaje en la consola.
    echo "
    <script>
    alert('Error. Porfavor reintentelo.);
    console.log('Error --> Conexión Fallida');
    </script>
    
    
    ";

    header("location: principal.php");

    // Me redirige a mi pagina principal.
}


?>
</section>
</main>

</body>
</html>