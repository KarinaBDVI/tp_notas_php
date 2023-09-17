<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home-ISFT 225</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <?php 
    require('./conexion.php');
    include "headernosearch.php";
    $sql = "CREATE TABLE IF NOT EXISTS carrera (
         id_carrera INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        cod_carrera varchar(20) NOT NULL,
        nro_resolucion varchar(20) NOT NULL,
        nro_plan varchar(20) NOT NULL,
        denominacion VARCHAR(100) NOT NULL,
        titulo_otorgado VARCHAR(50) NOT NULL,
        duracion VARCHAR(10) NOT NULL,
        val_min_aprobacion INT(2),
        val_max_aprobacion INT(2),
        estado_carrera VARCHAR(10) NOT NULL
    )";
    if ($conn->query($sql) === false ) {
        echo "Error al crear la tabla: " . $conn->error;
    }; 
    
    // Obtener los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cod_carrera_n = $_POST['cod_carrera'];
        $nro_resolucion_n = $_POST['nro_resolucion'];
        $nro_plan_n = $_POST['nro_plan'];
        $denominacion_n = $_POST['denominacion'];
        $titulo_otorgado_n = $_POST['titulo_otorgado'];
        $duracion_n = $_POST['duracion'];
        $estado_carrera_n = $_POST['estado_carrera'];
        //Datos INT
        $val_min_aprobacion = $_POST['val_min_aprobacion'];
        $val_max_aprobacion = $_POST['val_max_aprobacion'];

        //Evitar inyeccion SQL
        $cod_carrera = htmlspecialchars($cod_carrera_n, ENT_QUOTES, 'UTF-8');
        $nro_resolucion = htmlspecialchars($nro_resolucion_n, ENT_QUOTES, 'UTF-8');
        $nro_plan = htmlspecialchars($nro_plan_n, ENT_QUOTES, 'UTF-8');
        $denominacion = htmlspecialchars($denominacion_n, ENT_QUOTES, 'UTF-8');
        $titulo_otorgado = htmlspecialchars($titulo_otorgado_n, ENT_QUOTES, 'UTF-8');
        $duracion = htmlspecialchars($duracion_n, ENT_QUOTES, 'UTF-8');
        $estado_carrera = htmlspecialchars($estado_carrera_n, ENT_QUOTES, 'UTF-8');
        //Sentencia SQL para insertar los datos
    
        $sql = "INSERT INTO carrera (cod_carrera, nro_resolucion, nro_plan, denominacion, titulo_otorgado, duracion, val_min_aprobacion, val_max_aprobacion, estado_carrera) VALUES (?, ?, ?, ?, ? ,? ,?, ? ,? )";
        $stmt->bind_param("sssssssss", $cod_carrera, $nro_resolucion, $nro_plan, $denominacion, $titulo_otorgado, $duracion, $val_min_aprobacion, $val_max_aprobacion, $estado_carrera);

        if ($stmt->execute()){
            if ($stmt->affected_rows > 0) {
                header("Location:ingresarcarrera.php");
                exit();
            }else{
                echo "Error al insertar el registro";
            }
        } else{
                echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    }

$conn->close();
?>

<main>
    <!-- Contenedor principal -->
    <div class="d-flex flex-nowrap sidebar-height"> 
      <!-- Aside/Wardrobe/Sidebar Menu --> 
      <?php
      include "sidebar.php"; 
        ?>  
      <!-- Fin de sidebar/aside -->
      <!-- Contenedor de ventana de contenido -->
      <div class="col-9 offset-3 bg-light-subtle pt-5">
            <div class="d-block p-3 m-4 h-100 ">
                <h3 class="card-footer-text mt-2 mb-5 p-2">Carreras</h3>
                <div class="m-4">
                    <h2 class="text-dark-subtle title">Ingresar Nueva Carrera</h2>
                    <!-- <h6 class="text-black-50">
                        *Dar de alta las Materias para la carrera correspondiente
                    </h6> -->
                </div>
                <div>
                    <form class="row g-3 m-4" method="post" action="ingresarcarrera.php">

            <!-- Ver: si hacer autoincremental; si se hace, descomentar -->

                      <!-- <div class="col-md-6 position-relative">
                        <label class="form-label text-black-50" for="id_carrera">Id de Carrera*:</label>
                        <input class="form-control" type="text" name="id_carrera" id="id_carrera" required>
                      </div> -->
                  <!-- ya está denominacion de carrera, iria igual nombre? -->
                         <!-- <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="nombre_carrera">Nombre de Carrera*:</label>
                            <input class="form-control" type="text" name="nombre_carrera" id="nombre_carrera" required>
                        </div>  -->
                        
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="cod_carrera">Código de  Carrera*:</label>
                            <input class="form-control" type="text" name="cod_carrera" id="cod_carrera" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="nro_resolucion">Número de Resolución*:</label>
                            <input class="form-control" type="text" name="nro_resolucion" id="nro_resolucion" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="nro_plan">Numero de Plan*:</label>
                            <input class="form-control" type="text" name="nro_plan" id="nro_plan" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="denominacion">Denominacion*:</label>
                            <input class="form-control" type="text" name="denominacion" id="denominacion" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="titulo_otorgado">Título que entrega*:</label>
                            <input class="form-control" type="text" name="titulo_otorgado" id="titulo_otorgado" required>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50 text-nowrap" for="estado_carrera">Estado de carrera*:</label>
                 
                            <select class="form-select form-select mb-3" name="estado_carrera" id="estado_carrera" aria-label="select estado_carrera">
                                <option selected>Activo</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              </select>
                              
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="duracion">Duración*:</label>
                            <input class="form-control" type="text" name="duracion" id="duracion" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label class="form-label text-black-50 text-nowrap" for="val_min_aprobacion">Valor mínimo de aprobación*:</label>
                          <select class="form-select form-select mb-3" name="val_min_aprobacion" id="val_min_aprobacion" aria-label="select_val_min_aprobacion">
                            <option selected>4</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label class="form-label text-black-50 text-nowrap" for="val_max_aprobacion">Valor máximo de aprobación*:</label>
                          <select class="form-select form-select mb-3" name="val_max_aprobacion" id="val_max_aprobacion" aria-label="select_val_max_aprobacion">
                            <option selected>10</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-6 offset-1 mb-5">
                            <div class="d-block mb-5 gap-2 align-content-start">
                                <h6 class="text-black-50">*Dar de alta las Materias para la carrera correspondiente.</h6>
                                <a class="" href=#><button class='btn btn-primary btn-lg px-4 menu-icon border-0'>Dar de alta materias</button></a>
                                
                            </div>
                        </div>
                        <div class="col-md-6 offset-2 mb-5">
                            <div class="d-flex mb-5 gap-2 justify-content-between align-content-center">
                                <a href=#><button class='btn btn-primary menu-icon border-0 px-4'>Volver</button></a>
                                <input class="btn btn-primary px-4 nav-bar border-0 text-wrap" type="submit" value="Guardar">
                                        
                            </div>
                        </div>
                    </form>
                    
                </div>
              </div>
        </div>
        <!-- Fin de contenido -->
      </div>
      <!-- Fin de contenedor principal -->
 </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
