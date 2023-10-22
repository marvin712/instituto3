 <!-- Modal -->
 <div class="modal fade" id="modalFormCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header headerRegister" id="modalCurso">
         <h1 class="modal-title fs-3" id="titleModal">Nuevo Curso</h1>
         <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body p-5">
         <form name="formCurso" id="formCurso">
           <input type="hidden" id="idCurso" name="idCurso" value="">

           <div class="form-group mb-5">
             <label for="txtCodigo" class="mb-4">Codigo</label>
             <input type="number" placeholder="codigo" class="form-control shadow" id="txtCodigo" name="txtCodigo">
           </div>
           
           <div class="form-group mb-5">
             <label for="nombre" class="mb-4">Nombre</label>
             <input type="text" placeholder="nombre" class="form-control shadow" id="txtNombre" name="txtNombre">
           </div>

           <!-- <div class="form-group col-md-12 mb-5">
            <label for="listCarreraid" class="mb-4">Carrera</label>
            
            <select name="listCarreraid" id="listCarreraid" class="form-select shadow bg-white p-3">
            
            </select>
          </div> -->
            <div class="mb-5">
             <label for="estado" class="d-block pb-4">Estado</label>
             <div class="input-group">
               <select name="listStatus" id="listStatus" class="p-2 bg-white text-black border-0 shadow form-select">
                 <option value="1">Activo</option>
                 <option value="2">Inactivo</option>
               </select>

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
