<?php
?>
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
    <main>
        <div class="container d-flex align-items-center justify-content-center vh-auto vw-50 ">
            <div class="card mb-3 p-1">
                <div class="d-flex align-items-center bg-card-blue-darker text-light px-4 gap-1 ">
                    <img src="./assets/img/isftlogo.jpg" alt="Logo del isft 225" class="w-15 h-auto rounded-50 ml-5  p-2" />
                    <h5 class="text-sm-center">Instituto Superior de Formación Técnica 225</h5>
                </div>
                <div class="card-body py-5 px-md-5">
                    <form method="post" action="login.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nombre_usuario">Usuario</label>
                        <input type="text" id="nombre_usuario" class="form-control" name="nombre_usuario"/>
                    </div>
        
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="contrasenia">Contraseña</label>
                        <input type="password" id="contrasenia" class="form-control" name="contrasenia"/>
                        
                    </div>
        
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-start">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input bg-blue-dark" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Recordarme </label>
                        </div>
                        </div>
        
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-start">
                            <a class="link-dark " href="#!">Recuperar contraseña?</a>
                        </div>
                        </div> 
                    </div>
        
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-b btn-block menu-icon mb-4 text-light">Login</button>
                    </form>
        
                </div>
                
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
