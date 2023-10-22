var tableProfesores;

document.addEventListener('DOMContentLoaded', function(){

    tableProfesores = $('#tableProfesores').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/ProfesoresAdmin/getProfesores",
            "dataSrc":""
        },
        "columns":[
            {"data":"idProfesor"},
            {"data":"nombreProfesor"},
            {"data":"apellidoProfesor"},
            {"data":"direccionProfesor"},
            {"data":"email"},
            {"data":"status"},
            {"data":"options"},
           
        ],

        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });

     });


document.addEventListener('DOMContentLoaded',function(){
    var formProfesor = document.querySelector('#formProfesor');
    formProfesor.onsubmit = function(e){
        e.preventDefault();
           
            var strNombre = document.querySelector('#txtNombre').value;
            var strApellido = document.querySelector('#txtApellido').value;
            var strDireccion = document.querySelector('#txtDireccion').value;
            var strEmail = document.querySelector('#txtEmail').value;

            // var intCurso = document.querySelector('#listCursoid').value;
            // var intCarrera = document.querySelector('#listCarreraid').value;
            // var intGrado = document.querySelector('#listGradoid').value;
            // var intSeccion = document.querySelector('#listSeccionid').value;


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
        var ajaxUrl = base_url+'/ProfesoresAdmin/setProfesor'; 
        var formData = new FormData(formProfesor);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormProfesor').modal("hide");
                    formProfesor.reset();
                    Swal.fire("Profesores", objData.msg ,"success");
                    tableProfesores.api().ajax.reload();
                }else{
                    Swal.fire("Error", objData.msg , "error");
                }
            }
        }

    }
},false)

//Para mostrar roles en el modal
window.addEventListener('load',function(){
    fntRolesProfesor();
    fntCursosProfesor();
    fntCarrerasProfesor();
    fntGradosProfesor();
    fntSeccionesProfesor();

}, false);

//Mostrar roles en Profesores
function fntRolesProfesor(){
    var ajaxUrl = base_url+'/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value = 2;
            $('#listRolid').selectpicker('render');
        }
    }
    
}

//Mostrar Cursos en Profesores
function fntCursosProfesor(){
    var ajaxUrl = base_url+'/cursosAdmin/getSelectCursos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listCursoid').innerHTML = request.responseText;
            document.querySelector('#listCursoid').value;
            $('#listCursoid').selectpicker('render');
        }
    }
    
}

//Mostrar carreras
function fntCarrerasProfesor(){
    var ajaxUrl = base_url+'/carreras/getSelectCarreras';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listCarreraid').innerHTML = request.responseText;
            document.querySelector('#listCarreraid').value;
            $('#listCarreraid').selectpicker('render');
        }
    }
    
}

//Mostrar grado
function fntGradosProfesor(){
    var ajaxUrl = base_url+'/grados/getSelectGrados';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listGradoid').innerHTML = request.responseText;
            document.querySelector('#listGradoid').value;
            $('#listGradoid').selectpicker('render');
        }
    }
    
}

//Mostrar seccion
function fntSeccionesProfesor(){
    var ajaxUrl = base_url+'/secciones/getSelectSecciones';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listSeccionid').innerHTML = request.responseText;
            document.querySelector('#listSeccionid').value;
            $('#listSeccionid').selectpicker('render');
        }
    }
    
}


function fntViewProfesor(idprofesor){
    var idprofesor = idprofesor;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/ProfesoresAdmin/getProfesor/'+idprofesor;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
               var estadoProfesor = objData.data.status == 1 ? 
                '<span class="badge badge-secondary bg-secondary">Activo</span>' : 
                '<span class="badge badge-danger bg-danger">Inactivo</span>';

            
                document.querySelector("#proNombre").innerHTML = objData.data.nombreProfesor;
                document.querySelector("#proApellido").innerHTML = objData.data.apellidoProfesor;
                document.querySelector("#proDireccion").innerHTML = objData.data.direccionProfesor;
                document.querySelector("#proEmail").innerHTML = objData.data.email;
                // document.querySelector("#proCurso").innerHTML = objData.data.nombreCurso;
                // document.querySelector("#proCarrera").innerHTML = objData.data.nombre;
                // document.querySelector("#proGrado").innerHTML = objData.data.nombreGrado;
                // document.querySelector("#proSeccion").innerHTML = objData.data.seccion;
               
                document.querySelector("#proTipoUsuario").innerHTML = objData.data.nombrerol;
                document.querySelector("#proEstado").innerHTML = estadoProfesor;
                document.querySelector("#proFechaRegistro").innerHTML = objData.data.fechaRegistro; 
                $('#modalViewProfesor').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}


//Funcion para editar
function fntEditProfesor(idprofesor){
    document.querySelector('#titleModal').innerHTML ="Actualizar Profesor";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idprofesor = idprofesor;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/ProfesoresAdmin/getProfesor/'+idprofesor;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){    
    if(request.readyState == 4 && request.status == 200){
    var objData = JSON.parse(request.responseText);

    if(objData.status)
    {
            document.querySelector("#idProfesor").value = objData.data.idProfesor;
            document.querySelector("#txtNombre").value = objData.data.nombreProfesor;
            document.querySelector("#txtApellido").value = objData.data.apellidoProfesor;
            document.querySelector("#txtDireccion").value = objData.data.direccionProfesor;
            document.querySelector("#txtEmail").value = objData.data.email;
            document.querySelector("#listRolid").value =objData.data.idrol;
            $('#listRolid').selectpicker('render');

            if(objData.data.status == 1){
                document.querySelector("#listStatus").value = 1;
            }else{
                document.querySelector("#listStatus").value = 2;
            }
            $('#listStatus').selectpicker('render');
    
            }
        }
            $('#modalFormProfesor').modal('show');
    }
}


//Funcion para eliminar profesor
function fntDelProfesor(idprofesor){
  
    var idprofesor = idprofesor;

    Swal.fire({
        title: "Eliminar Profesor",
        text: "¿Realmente quiere eliminar el Profesor?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((isConfirm) => {
        if (isConfirm.isConfirmed) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/ProfesoresAdmin/delProfesor';
            var strData = "idProfesor="+idprofesor;
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


function openModalProfesor(){
    $('#modalFormProfesor').modal('show');
 }

