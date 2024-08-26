<?php
session_start();
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>

    
        
        <link rel="stylesheet" href="../assets/scss/custom.css">
        
      
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <main>
            <section class='menu__wrapper navbar navbar-expand-lg bg-body-tertiary'>
    <?php
        require_once('menu.php');
    ?>
</section>
<section class="container">
    <br> <br> <br>
<div class='card text-center'>
        <div class='card-header'>
            Nuevo
        </div>
        <div class='card-body'>
            <h5 class='card-title'>Crear Usuario</h5>
            <div class='row'>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                        <form action="crearusuario.php" method="post">
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>DNI</span>
                            <input type='text' placeholder="Introduzca su DNI" name='dni' class='form-control' required  >
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Nombre</span>
                            <input type='text' placeholder="Nombre" name='nombre' class='form-control' required  >
                            <input type='text' placeholder="Apellido" name='apellido' class='form-control' required  >
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Edad</span>
                            <input type='text' placeholder="Introduzca la edad" name='edad' class='form-control' required  >
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Usuario</span>
                            <input type='text' placeholder="Introduzca un Usuario" name='usuario' class='form-control'required   >
                        </div>
                        <br>
                        <select class="form-select" aria-label="Default select example" name="cargo" required>
                            <option selected>Cargo</option>
                            <option value="1">Super Usuario</option>
                            <option value="2">Administrador</option>
                            <option value="3">Invitado</option>
                        </select>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Contraseña</span>
                            <input type='password' placeholder="Contraseña" name='password' class='form-control' required  >
                        </div>
                    </div>
                </div>
            </div>
               <!-- Input del Tipo Boton Submit (Ingresar Datos)-->     
               <input type="submit"class="btn btn-success justify-content-center " name="submit" value="Crear Cuenta">
            </form>
        </div>
        <div class='card-footer text-body-secondary'>
           
        </div>
    </div>

</section>
</main>
<?php
include_once('Db.php');

$conexion = Conexion('base_de_datos'); // Establezco la conexión

// Recopilo cada valor del formulario.
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$usuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$password = $_POST['password'];


if(isset($_POST['submit'])){ // Si se apreta el boton de "Crear", se realiza lo siguiente:
 $crear = "  INSERT INTO `usuario`(`DNI`, `Apellido`, `Nombre`, `Edad`, `Usuario`, `Password`, `Permiso`) VALUES 
    ('$dni','$apellido','$nombre','$edad','$usuario','$password','$cargo')";
// Inserta los datos del form a la base de datos.

$result = Ejecutar_Consulta($conexion, $crear); // Ejecuta la consulta en la base de datos.

echo '
<script>
alert("Usuario Creado con exito");
</script>
';
header("location: principal.php"); // Da un mensaje dependiendo del resultado.
}elseif(mysqli_affected_rows($result)){
    echo '
<script>
alert("Error.");
</script>
';
}

?>
    
</body>
</html>