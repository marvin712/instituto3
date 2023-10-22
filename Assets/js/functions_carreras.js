
let tableCarreras;
document.addEventListener('DOMContentLoaded', function(){

    tableCarreras = $('#tableCarreras').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Carreras/getCarreras",
            "dataSrc":""
        },
        "columns":[
            {"data":"idCarrera"},
            {"data":"nombreCarrera"},
            {"data":"duracion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });
    //Nuevo rol
    let formCarrera = document.querySelector("#formCarrera");
    formCarrera.onsubmit = function(e){
        e.preventDefault();
        // let intIdRol = document.querySelector('#idRol').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strDuracion = document.querySelector('#txtDuracion').value;
        let intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || strDuracion == '' || intStatus == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Atención, Todos los campos son obligatorios',
                //footer: '<a href="">Why do I have this issue?</a>'
              })
            return false;

        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Carreras/setCarrera';
        
        let formData = new FormData(formCarrera);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                // console.log(request.responseText);
                let objData = JSON.parse(request.responseText);
                
        
                if(objData.status){
                      $('#modalFormCarrera').modal("hide");
                      formCarrera.reset();
                    
                    Swal.fire(
                        objData.msg,
                        'Roles de usuario',
                        'success'
                      )
                    tableCarrera.api().ajax.reload();
                }else{
                    swal.fire("No", "Rol no registrado", "succes")
                    
                }
            }
            
        }
    }
});


//Funcion para editar
function fntEditCarrera(idcarrera){
   
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
function fntDelCarrera(idcarrera){
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
    


function openModalCarrera(){
    $('#modalFormCarrera').modal('show');
}
