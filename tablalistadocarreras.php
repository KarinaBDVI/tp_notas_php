<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home-ISFT 225</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/styletablas.css">
</head>
<body>
<?php
require('./conexion.php');


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

/*     $cod_carrera = $_POST['cod_carrera'];
    $nro_resolucion = $_POST['nro_resolucion'];
    $nro_plan = $_POST['nro_plan'];
    $denominacion = $_POST['denominacion'];
    $titulo_otorgado = $_POST['titulo_otorgado'];
    $duracion = $_POST['duracion'];
    $estado_carrera = $_POST['estado_carrera'];
    //Datos INT
    $val_min_aprobacion = $_POST['val_min_aprobacion'];
    $val_max_aprobacion = $_POST['val_max_aprobacion'];
 */
    // Consultar los datos
$sql = "SELECT id_carrera, cod_carrera, nro_resolucion, nro_plan, denominacion, titulo_otorgado, duracion, val_min_aprobacion, val_max_aprobacion, estado_carrera FROM carrera";
$result = $conn->query($sql);

include 'header.php';
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
                    <h2 class="text-dark-subtle title">Carreras Listado</h2>
                    <!-- <h6 class="text-black-50">
                        *Dar de alta las Materias para la carrera correspondiente
                    </h6> -->
                </div>
                <div class="container table-responsive">
                    
                    <a href="#" class="btn btn-primary custom-button mt-3">Carreras</a>
                    <table class="table table-bordered table-striped mt-3 space-between">
                        <thead>

                            <tr>
                                <th class="hidden">ID carrera</th>
                                <th>Código de carrera</th>
                                <th>Nro de resolución</th>
                                <th>Nro de plan</th>
                                <th>Denominación</th>
                                <th>Título otorgado</th>
                                <th>Duración</th>
                                <th>Mínimo de aprobación</th>
                                <th>Máximo de aprobación</th>
                                <th>Estado de carrera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                            $datos =array();
                            while ($row = $result->fetch_assoc()) {
                                $datos[] = $row;
                                }
                            // Generar filas de la tabla
                            foreach ($datos as $fila) {
                                echo "<tr>";
                                echo "<td class='hidden'>" . $fila['id_carrera'] . "</td>";
                                echo "<td>" . $fila['cod_carrera'] . "</td>";
                                echo "<td>" . $fila['nro_resolucion'] . "</td>";
                                echo "<td>" . $fila['nro_plan'] . "</td>";
                                echo "<td>" . $fila['denominacion'] . "</td>";
                                echo "<td>" . $fila['titulo_otorgado'] . "</td>";
                                echo "<td>" . $fila['duracion'] . "</td>";
                                echo "<td>" . $fila['val_min_aprobacion'] . "</td>";
                                echo "<td>" . $fila['val_max_aprobacion'] . "</td>";
                                echo "<td>" . $fila['estado_carrera'] . "</td>";
                                echo "<td><a href='modificarcarrera.php?id_carrera=".$fila["id_carrera"]."' class='btn btn-custom-edit'><i class='fas fa-pencil-alt'></i></a></td>";
                                echo "<td><a href='tablalistadocarreras.php' class='btn btn-custom-view'><i class='fas fa-eye'></i></a></td>";
                                echo "</tr>";
                                        
                                    }
                                }
                                else{
                                    echo "<h4>No hay datos para mostrar</h4>";
                                }
                                    $conn->close()
                            ?>
                        </tbody>
                    </table>
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
