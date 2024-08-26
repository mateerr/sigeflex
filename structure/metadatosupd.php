<?php
session_start(); // Inicia una nueva sesión o reanuda una sesión existente
error_reporting(E_ALL); // Mostrar todos los errores para depuración

// Incluyo el archivo de conexión a la base de datos
include_once('Db.php');

// Validar y sanitizar las entradas del formulario
$dni = filter_input(INPUT_POST, 'dni',FILTER_SANITIZE_STRING); 
// Declaro que la entrada es del metodo POST,
# el nombre del input es 'dni', y la ultima sentencia filtrará los datos ingresados. Hago lo mismo con
# El resto de Strings (Cadenas de texto) y numeros enteros (int).
$nombre = filter_input(INPUT_POST, 'nombre',FILTER_SANITIZE_STRING);
$apellido = filter_input(INPUT_POST, 'apellido',FILTER_SANITIZE_STRING);
$edad = filter_input(INPUT_POST, 'edad',FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'cargo',FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);


// Verificar si se ha enviado el formulario de modificar
if (isset($_POST['modificar'])) {

    // Conexión a la base de datos
    $conexion = Conexion('base_de_datos'); // Asegúrate de que esta función esté definida en Db.php

    // Consulta SQL
    $sql = "UPDATE `usuario` SET `DNI`='$dni', `Apellido`='$apellido', `Nombre`='$nombre', `Edad`='$edad', `Usuario`='$usuario', `Permiso`='$cargo' WHERE `DNI`='$dni'";

    // Ejecutar la consulta
    $result = Ejecutar_Consulta($conexion,$sql);

    if ($result) {
        // Verificar si se ha modificado alguna fila
        if ($result) {
            echo "<script>alert('Usuario Modificado con exito.');</script>";
            header("Location: principal.php");
            exit();
        } else {
            echo "<script>alert('No se encontró el usuario o no se realizaron cambios.');</script>";
            header("Location: modificaruser.php");
            exit();
        }
    } else {
        // Mostrar un mensaje de error si la actualización falló
        echo "<script>alert('Error al actualizar el usuario.');</script>";
        header("Location: modificaruser.php");
        exit();
    }
}
?>