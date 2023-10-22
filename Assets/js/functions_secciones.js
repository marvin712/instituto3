
let tableSecciones;
document.addEventListener('DOMContentLoaded', function(){

    tableSecciones = $('#tableSecciones').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Secciones/getSecciones",
            "dataSrc":""
        },
        "columns":[
            {"data":"idSeccion"},
            {"data":"nombreSeccion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });
    //Nuevo rol
    let formSeccion = document.querySelector("#formSeccion");
    formSeccion.onsubmit = function(e){
        e.preventDefault();
        
        let strNombre = document.querySelector('#txtNombre').value;
        let intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || intStatus == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Atención, Todos los campos son obligatorios',
                //footer: '<a href="">Why do I have this issue?</a>'
              })
            return false;

        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Secciones/setSeccion';
        
        let formData = new FormData(formSeccion);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                // console.log(request.responseText);
                let objData = JSON.parse(request.responseText);
                
        
                if(objData.status){
                      $('#modalFormSeccion').modal("hide");
                      formSeccion.reset();
                    
                    Swal.fire(
                        objData.msg,
                        'Roles de usuario',
                        'success'
                      )
                    tableSecciones.api().ajax.reload();
                }else{
                    swal.fire("No", "Rol no registrado", "succes")
                    
                }
            }
            
        }
    }
});

function fntEditSeccion(idseccion){
   
    document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";


    var idseccion = idseccion;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Secciones/getSeccion/'+idseccion;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){

        
if(request.readyState == 4 && request.status == 200){
var objData = JSON.parse(request.responseText);

if(objData.status)
{
    document.querySelector("#idSeccion").value = objData.data.idCarrera;
    document.querySelector("#txtNombre").value = objData.data.seccion;
 

    if(objData.data.status == 1){
        document.querySelector("#listStatus").value = 1;
    }else{
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
}


        $('#modalFormSeccion').modal('show');
    }
}


//Funcion para eliminar
function fntDelSeccion(idseccion){
    var idseccion = idseccion;
    Swal.fire({
        title: "Eliminar Sección",
        text: "¿Realmente quiere eliminar la Sección?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((isConfirm) => {
        if (isConfirm.isConfirmed) {
    
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Secciones/delSeccion';
            var strData = "idSeccion="+idseccion;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        Swal.fire("Eliminar!", objData.msg , "success");
                        tableSecciones.api().ajax.reload();
                    }else{
                        swal.fire("Atención!", objData.msg , "error");
                    }
                }
            }
        }
      });
    
    }

function openModalSeccion(){
    $('#ModalFormSeccion').modal('show');
}