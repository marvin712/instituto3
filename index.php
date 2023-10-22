<?php 
    //Configuracion de la base de datos
    require_once("Config/Config.php");
    //Funciones generales del programa
    require_once("Helpers/Helpers.php");

    $url = !empty($_GET['url']) ? $_GET['url'] : 'loginGeneral/loginGeneral';

    $arrUrl = explode("/",$url);
    
    $controller = $arrUrl[0];
    $method = $arrUrl[0];
    $params  ="";

    if(!empty($arrUrl[1])){
        if($arrUrl[1] != "")
        {
            $method = $arrUrl[1];
        }
    }

    if(!empty($arrUrl[2])){
        if($arrUrl[2] != ""){
            for($i=2; $i < count($arrUrl); $i++){
                $params .= $arrUrl[$i].",";
            }
            $params = trim($params,",");
        }
    }

    //Funcion para cargar los arvhicos de forma automatica
    require_once("Libraries/Core/Autoload.php");

    //Funcion para crear controladores de manera automatica
   require_once("Libraries/Core/Load.php");


?>