<?php // Abro PHP.
error_reporting(E_ALL);  // Reporte de errores.
session_start();        // Inicio de Sesión por protocolo.
include_once('Db.php'); // Llamo la hoja de funciones
    $DNI = $_GET['valor']; // Obtengo el valor del usuario.
        if(isset($DNI)){ // Si esta variable almacena algun valor, prosigue asi:
             $sql = "DELETE FROM `usuario` WHERE DNI = $DNI"; // Consulta / Orden SQL.

            $conexion= Conexion('base_de_datos'); // Establezco Conexión.
            $resultado = Ejecutar_Consulta($conexion, $sql); // Ejecuto la consulta.
            echo '
            <script>  alert("Usuario Eliminado con Exito."   <!-- Aviso que se ejecuto con exito -->); </script>
                ';
            header("location: principal.php"); // Redirijo a la pagina principal.
           $conexion->close(); // Cierro la Conexion.
          
        }
            else{ // En el caso contrario, aviso que se detecto un error en el proceso, y redirijo a la
            // pagina principal.

            echo '
             <script>  alert(
            "Se Detecto un error en el proceso." 
            );
            </script>
             header("location: principal.php");
            '; 
            $conexion->close(); // Cierro la Conexion.
        }
?> <!-- Cierro PHP -->