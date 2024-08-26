<?php
include_once('Db.php');
// Conexión a la base de datos
$conn = Conexion('base_de_datos');


// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Configuración de la paginación
$registros_por_pagina = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$inicio = ($page - 1) * $registros_por_pagina;

// Consulta para obtener el total de usuarios
$sql_total = "SELECT COUNT(*) as total FROM usuario";
$result_total = $conn->query($sql_total);
$total_registros = $result_total->fetch_assoc()['total'];

// Consulta para obtener los usuarios de la página actual
$sql_usuarios = "SELECT * FROM usuario LIMIT $inicio, $registros_por_pagina";
$result_usuarios = $conn->query($sql_usuarios);

echo "<h2>Lista de Usuarios</h2>";

if ($result_usuarios->num_rows > 0) {
    echo "<ul>";
    while($row = $result_usuarios->fetch_assoc()) {
        echo "<li>" . $row["Nombre"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron usuarios.";
}

// Generar enlaces de paginación
$total_paginas = ceil($total_registros / $registros_por_pagina);
echo "<div>";
for ($i=1; $i<=$total_paginas; $i++) {
    echo "<a href='pagina.php?page=$i'>$i</a> ";
}
echo "</div>";

$conn->close();
?>

<!--
    A continuación, explico paso a paso el código:
1-Se establece la conexión a la base de datos MySQL utilizando la extensión MySQLi. Debes reemplazar 'localhost', 'usuario', 'contraseña' y 'basedatos' con los valores correspondientes para tu configuración.
2-Se definen dos variables: $registrosPorPagina indica la cantidad de registros a mostrar por página y $paginaActual obtiene el número de página actual desde la URL mediante $_GET['pagina']. Si no se proporciona ningún número de página, se establece el valor predeterminado como 1.
3-Se calcula el desplazamiento necesario para obtener los registros de la página actual. Esto se hace multiplicando el número de página actual menos 1 por la cantidad de registros por página.
4-Se realiza una consulta SQL para obtener los registros de la tabla "usuario" utilizando la cláusula LIMIT con el desplazamiento y la cantidad de registros por página. El resultado se almacena en la variable $resultado.
5-Se realiza otra consulta SQL para obtener el número total de registros en la tabla "usuario". El resultado se almacena en la variable $resultadoTotal y se extrae el valor utilizando fetch_assoc()['total'].
6-Se calcula el número total de páginas dividiendo el número total de registros entre la cantidad de registros por página y redondeándolo hacia arriba utilizando la función ceil().
7-Se recorren los registros obtenidos en el paso 4 y se muestran en la página.
8-Se generan enlaces de paginación para todas las páginas disponibles. Cada enlace tiene una URL con el número de página correspondiente.
9-Se cierra la conexión a la base de datos.
En resumen, este código establece una conexión a la base de datos, obtiene los registros correspondientes a la página actual y muestra los resultados. También genera enlaces de paginación para navegar entre las diferentes páginas de resultados.

-->