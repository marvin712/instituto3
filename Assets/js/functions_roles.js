function openModal(){
    $('#modalFormRol').modal('show');
 }

let tableRoles;
document.addEventListener('DOMContentLoaded', function(){

    tableRoles = $('#tableRoles').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Roles/getRoles",
            "dataSrc":""
        },
        "columns":[
            {"data":"idrol"},
            {"data":"nombrerol"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"asc"]]
    });
    //Nuevo rol
    let formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e){
        e.preventDefault();
        // let intIdRol = document.querySelector('#idRol').value;
        let strNombre = document.querySelector('#txtNombre').value;
        let strDescripcion = document.querySelector('#txtDescripcion').value;
        let intStatus = document.querySelector('#listStatus').value;
        
        if(strNombre == '' || strDescripcion == '' || intStatus == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Atención, Todos los campos son obligatorios',
                //footer: '<a href="">Why do I have this issue?</a>'
              })
            return false;

        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Roles/setRol';
        
        let formData = new FormData(formRol);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                // console.log(request.responseText);
                let objData = JSON.parse(request.responseText);
                
        
                if(objData.status){
                      $('#modalFormRol').modal("hide");
                      formRol.reset();
                    
                    Swal.fire(
                        objData.msg,
                        'Roles de usuario',
                        'success'
                      )
                    tableRoles.api().ajax.reload();
                }else{
                    swal.fire("No", "Rol no registrado", "succes")
                    
                }
            }
            
        }
    }
});

 $('#tableRoles').DataTable();

function openModal(){

    document.querySelector('#idRol').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
	$('#modalFormRol').modal('show');
}

window.addEventListener('load', function() {
    // fntEditRol();
    // fntDelRol();
    // fntPermisos();
}, false);

function fntEditRol(idrol){



            document.querySelector('#titleModal').innerHTML ="Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML ="Actualizar";

            var idrol = idrol;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl  = base_url+'/Roles/getRol/'+idrol;
            request.open("GET",ajaxUrl ,true);
            request.send();

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#idRol").value = objData.data.idrol;
                        document.querySelector("#txtNombre").value = objData.data.nombrerol;
                        document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                        if(objData.data.status == 1)
                        {
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }
                        var htmlSelect = `${optionSelect}
                                          <option value="1">Activo</option>
                                          <option value="2">Inactivo</option>
                                        `;
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('#modalFormRol').modal('show');
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
            }
        }


//FUNCION PARA ELIMINAR UN ROL
function fntDelRol(idrol){
   
            var idrol = idrol;
            Swal.fire({
                title: 'Eliminar Rol',
                text: "Realmente quiere eliminar el Rol?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((isConfirm) => {
                if (isConfirm.isConfirmed) {

                        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                        var ajaxUrl = base_url+'/Roles/delRol';
                        var strData = "idrol="+idrol;
                        request.open("POST",ajaxUrl,true);
                        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        request.send(strData);
                        request.onreadystatechange = function(){
                            if(request.readyState == 4 && request.status == 200){
                                var objData = JSON.parse(request.responseText);
                                if(objData.status)
                                {
                                    Swal.fire("Eliminar!", objData.msg , "success");
                                    tableRoles.api().ajax.reload();
                                }else{
                                    swal.fire("Atención!", objData.msg , "error");
                                }
                            }
                        }
                    

                }
              })

    }

//FUNCION PARA PERMISOS
function fntPermisos(idrol){
   
    var idrol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/getPermisosRol/'+idrol;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            console.log(request.responseText);
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            // $('.modalPermisos').modal('show');
            // document.querySelector('#formPermisos').addEventListener('submit',fntSavePermisos,false);
            $('.modalPermisos').modal('show');
            // $('#modalPermisos').modal('show');
        }
    }
}
//FUNCION PARA GUARDAR PERMISOS
function fntSavePermisos(evnet){
    evnet.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/setPermisos'; 
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                swal("Permisos de usuario", objData.msg ,"success");
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
    
}