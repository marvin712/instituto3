var tableAdministrador;

document.addEventListener('DOMContentLoaded', function(){

    tableAdministrador = $('#tableAdministrador').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Administradores/getAdministradores",
            "dataSrc":""
        },
        "columns":[
            {"data":"idAdministrador"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"direccion"},
            {"data":"email"},
            {"data":"status"},
            {"data":"options"},
           
        ],

        //  'dom': 'lBfrtip',
        //  'buttons': [
            //  {
                //  "extend": "copyHtml5",
                //  "text": "<img src=''>Copiar",
                //  "titleAttr":"Copiar",
                //  "className": "btn btn-secondary text-white py-2 px-4"
            //  },{
                //  "extend": "excelHtml5",
                //  "text": "<i class='fas fa-file-excel'></i> Excel",
                //  "titleAttr":"Esportar a Excel",
                //  "className": "btn btn-success py-2 px-4"
            //  },{
                //  "extend": "pdfHtml5",
                //  "text": "<i class='fas fa-file-pdf'></i> PDF",
                //  "titleAttr":"Esportar a PDF",
                //  "className": "btn btn-danger py-2 px-4"
            //  },{
                //  "extend": "csvHtml5",
                //  "text": "<i class='fas fa-file-csv'></i> CSV",
                //  "titleAttr":"Esportar a CSV",
                //  "className": "btn btn-info text-white py-2 px-4"
            //  }
        //  ],


        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });

     });


     document.addEventListener('DOMContentLoaded',function(){
    var formAdministrador = document.querySelector('#formAdministrador');
    formAdministrador.onsubmit = function(e){
        e.preventDefault();
           
            var strNombre = document.querySelector('#txtNombre').value;
            var strApellido = document.querySelector('#txtApellido').value;
            var strDireccion = document.querySelector('#txtDireccion').value;
            var strEmail = document.querySelector('#txtEmail').value;
            var intTipousuario = document.querySelector('#listRolid').value;
            var strPassword = document.querySelector('#txtPassword').value;
           

            //Validar cada uno de los datos ingresados
            if(strApellido == '' || strNombre == '' || strEmail == '' || strDireccion == '' || intTipousuario == '')
        {
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Atención, todos los campos son obligatorios!'
                
            });
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Administradores/setAdministrador'; 
        var formData = new FormData(formAdministrador);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormAdministrador').modal("hide");
                    formAdministrador.reset();
                    Swal.fire("Administradores", objData.msg ,"success");
                    tableAdministrador.api().ajax.reload();
                }else{
                    Swal.fire("Error", objData.msg , "error");
                }
            }
        }

    }
},false)

window.addEventListener('load',function(){
    fntRolesAdministrador();
    
}, false);

//Mostrar roles en Estudiantes
function fntRolesAdministrador(){
    var ajaxUrl = base_url+'/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
           document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value=1;
            $('#listRolid').selectpicker('render');
        }
    }
    
}



function fntViewAdministrador(idadministrador){
   
   
                var idadministrador = idadministrador;
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/Administradores/getAdministrador/'+idadministrador;
                request.open("GET",ajaxUrl,true);
                request.send();
                
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        var objData = JSON.parse(request.responseText);
            
                        if(objData.status)
                        {
                           var estadoEstudiante = objData.data.status == 1 ? 
                            '<span class="badge badge-secondary bg-secondary">Activo</span>' : 
                            '<span class="badge badge-danger bg-danger">Inactivo</span>';
            
                        
                            document.querySelector("#adNombre").innerHTML = objData.data.nombreEstudiante;
                            document.querySelector("#adApellido").innerHTML = objData.data.apellidoEstudiante;
                            document.querySelector("#adDireccion").innerHTML = objData.data.direccionEstudiante;
                            document.querySelector("#adEmail").innerHTML = objData.data.email;
                            
                           
                            document.querySelector("#adTipoUsuario").innerHTML = objData.data.nombrerol;
                            document.querySelector("#adEstado").innerHTML = estadoEstudiante;
                            document.querySelector("#adFechaRegistro").innerHTML = objData.data.fechaRegistro; 
                            $('#modalViewAdministrador').modal('show');
                        }else{
                            swal("Error", objData.msg , "error");
                        }
                    }
                }
           
}


//Funcion para editar
function fntEditEstudiante(idestudiante){
   
                document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
                document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
                document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
                document.querySelector('#btnText').innerHTML ="Actualizar";
            

                var idestudiante = idestudiante;
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/EstudiantesAdmin/getEstudiante/'+idestudiante;
                request.open("GET",ajaxUrl,true);
                request.send();
                
                request.onreadystatechange = function(){

                    
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idEstudiante").value = objData.data.idEstudiante;
                document.querySelector("#txtNombre").value = objData.data.nombreEstudiante;
                document.querySelector("#txtApellido").value = objData.data.apellidoEstudiante;
                document.querySelector("#txtDireccion").value = objData.data.direccionEstudiante;
                document.querySelector("#txtEmail").value = objData.data.email;

                document.querySelector("#listCarreraid").value = objData.data.nombre;
                $('#listCarreraid').selectpicker('render');

                document.querySelector("#listGradoid").value = objData.data.nombreGrado;
                $('#listGradoid').selectpicker('render');

                document.querySelector("#listSeccionid").value = objData.data.seccion;
                $('#listSeccionid').selectpicker('render');
                
                document.querySelector("#listRolid").value = objData.data.idrol;
                $('#listRolid').selectpicker('render');
              


                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');
            }
        }


                    $('#modalFormEstudiante').modal('show');
                }
            }

 

//Funcion para eliminar estudiante
function fntDelEstudiante(idestudiante){
  
            var idestudiante = idestudiante;

            Swal.fire({
                title: "Eliminar Estudiante",
                text: "¿Realmente quiere eliminar el Estudiante?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
              }).then((isConfirm) => {
                if (isConfirm.isConfirmed) {

                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'/EstudiantesAdmin/delEstudiante';
                    var strData = "idEstudiante="+idestudiante;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                Swal.fire("Eliminar!", objData.msg , "success");
                                tableEstudiantes.api().ajax.reload();
                            }else{
                                swal.fire("Atención!", objData.msg , "error");
                            }
                        }
                    }
                }
              });

  }


function openModalAdministrador(){
    $('#modalFormAdmin').modal('show');
 }


  