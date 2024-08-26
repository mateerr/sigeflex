<?php
error_reporting(E_ALL);
session_start();
include_once('Db.php');
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
include('tabla.php');
$consulta = "SELECT * FROM Usuario";
$registros = 6;
// Mi_mostrar_tabla($Db,$consulta);

MostrarTabla($registros);

?>
</section>
</main>
    


</body>
</html>