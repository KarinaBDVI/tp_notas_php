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
    <?php include "header.php"
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
                <h3 class="card-footer-text mt-2 mb-5 p-2">Materias</h3>
                <div class="m-4">
                    <h2 class="text-dark-subtle title">Ingresar Materia</h2>
                    <h6 class="text-black-50">
                        Dar de alta las Materias para la carrera correspondiente
                    </h6>
                </div>
                <div>
                    <form class="row g-3 m-4" method="post" action="insertar.php">
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="idmateria">ID Materia*:</label>
                            <input class="form-control" type="text" name="idmateria" id="idmateria" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="denominacion">Denominación*:</label>
                            <input class="form-control" type="text" name="denominacion" id="denominacion" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="cod_num">Código Numérico*:</label>
                            <input class="form-control" type="text" name="cod_num" id="cod_num" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="cod_alpha">Código alfabético*:</label>
                            <input class="form-control" type="text" name="cod_alpha" id="cod_alpha" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="tipo_aprobacion">Tipo de Aprobación*:</label>
                            <input class="form-control" type="text" name="tipo_aprobacion" id="tipo_aprobacion" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label class="form-label text-black-50" for="nota_min_aprobacion">Mínimo de aprobación materia*:</label>
                          <select class="form-select form-select mb-3" name="nota_min_aprobacion" id="nota_min_aprobacion" aria-label="nota_min_aprobacion">
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
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="periodo">Período*:</label>
                            <input class="form-control" type="text" name="periodo" id="periodo" required>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="anio">Año*:</label>
                            <input class="form-control" type="text" name="anio" id="anio" required>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="correlatividades">Correlatividades*:</label>
                            <input class="form-control" type="text" name="correlatividades" id="correlatividades" required>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label text-black-50" for="ciclo_lectivo">Ciclo Lectivo*:</label>
                            <input class="form-control" type="text" name="ciclo_lectivo" id="ciclo_lectivo" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label class="form-label text-black-50 text-nowrap" for="estado_materia">Estado de materia*:</label>
                          <select class="form-select form-select mb-3" name="estado_materia" id="estado_materia" aria-label="select_estado_materia">
                              <option selected>Activo</option>
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-8 gap-2 offset-3 mb-5">
                            <div class="d-flex mb-5 gap-2 justify-content-evenly align-content-center">
                                <a class="" href=#><button class='btn btn-primary px-4 menu-icon border-0'>Ver listado de materias</button></a>
                                <input class="btn btn-primary px-4 nav-bar border-0 text-wrap" type="submit" value="Cargar otra materia">
                                <!-- <a href="#heading" class="align-self-center">volver arriba</a>  -->          
                            </div>
                            <div class="d-flex mb-5 gap-2 justify-content-between align-content-center">
                                <a href=#><button class='btn btn-primary px-4 menu-icon border-0'>Volver</button></a>
                                <input class="btn btn-primary px-4 nav-bar border-0 text-wrap" type="submit" value="Guardar">
                                <!-- <a href="#heading" class="align-self-center">volver arriba</a>  -->          
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
 </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
