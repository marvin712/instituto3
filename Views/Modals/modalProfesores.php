 <!-- Modal -->
 <div class="modal fade" id="modalFormProfesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister" id="modalProfesores">
        <h1 class="modal-title fs-3" id="titleModal">Nuevo Profesor</h1>
        <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <form name="formProfesor" id="formProfesor" class="form-horizontal">
            <input type="hidden" id="idProfesor" name="idProfesor" value="">
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

      <!-- <div class="row">
        <div class="form-group col-md-4  mb-5">
        <label for="listCursoid" class="mb-4">Curso</label>
            <select name="listCursoid" id="listCursoid" class="form-select shadow bg-white p-3"></select>
        </div>
        <div class="form-group col-md-4  mb-5">
        <label for="listCarreraid" class="mb-4">Carrera</label>
            <select name="listCarreraid" id="listCarreraid" class="form-select shadow bg-white p-3"></select>
        </div>
        <div class="form-group col-md-2">
        <label for="listGradoid" class="mb-4">Grado</label>
            <select name="listGradoid" id="listGradoid" class="form-select shadow bg-white p-3"></select>
        </div>
        <div class="form-group col-md-2">
        <label for="listSeccionid" class="mb-4">Seccion</label>
            <select name="listSeccionid" id="listSeccionid" class="form-select shadow bg-white p-3"></select>
        </div>
      </div> -->

      

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


   <!-- Modal -->
 <div class="modal fade" id="modalViewProfesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header header-estudiante" id="modalProfesores">
        <h1 class="modal-title fs-3" id="titleModal">Datos del Profesor</h1>
        <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
      <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombres:</td>
              <td id="proNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="proApellido">Jacob</td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td id="proDireccion">Larry</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td id="proEmail">Larry</td>
            </tr>
            <!-- <tr>
              <td>Curso:</td>
              <td id="proCurso">Larry</td>
            </tr>
            <tr>
              <td>Carrera:</td>
              <td id="proCarrera">Larry</td>
            </tr>
            <tr>
              <td>Grado:</td>
              <td id="proGrado">Larry</td>
            </tr>
            <tr>
              <td>Sección:</td>
              <td id="proSeccion">Larry</td>
            </tr> -->
            <tr>
              <td>Tipo Usuario:</td>
              <td id="proTipoUsuario">Larry</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="proEstado">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="proFechaRegistro">Larry</td>
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
    