<?php
function verdetallesuser($nombre, $apellido, $cargo, $edad, $usuario, $dni) {
    $fecha = date("d/m/y");
    echo "
    <div class='card text-center'>
        <div class='card-header'>
            Detalles
        </div>
        <div class='card-body'>
            <h5 class='card-title'>Ver más sobre: $nombre $apellido</h5>
            <div class='row'>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>DNI</span>
                            <input type='text' value='$dni' class='form-control' disabled>
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Nombre</span>
                            <input type='text' value='$nombre' class='form-control' disabled>
                            <input type='text' value='$apellido' class='form-control' disabled>
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Edad</span>
                            <input type='text' value='$edad' class='form-control' disabled>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Usuario</span>
                            <input type='text' value='$usuario' class='form-control' disabled>
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Cargo</span>
                            <input type='text' value='$cargo' class='form-control' disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='card-footer text-body-secondary'>
            $fecha
        </div>
    </div>";
}

function modificaruser($nombre, $apellido, $cargo, $edad, $usuario, $dni){
    $fecha = date("d/m/Y"); // Obtengo la fecha dia/mes/año
    echo "
    <div class='card text-center'>
        <div class='card-header'>
            Detalles
        </div>
        <div class='card-body'>
        
            <h5 class='card-title'>Modificar detalles de: " 
            // Esta cadena permite utilizar caracteres especiales.
            . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . "</h5>
            <div class='row'>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                    <form action='metadatosupd.php' method='post'>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>DNI</span>
                            <input type='text' name='dni' value='" . htmlspecialchars($dni) . "' class='form-control' required>
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Nombre</span>
                            <input type='text' name='nombre' value='" . htmlspecialchars($nombre) . "' class='form-control' required>
                            <input type='text' name='apellido' value='" . htmlspecialchars($apellido) . "' class='form-control' required>
                        </div>
                        <br>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Edad</span>
                            <input type='number' name='edad' value='" . htmlspecialchars($edad) . "' class='form-control' required>
                        </div>
                    </div>
                </div>
                <div class='col-6 col-sm-6 mb-6 mb-sm-0 col-xl-6 col-xxl-6'>
                    <div class='card-body'>
                        <div class='input-group'>
                            <span class='input-group-text' id='basic-addon2'>Usuario</span>
                            <input type='text' name='usuario' value='" . htmlspecialchars($usuario) . "' class='form-control' required>
                        </div>
                        <br>
                        <select class='form-select' aria-label='Select Cargo' name='cargo' required>
                            <option value='' disabled " . ($cargo == '' ? 'selected' : '') . ">Selecciona el cargo</option>
                            <option value='1' " . ($cargo == '1' ? 'selected' : '') . ">Super Usuario</option> 
                            ". //Según el cargo del usuario, marca como seleccionado la opcion que corresponda.
                             ."
                            <option value='2' " . ($cargo == '2' ? 'selected' : '') . ">Administrador</option>
                            <option value='3' " . ($cargo == '3' ? 'selected' : '') . ">Invitado</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <input type='submit' class='btn btn-success justify-content-center' name='modificar' value='Modificar'>
        </div>
        </form>
        <div class='card-footer text-body-secondary'>
            $fecha
        </div>
    </div>";
}


?>