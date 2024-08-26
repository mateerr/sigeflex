<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pagina Principal</title>
        <link rel="stylesheet" href="../assets/styles/menu/style.css">
        <link rel="stylesheet" href="../assets/styles/menu/style2.css">
        
        <link rel="stylesheet" href="../assets/scss/custom.css">
        
      
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

    
    
    </head>
    <body>
        <?php 
        
        

       ?>
        <nav class="menu__wrapper">
            <div class="logo__wrapper">
            <a
                    href="#"
                    title="Logo"
                >
                    <img
                        class="logo"
                        src="../assets/imgs/logo-sigeflex.png"
                        title="Logo"
                        alt="Logo"
                    >
                </a>
        

                
                <a href="principal.php" class="page__title">

                <!-- Abro lo que sera el titulo principal del menu, en este 
                caso, el nombre del usuario, abro un < ?php y solicito los datos
                de metadatos.php.
                -->

                EEST N° 1 “General De San Martín”
                
                    <?php
                    include_once('Db.php');
                    $nombre=$_SESSION['nom'];
                    $apellido=$_SESSION['ap'];
                    $dni = $_SESSION['dni'];
                    $imagen =$_SESSION['dni'];
                    $cargo = $_SESSION['cargo'];
        
                     $cargoF =  cargo($cargo);
                   
// Cargo los datos del usuario, en este caso, su nombre y apellido. Variaran en cada 
// Usuario que tengamos.

     

                    ?>
                </a>
            </div>
           
                    <!-- En esta seccion, logro que la imagen del usuario se vincule con su dni, 
                    logrando de está manera que al compatir su dni, y la foto en la base de datos,
                    su foto personal aparezca en la pagina.
                    -->

                <img id="avatar-navbar" class="avatar-profile" src="../assets/imgs/<?php echo $imagen;?>.jpg"  alt="Perfil">
            </div>
        </nav>

        <!-- Mediante un boton, se abrira un menu, el en el cual podemos ver nuestra foto, datos
            e ingresar a otras paginas, o funciones que se agregarán en el futuro.
        -->
        <div class="navigation__menu none"> <!-- Clase general del menú despleglable -->
        
          <div class="avatar-info">  
            <div class="avatar-wrapper">
                <!-- Espacio que rodeara el avatar del usuario -->
                <img class="avatar-profile" src="../assets/imgs/<?php echo $imagen;?>.jpg"> 
                <!-- Foto del  Usuario -->
                <div class="avatar-name-wrapper"> <!-- Espacio que rodeara a al nombre del usuario -->
                    <div class="avatar-name-alias"> <!-- Nombre que aparecerá debajo del principal -->
                    <?php
                    echo $nombre;
                    ?>

                    </div>
                    <div class="avatar-name">
                      <?php
                      
                    echo $nombre." " .$apellido;

                      ?>
                  
                
                </div>
                </div>

                <!-- Mediante esta seccion, y las etiquetas <svg> y <path> se llama a un icono en forma de X -->
                <div class="close-button">
                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-x"> <path d="M3.72 3.72a.75.75 0 0 1 1.06 0L8 6.94l3.22-3.22a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L9.06 8l3.22 3.22a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215L8 9.06l-3.22 3.22a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042L6.94 8 3.72 4.78a.75.75 0 0 1 0-1.06Z"></path>
                    </svg>
                </div>
            </div>
            <ul class="navigation__menu__items">

            <!--  Aquí, mediante esos caracteres, logro mostrar el emoji
                    👨‍💻, y a su lado el texto que más tarde será modificado
                    dependiendo el rango del usuario.
            -->
                <li>
                &#128104;&#8205;&#128187; <?php  echo $cargoF; ?> <!-- 👈 Rango del usuario.  -->
                </li>

                <!-- Crea una linea no visible para separar. Esta misma es dispensable. -->
                <li class="separator">
                    <hr>
                </li>
                <li>
                     <!-- Las etiquetas <i> nos ayudan mediente bootstrap
                        a llamar iconos.
                      -->
                      <a href="principal.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16"> <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg>
                    Home
                    </a>
                </li>

                <!-- Cierro enlace a "home" -->
                <li>
                     <!-- Mediante esta seccion, y las etiquetas <svg> y <path> se llama a un icono en forma de 👤 -->
                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-person"><path d="M10.561 8.073a6.005 6.005 0 0 1 3.432 5.142.75.75 0 1 1-1.498.07 4.5 4.5 0 0 0-8.99 0 .75.75 0 0 1-1.498-.07 6.004 6.004 0 0 1 3.431-5.142 3.999 3.999 0 1 1 5.123 0ZM10.5 5a2.5 2.5 0 1 0-5 0 2.5 2.5 0 0 0 5 0Z"></path>
                    </svg>
                    Usuarios
                </li>
                <li class="separator"> <hr> </li>
              
                <li>
                     <!-- Enlace "Nuevo" -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg>
                <a href="crearusuario.php">
                    Nuevo
                </a>
                </li>
    
               <!-- Abro mi primer menú colapsable, este consta de varias
               clases de bootstrap. Este contiene varios "<li>" que representan
                cada item de mi menu colapsable o "dropdown" -->

    <li class=" nav-item dropdown" data-bs-theme="dark">
          <a class=" nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"><path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/></svg>
 <t class="nav-items-collapse">  Reportes </t>
          </a>
          <ul class="mt-2 dropdown-menu bg-success text-color-white">
            <li><a class="dropdown-item " href="#">Reporte 1 </a></li>
            <li><a class="dropdown-item" href="#">Reporte 2</a></li>
            
            <li><a class="dropdown-item" href="#">Reporte 3</a></li>
          </ul>
    </li>
     <!-- Abro mi segundo menú colapsable, este tiene una
     estructura igual al de reportes, pero con los otros items
     que se solicitan -->
    <li class=" nav-item dropdown" data-bs-theme="dark">
          
        <a class="dropdown-custom nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       
       <!-- Icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/> <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/><path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
</svg> 

<t class="nav-items-collapse">  Listados </t>
        </a>
          <ul class="mt-2 dropdown-menu bg-success text-color-white">
           
            <li><a class="dropdown-item " href="#">Listado 1 </a></li>
           
            <li><a class="dropdown-item" href="#">Listado 2</a></li>
            
            <li><a class="dropdown-item" href="#">Listado 3</a></li>
        </ul>
    </li>

    <li>
         <!-- Item "Creditos" -->       
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-braces" viewBox="0 0 16 16">
  <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6M13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6"/>
</svg>
                Creditos
    </li>
    <!-- Abro "<li>" correspondiente a cada item de mi menu. -->
        <li>
<!-- Llamo un Icono otorgado por Bootstrap -->  
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>
<!-- Convierto mi texto en "link", al cerrar sesión, me redirige al login -->
 
    <a href="../index.php">
       Cerrar Sesión
     <?php
     
      
      ?>
  </a>
</button>
  </li>         


                
            </ul>
        </div>

        <!-- Script que permite el menú desplegable -->
        <script src="../assets/styles/menu/script.js"></script>
    <?php   
    
    
    ?>
    </body>
</html>

