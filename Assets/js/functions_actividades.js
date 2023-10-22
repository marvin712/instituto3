var tableActividades;

document.addEventListener('DOMContentLoaded', function(){

    tableActividades = $('#tableActividades').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Actividades/getActividades",
            "dataSrc":""
        },
        "columns":[
          
            {"data":"nombreActividad"},
            {"data":"fecha"},
            {"data":"valor"},
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
        var formActividad = document.querySelector('#formActividad');
        formActividad.onsubmit = function(e){
            e.preventDefault();
               
                var strNombre = document.querySelector('#txtNombre').value;
                var strFecha = document.querySelector('#txtFecha').value;
                var intValor = document.querySelector('#txtValor').value;
      
               
    
                //Validar cada uno de los datos ingresados
                if(strNombre == '' || strFecha == '' || intValor=='')
            {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Atención, todos los campos son obligatorios!'
                    
                });
                return false;
            }
    
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Actividades/setActividad'; 
            var formData = new FormData(formActividad);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormActividad').modal("hide");
                        formActividad.reset();
                        Swal.fire("Actividades", objData.msg ,"success");
                        tableActividades.api().ajax.reload();
                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
            }
    
        }
    },false)

     //Funcion para mostrar modal actividades
function openModalActividad(){
    $('#modalFormActividad').modal('show');
}