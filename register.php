<?php
require('./conexion.php');
// Crear la tabla si no existe
include 'header.php';
 $sql = "CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(50),
    apellidos VARCHAR(50),
    cargo VARCHAR(10),
    nombreusuario VARCHAR(20) NOT NULL,
    contrasenia VARCHAR(20) NOT NULL,
    id_rol INT(6) UNSIGNED NOT NULL,
)";  

if ($conn->query($sql) === false) {
    echo "Error al crear la tabla: " . $conn->error;
}

//comprobar password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $cargo = $_POST['cargo'];
    $nombreusuario = $_POST['nombreusuario'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia2 = $_POST['contrasenia2'];
    $id_rol = $_POST['id_rol'];

    if( $contrasenia2==$contrasenia){
        $sql = "INSERT INTO usuario (nombres, apellidos, cargo,  nombreusuario, contrasenia, id_rol) VALUES ('$nombres','$apellidos','$cargo','$nombreusuario','$contrasenia','$id_rol')";
    }
    else{
        echo "Las contraseñas deben coincidir";
    }
  /* Busqueda de usuario */
    /* $sql = "SELECT ida, nombre, nombreUsuario, contrasenia,FROM admins1m WHERE nombreUsuario='$user' AND contrasenia='$pass'"; */
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
    // Cerrar la conexión
$conn->close();
}

?>


<div class="container d-flex align-items-center justify-content-center vh-100 w-50">
  
  <div class="card mb-3">
    <div class="row g-0">
    <h2 class="pt-2 pl-2 col-s-4 pt-2 text-sm-center">Registro</h2>
      <div class="col-lg-4 d-none d-lg-flex col align-items-center justify-content-center align-items-center">
     
      <div class="row g-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 h-auto rounded ml-5" />
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form method="post" action="register.php">
            <!-- Usuario input -->
            <div class="form-outline mb-4">
              <input type="text" id="nombres" class="form-control" name="nombres"/>
              <label class="form-label" for="nombres">Nombres </label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="apellidos" class="form-control" name="apellidos"/>
              <label class="form-label" for="apellidos">Apellidos </label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="cargo" class="form-control" name="cargo"/>
              <label class="form-label" for="cargo">Cargo </label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="nombreusuario" class="form-control" name="nombreusuario"/>
              <label class="form-label" for="nombreusuario">Nombre de usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="text" id="contrasenia" class="form-control" name="contrasenia"/>
              <label class="form-label" for="contrasenia">Contraseña</label>
            </div>

             <!-- Password input -->
             <div class="form-outline mb-4">
              <input type="password" id="contrasenia2" class="form-control" name="contrasenia2"/>
              <label class="form-label" for="contrasenia2">Repetir Contraseña</label>
              <label class="form-label visually-hidden" for="contrasenia2">Las contraseñas deben coincidir</label>
            </div>

             <!-- Password input -->
             <div class="form-outline mb-4">
                <label class="row form-label" for="rol">rol:</label>
                <select class="form-select" aria-label="Default select example" name="rol" id="rol" required>
                    <option selected>Seleccionar rol...</option>
                    <option value="1">administrativo</option>
                    <option value="2">preceptor</option>
                    <option value="3">estudiante</option>
                    <option value="4">profesor</option>
                    <option value="4">developer</option>
                </select>
            </div>


            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
              </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Registro</button>
            <a href="" class="btn btn-outline-success mb-4">Volver</a>
        </form>

        </div>
      </div>
    </div>
  </div>

</div>

