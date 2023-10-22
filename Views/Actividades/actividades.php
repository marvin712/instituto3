<?php headerProfesor($data); ?>
<?php require_once('./Views/Profesores/nav_profesores.php'); ?>
<?php require_once('./Views/Profesores/profesores_header.php'); ?>
<?php require_once('./Views/Modals/modalActividades.php'); ?>
<!--  -->
<div class="container-fluid container-cards">
    <!-- Tittle -->
    <h1 class="h2 pb-4">Actividades | Instituto Alejandro Córdova</h1>
 <!-- Boton Modal Nuevo -->
 <button class="btn btn-secondary btn-rol text-white mb-5" type="button"  data-bs-toggle="modal" data-bs-target="#modalFormActividad" onclick="openModalActividad();">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg> Nueva Actividad
</button>

    <div class="">
    <table class="table" id="tableActividades">
  <thead>
    <tr>
   
      <th scope="col">Actividad</th>
      <th scope="col">fecha</th>
      <th scope="col">Valor</th>
      <th scope="col">Status</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  
   
  </tbody>
</table>
    </div>
    
<?php footerProfesor($data); ?>