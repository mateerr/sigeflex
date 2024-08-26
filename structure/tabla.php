<head>
<link rel="stylesheet" href="./scss/custom.css">
<link rel="stylesheet" type="text/css" href="../assets/styles/principal.css"> <!-- Llamo a mi hoja de estilos-->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets\javascript\alert.js"></script>
</head>
      

<section class="tabla">
     <br><br><br>
        <?php
    error_reporting();




    $Db='base_de_datos';
     // Doy los datos de mi base de datos (nombre).



/* function Mi_mostrar_tabla($Db,$consulta){  //Creo la funcion.
     // Pido todos(*) los datos de (FROM) mis usuarios.
    $Con = Conexion($Db);
    $Result= Ejecutar_Consulta($Con,$consulta); // Mi $Result, almacena los datos.
   
   // Estructura inicial de la tabla, 
   // Titulares 👇
    echo'
    
   
    
    <div class="container text-center">
    <div class="row justify-content-md-center justify-content-xs-left justify-content-sm-center ">
      <div class=" col-bg-8 col-lg-8 col-xl-8 col-xxl-8">
        
         <form action="resultadobusqueda.php" method="POST">
         <div class="input-group mb-3">
  <input type="text" name="busqueda" class="form-control" name ="busqueda" placeholder="Busca algo..." aria-label="Busqueda" aria-describedby="button-addon2">
  <input class="btn btn-outline-success" type="submit" name="submit"id="button-addon2" value="🔎" style= "z-index:auto; !important">
</div>
  </form>
  

               ';
    
    echo "
    <div class='table-responsive-md'>
      <table class='table table-success  table-hover'>
        <thead class='table-light'>
        <tr>
        <th scope='col'>DNI</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Apellido</th>
        
        <th scope='col'>Cargo</th>
        
        <th scope='col'>Acciones</th>
        </tr>

        </thead>
        <tbody>"; 
        // Mientras (while) se encuentren datos en mi tabla, que muestre:
    while($fila = mysqli_fetch_array($Result)){
        $DNI=$fila['DNI']; 
        // Estos datos.
        $nombre=$fila['Nombre'];
        $apellido=$fila['Apellido'];
        $cargo=$fila['Permiso'];
        $imagen=$fila['DNI'];
        $cargoF=cargo($cargo);

        
      // Lleno las celdas de la tabla con los datos de mis usuarios.
        echo "<tr>
        
                 <td scope='row'>$DNI</td>
                 <td scope='row'>$nombre</td>
                 <td scope='row'>$apellido</td>
                 <td scope='row'>$cargoF</td>
                 
                 
                
                 <td>
                  <a  href='verdetallesuser.php?valor=$DNI'><button type='button' class='btn btn-success'> <i class='bi bi-eye'></i></button></a>
                  <a  href='modificaruser.php?valor=$DNI'> <button type='button' class='btn btn-success'>  <i class='bi bi-pencil-square'></i></button></a> 
                  <a  href='deleteuser.php?valor=$DNI'> <button type='button' class='btn btn-success'>  <i class='bi bi-trash'></i></button></a> 


                  </i></a></td>
               
                  </tr>"; 
        }
        //Cierro DIVS y Mi tabla.
        echo "</tbody></table></div>";
        echo "</div>
                  </div>
                        </div>
                        </div>";

}
**/

