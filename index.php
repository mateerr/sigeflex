<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/styles/style.css"> <!-- Llamo a mi hoja de estilos-->

    <link rel="stylesheet" href="./assets/scss/custom.css">
    

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
      <!-- Inicializo Cuerpo de Pagina-->   
    
        <div class="container container-login flex-wrap d-flex justify-content-center"> 
          <div class="form">
             <div class="row">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                <div class="col-6  col-lg-6 col-xl-6 d-flex flex-wrap "> 
                  <!-- Llamo las diversas clases de Boostrap-->
                  <h1 class=" login-text"> Inicio </h1>
                
                  <figure class="logo-sigeflex">
                    <img src="./assets/imgs/logo-sigeflex.png" alt="Logo del Software " height="80px" width="100px">
                   </figure>

                 </div> 
                <!-- Abro Formulario e inicializo Inputs y Submit -->
                <form action="./structure/metadatos.php" method="post"> <!-- Hoja donde se recibiran los datos, y se utilizaran -->
                 
                  <!-- Input del Tipo Texto-->  
                 <div class="class-6 login-input">

               
                  <div class="input-group flex-wrap: wrap form-input">

                
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" required >   

  
                  </div>
                
                <!-- Input del Tipo Contraseña-->   
                <div class="input-group flex-wrap: wrap form-input">

               
                  
                  <input type="password" name="password" class="form-control" placeholder="Contraseña" required >

                </div>

              
                <!-- Input del Tipo Boton Submit (Ingresar Datos)-->     
                <input type="submit"class="btn btn-secondary justify-content-center " value="Ingresar">
              
              </form><!-- Cierro Form-->
        </div>
          </div>
            </div>    
              </div>
                </div>
                  </div>
            <!-- Cierro La "Card que conforma a mi Login"-->

        
            <!-- Abro Pie de Pagina-->
    
           <footer class="container footer-container justify-content-center"> 
            <!-- Llamo clases de Boostrap, estas lo van a considerar como un contenedor, y que alinee su 
              contenido al centro, la clase "footer-container" es una clase creada por mí.
            -->
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                  <!-- Creo Columnasm y digo que ocupen 12 espacios dentro de la pagina, 
                  en cambio de que el tamaño de la pagina disminuya, siga ocupando 12.
                  -->
                  <p > Todos los derechos reservados para la EEST N° 1 “Gral José de San
                  Martín” <p> 
                </div>
                </div>
          </footer>
    
                <div class="container footer-container justify-content-center"> 
                  <!-- Creo otro div, similar al anterior, con las propiedades de un footer.
                  -->
                    <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 flex-wrap d-flex justify-content-center">
                 <figure class="logo-eestn1 flex-wrap d-flex">
                  <img src="./assets/imgs/logo-escuela.png" alt="Logo EEST N1 De GB" height="50px" width="55px">
                  </figure>
                <!-- En esta parte, llamo a mi image, y para centrarla, que ocupe la casilla central.-->

                </div>
              </div>
            
</body>
</html>