 <!-- Modal -->
 <div class="modal fade" id="modalFormAsignatura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header headerRegister" id="modalAsignatura">
         <h1 class="modal-title fs-3" id="titleModal">Nueva Asignatura</h1>
         <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body p-5">
         <form name="formAsignatura" id="formAsignatura">
           <input type="hidden" id="idAsignatura" name="idAsignatura" value="">

         
           <div class="row">
           <div class="form-group col-md-6 mb-5">
            <label for="listProfesorid" class="mb-4">Profesor</label>
            <select name="listProfesorid" id="listProfesorid" class="form-select shadow bg-white p-3"></select>
          </div>

          <div class="form-group col-md-6 mb-5">
            <label for="listCursoid" class="mb-4">Curso</label>
            <select name="listCursoid" id="listCursoid" class="form-select shadow bg-white p-3"></select>
          </div>
           </div>
          
        <div class="row">
        <div class="form-group col-md-6 mb-5">
            <label for="listCarreraid" class="mb-4">Carrera</label>
            <select name="listCarreraid" id="listCarreraid" class="form-select shadow bg-white p-3"></select>
          </div>

          <div class="form-group col-md-6 mb-5">
            <label for="listGradoid" class="mb-4">Grado</label>
            <select name="listGradoid" id="listGradoid" class="form-select shadow bg-white p-3"></select>
          </div>
        </div>
          
        <div class="row">
        <div class="form-group col-md-6 mb-5">
            <label for="listSeccionId" class="mb-4">Seccion</label>
            <select name="listSeccionid" id="listSeccionid" class="form-select shadow bg-white p-3"></select>
          </div>
          
        

            <div class="form-group col-md-6 mb-5">
             <label for="estado" class="d-block pb-4">Estado</label>
             <div class="input-group">
               <select name="listStatus" id="listStatus" class="p-3 bg-white text-black border-0 shadow form-select">
                 <option value="1">Activo</option>
                 <option value="2">Inactivo</option>
               </select>

             </div>
           </div>
        </div>
           <div class="modal-footer">
             <button type="submit" class="btn btn-primary mx-5" id="btnActionForm"><span id="btnText">Guardar</span></button>
             <button type="button" class="btn btn-danger" id="btn-close2" data-bs-dismiss="modal">Cerrar</button>
           </div>
       </div>
       </form>
     </div>
   </div>
 </div>
