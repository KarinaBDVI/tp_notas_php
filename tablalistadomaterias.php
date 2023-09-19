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
    <?php include "header.php"
    ?>
<main>

<div class="col-9 offset-3 bg-light-subtle pt-5">
            <div class="d-block p-3 m-4 h-100 ">
                <h3 class="card-footer-text mt-2 mb-5 p-2">Materias</h3>
             
    <!-- Contenedor principal -->
    <div class="d-flex flex-nowrap sidebar-height"> 
      <!-- Aside/Wardrobe/Sidebar Menu --> 
      <?php
      include "sidebar.php"; 
        ?>  

        <!-- Fin de sidebar/aside -->
        <!-- Contenedor de ventana de contenido -->
        <div class="container">
        
        <a href="#" class="btn btn-primary custom-button mt-3">Ingresar Materia</a>
        <table class="table table-bordered table-striped mt-3 space-between">
            <thead>

                <tr>
               
                    <th>Carrera</th>
                    <th>Materia</th>
                    <th>Tipo Aprobación</th>
                    <th>Código Numérico</th>
                    <th>Código Alfabético</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Datos ficticios,  a remplazar con los de la base de datos
                $datos = [
                    ["Tec Sup Software", "Progamación", "Aprobado", "123", "PRO", "Activa"],
                    ["Tec Sup Software", "Sist Digitales", "Aprobado", "543", "DIG", "Activa"],
                    ["Tec Sup Software", "Análisis Matématico", "Aprobado", "987", "MAT", "Activa"]
                ];

                // Generar filas de la tabla
                foreach ($datos as $fila) {
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "<td><a href='#' class='btn btn-custom-edit'><i class='fas fa-pencil-alt'></i></a></td>";
                    echo "<td><a href='#' class='btn btn-custom-view'><i class='fas fa-eye'></i></a></td>";
                        ;


                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-oer..."></script>
</body>
</html>