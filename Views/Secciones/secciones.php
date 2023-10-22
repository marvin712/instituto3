<?php headerAdmin($data);
  getModal('modalSecciones',$data);
?>
<?php require_once('./Views/Template/nav_admin.php');?>
<?php require_once('./Views/Template/dashboard_header.php');?>
<?php require('./Views/Modals/modalSecciones.php');?>
<div class="container container-rol">
  <div>
    <h3>Secciones | Instituto Inmac</h3>
    <!-- Boton Modal Nuevo -->
<button class="btn btn-secondary btn-rol text-white mb-5" type="button"  data-bs-toggle="modal" data-bs-target="#modalFormSeccion" onclick="openModalSeccion();">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg> Nueva Sección
</button>
</div>
<!-- Tabla Roles -->
  <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableSecciones">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Seccion</th>
                        <th>Status</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                   <tbody>
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

<?php footerAdmin($data);?>
