
var tableBimestres;

document.addEventListener('DOMContentLoaded', function(){

    tableBimestres = $('#tableBimestres').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Profesores/getBimestres",
            "dataSrc":""
        },
        "columns":[
            {"data":"idBimestre"},
            {"data":"nombreBimestre"},
           
        ],


    
    });

});