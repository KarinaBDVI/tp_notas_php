<?php
require('./conexion.php');
// Crear la tabla si no existe
include 'header.php';
$sql = "CREATE TABLE IF NOT EXISTS admins1m (
    ida INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    nombreadmin VARCHAR(50) NOT NULL,
    contrasenia VARCHAR(50) NOT NULL
)"; 

if ($conn->query($sql) === false) {
    echo "Error al crear la tabla: " . $conn->error;
}

//comprobar password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $nombreAdmin = $_POST['nombreadmin'];
    $contrasenia = $_POST['userpass'];
    $contrasenia2 = $_POST['userpass2'];

    if( $contrasenia2==$contrasenia){
        $sql = "INSERT INTO admins1m (nombre, nombreadmin, contrasenia) VALUES ('$nombre','$nombreAdmin','$contrasenia')";
    }
    else{
        echo "Las contraseñas deben coincidir";
    }
  /* Busqueda de usuario */
    /* $sql = "SELECT ida, nombre, nombreUsuario, contrasenia,FROM admins1m WHERE nombreUsuario='$user' AND contrasenia='$pass'"; */
    
    if ($conn->query($sql) === TRUE) {
        header('Location: home.php');
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
              <input type="text" id="form2Example1" class="form-control" name="nombre"/>
              <label class="form-label" for="form2Example1">Nombre </label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example1" class="form-control" name="nombreadmin"/>
              <label class="form-label" for="form2Example1">Nombre de usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="text" id="form2Example2" class="form-control" name="userpass"/>
              <label class="form-label" for="form2Example2">Contraseña</label>
            </div>

             <!-- Password input -->
             <div class="form-outline mb-4">
              <input type="password" id="contrasenia2" class="form-control" name="userpass2"/>
              <label class="form-label" for="contrasenia">Repetir Contraseña</label>
              <label class="form-label visually-hidden" for="contrasenia">Las contraseñas deben coincidir</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Registro</button>
            <a href="listadoadmins.php" class="btn btn-outline-success mb-4">Volver</a>
        </form>

        </div>
      </div>
    </div>
  </div>

</div>

