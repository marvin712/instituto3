 <!-- Modal -->
 <div class="modal fade" id="modalFormEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister" id="modalEstudiantes">
        <h1 class="modal-title fs-3" id="titleModal">Nuevo Estudiante</h1>
        <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <form name="formEstudiante" id="formEstudiante" class="form-horizontal">
            <input type="hidden" id="idEstudiante" name="idEstudiante" value="">
            <p class="text-primary">Todos los campos son obligatorios</p>
          
            <div class="row">
            <div class="form-group mb-5 col-md-6">
            <label for="txtNombre" class="mb-4">Nombre</label>
            <input type="text" placeholder="nombre" class="form-control shadow" id="txtNombre" name="txtNombre">
          </div>
          <div class="form-group mb-5 col-md-6">
        <label for="txtApellido" class="mb-4">Apellido</label>
        <input type="text"  class="form-control shadow" placeholder="Apellido" id="txtApellido" name="txtApellido">
      </div>
            </div>

      <div class="row">
      <div class="form-group col-md-6 mb-5">
        <label for="txtDireccion" class="mb-4">Direccion</label>
        <input type="text" id="txtDireccion" class="form-control shadow" placeholder="direccion" name="txtDireccion">
      </div>

      <div class="form-group col-md-6 mb-5">
        <label for="txtEmail" class="mb-4">E-mail</label>
        <input type="email" id="txtEmail" class="form-control shadow" placeholder="email" name="txtEmail">
      </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6 mb-5">
            <label for="listCarreraid" class="mb-4">Carrera</label>
            
            <select name="listCarreraid" id="listCarreraid" class="form-select shadow bg-white p-3">
            
            </select>
          </div>
          
          <div class="form-group col-md-6 mb-5">
           <div class="row">
           <div class="form-group col-md-6">
            <label for="listGradoid" class="mb-4">Grado</label>
            <select name="listGradoid" id="listGradoid" class="form-select shadow bg-white p-3"></select>
            </div>

            <div class="form-group col-md-5">
            <label for="listSeccionid" class="mb-4">Sección</label>
            <select name="listSeccionid" id="listSeccionid" class="form-select shadow bg-white p-3"></select>
            </div>
           </div>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6 mb-5">
            <label for="listRolid" class="mb-4">Tipo usuario</label>
            <select name="listRolid" id="listRolid" class="form-select shadow bg-white p-3"></select>
          </div>
          <div class="form-group col-md-6 mb-5">
            <label for="estado" class="d-block mb-4">Status </label>
            <div class="input-group">
            <select name="listStatus" id="listStatus" class="p-3 bg-white text-black border-0 shadow form-select">
              <option value="1">Activo</option>
              <option value="2">Inactivo</option>
            </select>
       
            </div>
          </div>
      </div>

  


      <div class="form-row pb-5">
        <div class="form-group col-md-6">
          <label for="txtPassword" class="mb-4">Contraseña</label>
          <input type="password" class="form-control" id="txtPassword" name="txtPassword">
        </div>
      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary mx-5"  id="btnActionForm"><span id="btnText">Guardar</span></button>   
      <button type="button" class="btn btn-danger" id="btn-close2"  data-bs-dismiss="modal">Cerrar</button>
       </div>
      </div>
        </form>
      </div>
    </div>
  </div>

  
   <!-- Modal para ver más detalles del estudiante -->
 <div class="modal fade" id="modalViewEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header header-estudiante" id="modalEstudiantes">
        <h1 class="modal-title fs-3" id="titleModal">Datos del Estudiante</h1>
        <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
      <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombres:</td>
              <td id="estNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="estApellido">Jacob</td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td id="estDireccion">Larry</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td id="estEmail">Larry</td>
            </tr>
            <tr>
              <td>Carrera:</td>
              <td id="estCarrera">Larry</td>
            </tr>
            <tr>
              <td>Grado:</td>
              <td id="estGrado">Larry</td>
            </tr>
            <tr>
              <td>Seccion:</td>
              <td id="estSeccion">Larry</td>
            </tr>
            <tr>
              <td>Tipo Usuario:</td>
              <td id="estTipoUsuario">Larry</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="estEstado">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="estFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-close2" data-bs-dismiss="modal">Cerrar</button>
      </div>
      </div>
        </form>
      </div>
    </div>
  </div>



