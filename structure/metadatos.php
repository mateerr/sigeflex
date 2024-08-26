<!--

Inicializo Mi Hoja PHP Y Variables

-->

<?php
session_start(); //Inicia una nueva sesion o reanuda una seccion existente
// Esto nos conectara a la base de datos.
// Cuando inicie una nueva sesion tendre que utilizar las variables
# de la sesion.
include('Db.php');
// Recibo valores desde los forms ingresados en el login, user y password. Respectivamente.

$usuario=$_POST['usuario'];
$password=$_POST['password'];


$consulta= "SELECT * FROM USUARIO WHERE Usuario ='$usuario' AND Password='$password'";
// Linea de codigo para SQL SELECT para obtener el usuario de la tabla de usuarios.
// Y la contraseña de la casilla Password, de la base de datos ambos.

$conexion= Conexion('base_de_datos');// Llamo la función Conexion que está en 
// Db.php, me devuelve el resultado de "$Conect".
// me conecto localmente, sin contraseña, user 'root' a mi base de datos.
// 'localhost'  usando 'root' como nombre.

$result= Ejecutar_Consulta($conexion,$consulta);
// Llamo la funcion de Db.php, $Result almacena el 
// resultado de la consulta.
// Ejecuto conexion y consulta.
// En esta variable se almacenara el resultado de la '$consulta'.

echo $Cant_Filas = mysqli_num_rows ($result);

// Devuelve cantidad de filas del resultado '$result'.

    /*Obtiene cada
    fila de datos usando mysqli_fetch_rows y establece los valores
    en las variables correspondientes
   **/
  
    while($row=mysqli_fetch_array($result)){
        $_SESSION['dni']=$row['DNI'];
        $_SESSION['nom'] =$row['Nombre'];
        $_SESSION['ap'] =$row['Apellido'];
        $_SESSION['edad'] =$row['Edad'];
        $_SESSION['user'] =$row['Usuario'];
        $_SESSION['cargo'] = $row['Permiso'];


      

        // Los primeros, son nuevos nombres, la sentencia
        # $row hace referencia al nombre de la tabla.

    }
  
    

// Redirige a "principal.php" si el resultado es mayor a 0.
# Es decir, hay al menos 1 usuario.

$cant_filas=mysqli_num_rows($result);
if($cant_filas>0)
{
    header("location: principal.php");
}
else{
    
    ?> 
        <script src="javascript/alert.js"> </script>

        <?php header('location: ../login.php');
        
    
}
  
?>

