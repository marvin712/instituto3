

function openModalGrado(){
    $('#modalFormGrado').modal('show');
}


let tableGrados;
document.addEventListener('DOMContentLoaded', function(){

    tableGrados = $('#tableGrados').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Grados/getGrados",
            "dataSrc":""
        },
        "columns":[
            {"data":"idGrado"},
            {"data":"nombreGrado"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });
    //Nuevo rol
    let formGrado = document.querySelector("#formGrado");
    formGrado.onsubmit = function(e){
        e.preventDefault();
       
        let strNombre = document.querySelector('#txtNombre').value;
        let intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || intStatus == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Atención, Todos los campos son obligatorios',
               
              })
            return false;

        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Grados/setGrado';
        
        let formData = new FormData(formGrado);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                
                if(objData.status){
                      $('#modalFormCurso').modal("hide");
                      formGrado.reset();
                    
                    Swal.fire(
                        objData.msg,
                        'Roles de usuario',
                        'success'
                      )
                    tableGrados.api().ajax.reload();
                }else{
                    swal.fire("No", "Rol no registrado", "succes")
                    
                }
            }
            
        }
    }
});


//Funcion para editar
function fntEditGrado(idgrado){
   
    document.querySelector('#titleModal').innerHTML ="Actualizar Grado";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";


    var idgrado = idgrado;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Grados/getGrado/'+idgrado;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){

        
if(request.readyState == 4 && request.status == 200){
var objData = JSON.parse(request.responseText);

if(objData.status)
{
    document.querySelector("#idGrado").value = objData.data.idGrado;
    document.querySelector("#txtNombre").value = objData.data.nombreGrado;


    if(objData.data.status == 1){
        document.querySelector("#listStatus").value = 1;
    }else{
        document.querySelector("#listStatus").value = 2;
    }
    $('#listStatus').selectpicker('render');
}
}


        $('#modalFormGrado').modal('show');
    }
}



//Funcion para eliminar
function fntDelGrado(idgrado){
    var idgrado = idgrado;
    Swal.fire({
        title: "Eliminar Grado",
        text: "¿Realmente quiere eliminar el grado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((isConfirm) => {
        if (isConfirm.isConfirmed) {
    
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Grados/delGrado';
            var strData = "idGrado="+idgrado;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        Swal.fire("Eliminar!", objData.msg , "success");
                        tableGrados.api().ajax.reload();
                    }else{
                        swal.fire("Atención!", objData.msg , "error");
                    }
                }
            }
        }
      });
    
    }
