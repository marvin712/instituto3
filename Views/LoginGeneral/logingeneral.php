<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['page_tag']; ?></title>
  <link rel="stylesheet" href="<?= media(); ?>/css/style.css">
  <link rel="shortcut icon" href="<?= media(); ?>/images/logo.ico.png" type="image/x-icon">
</head>
<body>
<body>
<header class="">
      
    </header>
 
<!-- Login -->
<main class="main-login-general">
    <div class="container main-login-general">
    <section class="section-login row">
        <article class="col-12 col-md-4 login-general-item d-flex justify-content-center align-items-center">
            <div class="">
                <div class="mb-5">
                    <img src="<?= media();?>/images/libros.png" alt="" width="100"> 
                </div>
                <div>
                    <a href="<?= base_url();?>/login" class="btn-login-general">Estudiante</a>
                </div>
            </div>
        </article>
        <article class="col-12 col-md-4 login-general-item  d-flex justify-content-center align-items-center">
           <div >
           <div  class="mb-5">
            <img src="<?= media();?>/images/profesor.png" alt="" width="100"> 
            </div>
            <div>
            <a href="<?= base_url();?>/loginProfesores" class="btn-login-general">Profesor</a>
            </div>
           </div>
        </article>
        <article class="col-12 col-md-4 login-general-item d-flex justify-content-center align-items-center">
        <div>
        <div  class="mb-5">
            <img src="<?= media();?>/images/empresario.png" alt="" width="100"> 
            </div>
            <div>
            <a href="<?= base_url();?>/loginAdministradores" class="btn-login-general">Administrador</a>
            </div>
        </div>
        </article>
    </section>
    </div>
</main>
</div>
</body>
</html>