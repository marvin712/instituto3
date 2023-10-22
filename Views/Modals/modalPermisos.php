 <!-- Modal -->
 <div class="modal fade modalPermisos" id="modalPermisos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title h4">Permisos Roles de Usuario</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">
          <?php
            dep($data);
          ?>
         <div class="col-md-12">
           <div class="tile">
             <form action="" id="formPermisos" name="formPermisos">

               <div class="table-responsive">
                 <table class="table">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Módulo</th>
                       <th>Ver</th>
                       <th>Crear</th>
                       <th>Actualizar</th>
                       <th>Eliminar</th>
                     </tr>

                   </thead>
                   <tbody>
                      <tr>
                          <td>Usuarios</td>
                          <td>  
                            <div class="toggle-flip">
                              <label>
                              <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                         </div>
                        </td>
                        <td>  
                            <div class="toggle-flip">
                              <label>
                              <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                         </div>
                        </td>
                        <td>  
                            <div class="toggle-flip">
                              <label>
                              <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                         </div>
                        </td>
                        <td>  
                            <div class="toggle-flip">
                              <label>
                              <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                         </div>
                        </td>
                      </tr>
                      
                   </tbody>
                 </table>
               </div>
               <div class="text-center">
                 <button id="btnActionForm" class="btn btn-secondary text-white" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i> Guardar</button>
                 <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i> Salir</button>
               </div>
             </form>
           </div>
         </div>
       </div>

     </div>
   </div>
 </div>