 <!-- Modal -->
 <div class="modal fade" id="modalFormActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div class="modal-header headerRegister" id="modalActividad">
         <h1 class="modal-title fs-3" id="titleModal">Nueva Actividad</h1>
         <button type="button" class="btn-close p-3" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body p-5">
         <form name="formActividad" id="formActividad">
           <input type="hidden" id="idActividad" name="idActividad" value="">
           
           <div class="form-group mb-5">
             <label for="txtNombre" class="mb-4">Nombre</label>
             <input type="text" placeholder="nombre" class="form-control shadow" id="txtNombre" name="txtNombre">
           </div>

           <div class="form-group mb-5">
             <label for="txtFecha" class="mb-4">Fecha</label>
             <input type="date" placeholder="nombre" class="form-control shadow" id="txtFecha" name="txtFecha">
           </div>

           <div class="form-group mb-5">
             <label for="txtValor" class="mb-4">Valor</label>
             <input type="number" placeholder="valor" class="form-control shadow" id="txtValor" name="txtValor">
           </div>

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