?>
<?php
function MostrarTabla($registros){
  // Conexión a la base de datos
  $conn = Conexion('base_de_datos');
  
  $registros = isset($registros) ? $registros : 4;
  
  // Verificar la conexión
  if ($conn->connect_error) {
      die("Error en la conexión: " . $conn->connect_error);
  }
  
  // Configuración de la paginación
  $registros_por_pagina = $registros;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $inicio = ($page - 1) * $registros_por_pagina;
  
  // Consulta para obtener el total de usuarios
  $sql_total = "SELECT COUNT(*) as total FROM usuario";
  $result_total = $conn->query($sql_total);
  $total_registros = $result_total->fetch_assoc()['total'];
  
  // Consulta para obtener los usuarios de la página actual
  $sql_usuarios = "SELECT * FROM usuario LIMIT $inicio, $registros_por_pagina";
  $result_usuarios = $conn->query($sql_usuarios);
  
  // Estructura inicial de la tabla, 
   // Titulares 👇
   echo'
    
   
    
   <div class="container text-center">
   <div class="row justify-content-md-center justify-content-xs-left justify-content-sm-center ">
     <div class=" col-bg-8 col-lg-8 col-xl-8 col-xxl-8">
       
        <form action="resultadobusqueda.php" method="POST">
        <div class="input-group mb-3">
 <input type="text" name="busqueda" class="form-control" name ="busqueda" placeholder="Busca algo..." aria-label="Busqueda" aria-describedby="button-addon2">
 <input class="btn btn-outline-success" type="submit" name="submit"id="button-addon2" value="🔎" style= "z-index:auto; !important">
</div>
 </form>
 

              ';
   
   echo "
   <div class='table-responsive-md'>
     <table class='table table-success  table-hover'>
       <thead class='table-light'>
       <tr>
       <th scope='col'>DNI</th>
       <th scope='col'>Nombre</th>
       <th scope='col'>Apellido</th>
       
       <th scope='col'>Cargo</th>
       
       <th scope='col'>Acciones</th>
       </tr>

       </thead>
       <tbody>"; 
  
  if ($result_usuarios->num_rows > 0) {
      
      while($row = $result_usuarios->fetch_assoc()) {
       
          $DNI=$row['DNI']; 
          // Estos datos.
          $nombre=$row['Nombre'];
          $apellido=$row['Apellido'];
          $cargo=$row['Permiso'];
          $imagen=$row['DNI'];
          $cargoF=cargo($cargo);
  
          
        // Lleno las celdas de la tabla con los datos de mis usuarios.
          echo "<tr>
          
                   <td scope='row'>$DNI</td>
                   <td scope='row'>$nombre</td>
                   <td scope='row'>$apellido</td>
                   <td scope='row'>$cargoF</td>
                   
                   
                  
                   <td>
                    <a  href='verdetallesuser.php?valor=$DNI'> <button type='button' class='btn btn-success mb-xs-1'> <i class='bi bi-eye'></i></button></a>
                    <a  href='modificaruser.php?valor=$DNI'> <button type='button' class='btn btn-success mb-xs-1'>  <i class='bi bi-pencil-square'></i></button></a> 
                    <a  href='deleteuser.php?valor=$DNI'> <button type='button' class='btn btn-success mb-xs-1'>  <i class='bi bi-trash'></i></button></a> 
  
  
                    </i></a></td>
                 
                    </tr>"; 
          }
      
          echo "</tbody></table></div>";
          echo "</div>
                    </div>
                          </div>
                          </div>";
  
  } else {
      echo "No se encontraron usuarios.";
  }
  
  // Generar enlaces de paginación
  $total_paginas = ceil($total_registros / $registros_por_pagina);
  echo "<div>";
  for ($i=1; $i<=$total_paginas; $i++) {
      echo '
        <div class="container text-center">
   <div class="row justify-content-md-center justify-content-xs-left justify-content-sm-center ">
     <div class=" col-bg-2 col-lg-2 col-xl-2 col-xxl-2 ">
     <div class="d-flex justify-content-evenly">
      
      ';
      echo"

    <button type='button' class='btn btn-success btn-outline-secondary fw-bold mb-3'>   <a class='text-white text-decoration-none btn-outline-secondary p-2 m-2  rounded' href='principal.php?page=$i'>$i </button></a> 
      
      ";
  }
  echo "</div>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
  
  $conn->close();
  
  
    
  }
  


?>


    </div>
    
  
