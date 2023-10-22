<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_tag'];?></title>
    <link rel="stylesheet" href="<?= media(); ?>/css/style.css">
  <link rel="shortcut icon" href="<?= media(); ?>/images/logo.ico.png" type="image/x-icon">
</head>
<div class="pace pace-active"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="99%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
  <!--HEADER-->
  <header class="header">
    <div class="header__container">
      <img src="http://localhost/inmac/Assets/images/logo.png" class="header__img">
      <div class="header__search">
        <input type="search" placeholder="Buscar..." class="header__input">
        <i class="bx bx-search"></i>
      </div>
      <h1>dd</h1>
      <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
    </div>
  </header>
     <!-- Main -->
     <main class="main-control">