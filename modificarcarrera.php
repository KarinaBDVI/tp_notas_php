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
?>
<?php 
    // Obtener el ID del registro a editar
$id_carrera = $_GET['id_carrera'];

    if ($id_carrera === null || !is_numeric($id_carrera)) {
        header("Location: tablalistadocarreras.php");
        // Exit para detener la ejecución
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores de los campos del formulario
        $new_cod_carrera = $_POST['cod_carrera'];
        $new_nro_resolucion = $_POST['nro_resolucion'];
        $new_nro_plan = $_POST['nro_plan'];
        $new_denominacion = $_POST['denominacion'];
        $new_titulo_otorgado = $_POST['titulo_otorgado'];
        $new_estado_carrera = $_POST['estado_carrera'];
        $new_duracion = $_POST['duracion'];
        $new_val_min_aprobacion = $_POST['val_min_aprobacion'];
        $new_val_max_aprobacion = $_POST['val_max_aprobacion'];
    
        // Consulta SQL con parámetros
        $sql = "UPDATE carrera SET cod_carrera=?, 
                nro_resolucion=?, 
                nro_plan=?, 
                denominacion=?, 
                titulo_otorgado=?, 
                estado_carrera=?, 
                duracion=?, 
                val_min_aprobacion=?, 
                val_max_aprobacion=? 
                WHERE id_carrera=?";
    
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
    
        // Vincular los parámetros
        $stmt->bind_param("sssssssssi", $new_cod_carrera, 
                                        $new_nro_resolucion, 
                                        $new_nro_plan, 
                                        $new_denominacion, 
                                        $new_titulo_otorgado, 
                                        $new_estado_carrera, 
                                        $new_duracion, 
                                        $new_val_min_aprobacion, 
                                        $new_val_max_aprobacion, 
                                        $id_carrera);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                header("Location: tablalistadocarreras.php");
                exit();
            } else {
                echo "No se realizó ninguna actualización.";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
    
        // Cerrar la consulta
        $stmt->close();
    }
$conn->close();

