
let tableAsignaturas;
document.addEventListener('DOMContentLoaded', function(){

    tableAsignaturas = $('#tableAsignaturas').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Asignaturas/getAsignaturas",
            "dataSrc":""
        },
        "columns":[
            {"data":"idRelacion"},
            {"data":"idProfesor"},
            {"data":"idCurso"},
            {"data":"idCarrera"},
            {"data":"idGrado"},
            {"data":"idSeccion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });
    //Nuevo rol
    let formAsignatura = document.querySelector("#formAsignatura");
    formAsignatura.onsubmit = function(e){
        e.preventDefault();
        //  let intIdAsignatura = document.querySelector('#idAsignatura').value;
         let intProfesor = document.querySelector('#listProfesorid').value;
         let intCurso = document.querySelector('#listCursoid').value;
         let intCarrera = document.querySelector('#listCarreraid').value;
         let intGrado = document.querySelector('#listGradoid');
         let intSeccion = document.querySelector('#listSeccionid').value;
         let intStatus = document.querySelector('#listStatus').value;
        
         if(intProfesor == '' || intCurso=='' || intCarrera=='' || intGrado=='' || intSeccion=='' ||  intStatus == ''){
             Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'Atención, Todos los campos son obligatorios',
                 //footer: '<a href="">Why do I have this issue?</a>'
               })
             return false;

        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Asignaturas/setAsignatura';
        
        let formData = new FormData(formAsignatura);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                // console.log(request.responseText);
                let objData = JSON.parse(request.responseText);
                
        
                if(objData.status){
                      $('#modalFormAsignatura').modal("hide");
                      formAsignatura.reset();
                    
                    Swal.fire(
                        objData.msg,
                        'Roles de usuario',
                        'success'
                      )
                    tableAsignaturas.api().ajax.reload();
                }else{
                    swal.fire("No", "Rol no registrado", "succes")
                    
                }
            }
            
        }
    }
});


 


function openModalAsignatura(){
    $('#modalFormAsignatura').modal('show');
}

window.addEventListener('load',function(){
    fntProfesores()
    fntCursos()
    fntSeccionesEstudiante()
    fntCarrerasEstudiante()
    fntGradosEstudiante()
}, false);


//Mostrar Secciones en Estudiantes
function fntProfesores(){
    var ajaxUrl = base_url+'/ProfesoresAdmin/getSelectProfesores';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
           document.querySelector('#listProfesorid').innerHTML = request.responseText;
            document.querySelector('#listProfesorid').value;
            $('#listProfesorid').selectpicker('render');
        }
    }
    
}
//Mostrar Secciones en Estudiantes
function fntCursos(){
    var ajaxUrl = base_url+'/CursosAdmin/getSelectCursos';
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


//Mostrar Carreras en Estudiantes
function fntCarrerasEstudiante(){
    var ajaxUrl = base_url+'/Carreras/getSelectCarreras';
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

//Mostrar Grados en Estudiantes
function fntGradosEstudiante(){
    var ajaxUrl = base_url+'/Grados/getSelectGrados';
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

//Mostrar Secciones en Estudiantes
function fntSeccionesEstudiante(){
    var ajaxUrl = base_url+'/Secciones/getSelectSecciones';
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


//Funcion para editar
function fntEditAsignatura(idasignatura){
   
    document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";


    var idcarrera = idcarrera;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Carreras/getCarrera/'+idcarrera;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){

        
if(request.readyState == 4 && request.status == 200){
var objData = JSON.parse(request.responseText);

if(objData.status)
{
    document.querySelector("#idCarrera").value = objData.data.idCarrera;
    document.querySelector("#txtNombre").value = objData.data.nombre;
    document.querySelector("#txtDuracion").value = objData.data.duracion;

    if(objData.data.status == 1){
        document.querySelector("#listStatus").value = 1;
    }else{
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
}


        $('#modalFormCarrera').modal('show');
    }
}


//Funcion para eliminar
function fntDelAsignatura(idcarrera){
    var idcarrera = idcarrera;
    Swal.fire({
        title: "Eliminar Carrera",
        text: "¿Realmente quiere eliminar la Carrera?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((isConfirm) => {
        if (isConfirm.isConfirmed) {
    
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Carreras/delCarrera';
            var strData = "idCarrera="+idcarrera;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        Swal.fire("Eliminar!", objData.msg , "success");
                        tableCarreras.api().ajax.reload();
                    }else{
                        swal.fire("Atención!", objData.msg , "error");
                    }
                }
            }
        }
      });
    
    }