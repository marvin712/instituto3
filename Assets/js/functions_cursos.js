var tableCursos;

document.addEventListener('DOMContentLoaded', function(){

    tableCursos = $('#tableCursos').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/CursosAdmin/getCursos",
            "dataSrc":""
        },
        "columns":[
            {"data":"idCurso"},
            {"data":"codigoCurso"},
            {"data":"nombreCurso"},
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
        var formCurso = document.querySelector('#formCurso');
        formCurso.onsubmit = function(e){
            e.preventDefault();
               
                var strNombre = document.querySelector('#txtNombre').value;
                let intCodigo = document.querySelector('#txtCodigo').value
                // let intCarrera = document.querySelector('#listCarreraid').value;
                let intStatus = document.querySelector('#listStatus').value;
    
                //Validar cada uno de los datos ingresados
                if(strNombre == '' || intCodigo=='' || intStatus=='')
            {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Atención, todos los campos son obligatorios!'
                    
                });
                return false;
            }
    
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/CursosAdmin/setCurso'; 
            var formData = new FormData(formCurso);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormCurso').modal("hide");
                        formCurso.reset();
                        Swal.fire("Cursos", objData.msg ,"success");
                        tableCursos.api().ajax.reload();
                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
            }
    
        }
    },false)

    window.addEventListener('load',function(){
 
        fntCarrerasEstudiante()
 
    }, false);

    //Mostrar Carreras en Cursos
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

    
    //Funcion para editar
//Funcion para editar
function fntEditCurso(idcurso){
   
    document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";


    var idcurso = idcurso;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/CursosAdmin/getCurso/'+idcurso;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){

        
if(request.readyState == 4 && request.status == 200){
var objData = JSON.parse(request.responseText);

if(objData.status)
{
    document.querySelector("#idCurso").value = objData.data.idCurso;
    document.querySelector("#txtCodigo").value = objData.data.codigoCurso;
    document.querySelector("#txtNombre").value = objData.data.nombreCurso;

    if(objData.data.status == 1){
        document.querySelector("#listStatus").value = 1;
    }else{
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
}


        $('#modalFormCurso').modal('show');
    }
}




//Funcion para eliminar estudiante
function fntDelCurso(idcurso){
var idcurso = idcurso;
Swal.fire({
    title: "Eliminar Curso",
    text: "¿Realmente quiere eliminar el Curso?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar!'
  }).then((isConfirm) => {
    if (isConfirm.isConfirmed) {

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/CursosAdmin/delCurso';
        var strData = "idCurso="+idcurso;
        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    Swal.fire("Eliminar!", objData.msg , "success");
                    tableCursos.api().ajax.reload();
                }else{
                    swal.fire("Atención!", objData.msg , "error");
                }
            }
        }
    }
  });

}




function openModalCurso(){
    $('#modalFormCurso').modal('show');
 }