// Obtener los datos del registro actual
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$sql = "SELECT id_carrera, cod_carrera, nro_resolucion, nro_plan, denominacion, titulo_otorgado, estado_carrera, duracion, val_min_aprobacion, val_max_aprobacion 
        FROM carrera 
        WHERE id_carrera=$id_carrera";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// Cerrar la conexión
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
                    <h2 class="text-dark-subtle title">Editar Carrera</h2>
                    <!-- <h6 class="text-black-50">
                        *Dar de alta las Materias para la carrera correspondiente
                    </h6> -->
                </div>
                <div>
                    <form class="row g-3 m-4" action="modificarcarrera.php?id_carrera=<?=$id_carrera?>" method="POST">
                        <!-- 
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="id_carrera">Id de Carrera*:</label>
                            <input class="form-control" type="hidden" name="id_carrera" id="id_carrera" required>
                      </div>  -->

                        <div class="col-md-6 position-relative">
                            <input class="form-control" type="hidden" name="id_carrera" value="<?= $row['id_carrera'] ?>">
                            <label class="form-label text-black-50" for="cod_carrera">Código de  Carrera*:</label>
                            <input class="form-control" type="text" name="cod_carrera" id="cod_carrera" value="<?= $row['cod_carrera'] ?>">
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="nro_resolucion">Número de Resolución*:</label>
                            <input class="form-control" type="text" name="nro_resolucion" id="nro_resolucion" value="<?= $row['nro_resolucion'] ?>">
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="nro_plan">Numero de Plan*:</label>
                            <input class="form-control" type="text" name="nro_plan" id="nro_plan" value="<?= $row['nro_plan'] ?>">
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="denominacion">Denominacion*:</label>
                            <input class="form-control" type="text" name="denominacion" id="denominacion" value="<?= $row['denominacion'] ?>">
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="titulo_otorgado">Título que entrega*:</label>
                            <input class="form-control" type="text" name="titulo_otorgado" id="titulo_otorgado" value="<?= $row['titulo_otorgado'] ?>">
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50 text-nowrap" for="estado_carrera">Estado de carrera*:</label>
                 
                            <select class="form-select form-select mb-3" name="estado_carrera" id="estado_carrera" aria-label="select estado_carrera" value="<?= $row['estado_carrera'] ?>">
                                <!-- <option selected>Activo</option> -->
                                <option value="1" <?php if ($row['estado_carrera'] == '1') echo 'selected'; ?>>Activo</option>
                                <option value="0" <?php if ($row['estado_carrera'] == '0') echo 'selected'; ?>>Inactivo</option>
                              </select>
                              
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="duracion">Duración*:</label>
                            <input class="form-control" type="text" name="duracion" id="duracion" value="<?= $row['duracion'] ?>">
                        </div>
                        
                        <div class="col-md-4 position-relative">
                          <label class="form-label text-black-50 text-nowrap" for="val_min_aprobacion">Valor mínimo de aprobación*:</label>
                          <select class="form-select form-select mb-3" name="val_min_aprobacion" id="val_min_aprobacion" aria-label="select_val_min_aprobacion" value="<?= $row['select_val_min_aprobacion'] ?>">
                            
                            <option value="1" <?php if ($row['val_min_aprobacion'] == '1') echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($row['val_min_aprobacion'] == '2') echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($row['val_min_aprobacion'] == '3') echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($row['val_min_aprobacion'] == '4') echo 'selected'; ?>>4</option>
                            <option value="5" <?php if ($row['val_min_aprobacion'] == '5') echo 'selected'; ?>>5</option>
                            <option value="6" <?php if ($row['val_min_aprobacion'] == '6') echo 'selected'; ?>>6</option>
                            <option value="7" <?php if ($row['val_min_aprobacion'] == '7') echo 'selected'; ?>>7</option>
                            <option value="8" <?php if ($row['val_min_aprobacion'] == '8') echo 'selected'; ?>>8</option>
                            <option value="9" <?php if ($row['val_min_aprobacion'] == '9') echo 'selected'; ?>>9</option>
                            <option value="10" <?php if ($row['val_min_aprobacion'] == '10') echo 'selected'; ?>>10</option>
                            </select>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label class="form-label text-black-50 text-nowrap" for="val_max_aprobacion">Valor máximo de aprobación*:</label>
                          <select class="form-select form-select mb-3" name="val_max_aprobacion" id="val_max_aprobacion" aria-label="select_val_max_aprobacion" value="<?= $row['select_val_max_aprobacion'] ?>">

                            <option value="1" <?php if ($row['val_max_aprobacion'] == '2') echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($row['val_max_aprobacion'] == '3') echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($row['val_max_aprobacion'] == '4') echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($row['val_max_aprobacion'] == '5') echo 'selected'; ?>>4</option>
                            <option value="5" <?php if ($row['val_max_aprobacion'] == '6') echo 'selected'; ?>>5</option>
                            <option value="6" <?php if ($row['val_max_aprobacion'] == '7') echo 'selected'; ?>>6</option>
                            <option value="7" <?php if ($row['val_max_aprobacion'] == '8') echo 'selected'; ?>>7</option>
                            <option value="8" <?php if ($row['val_max_aprobacion'] == '9') echo 'selected'; ?>>8</option>
                            <option value="9" <?php if ($row['val_max_aprobacion'] == '10') echo 'selected'; ?>>9</option>
                            <option value="10" <?php if ($row['val_max_aprobacion'] == '10') echo 'selected'; ?>>10</option>
                            </select>
                        </div>
                        <div class="col-md-6 offset-1 mb-5">
                            <div class="d-block mb-5 gap-2 align-content-start">
                                <!-- <h6 class="text-black-50">*Dar de alta las Materias para la carrera correspondiente.</h6> -->
                                <!-- <a class="" href=#><button class='btn btn-primary btn-lg px-4 menu-icon border-0'>Dar de alta materias</button></a> -->
                                
                            </div>
                        </div>
                        <div class="col-md-6 offset-2 mb-5">
                            <div class="d-flex mb-5 gap-2 justify-content-between align-content-center">
                                <a href='tablalistadocarreras.php'><button class='btn btn-primary menu-icon border-0 px-4'>Volver</button></a>
                                <input class="btn btn-primary px-4 nav-bar border-0 text-wrap" type="submit" value="Actualizar">
                                        
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
