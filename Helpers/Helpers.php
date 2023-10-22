<?php
//Retorna la URL del proyecto
function base_url()
{
    return BASE_URL;
}
//Retorna la url de Assets
function media()
{
    return BASE_URL."/Assets";
}
//Funcion para headerAdmin
function headerAdmin($data=""){
    $view_header ="Views/Template/header_admin.php";
    require_once($view_header);
}
//funcion para footer admin
function footerAdmin($data=""){
    $view_footer = "Views/Template/footer_admin.php";
    require_once($view_footer);
}
//Funcion para headerEstudiante
function headerEstudiante($data=""){
    $view_header ="Views/Estudiantes/header_estudiantes.php";
    require_once($view_header);
}
//Funcion para footerEstudiante
function footerEstudiante($data=""){
    $view_footer = "Views/Estudiantes/footer_estudiantes.php";
    require_once($view_footer);
}

//Funcion para headerProfesor
function headerProfesor($data=""){
    $view_header ="Views/Profesores/header_profesores.php";
    require_once($view_header);
}
//Funcion para footerEstudiante
function footerProfesor($data=""){
    $view_footer = "Views/Profesores/footer_profesores.php";
    require_once($view_footer);
}
//Muestra informacion formateada
function dep($data)
{
    $format = print_r("<pre>");
    $format = print_r($data);
    $format = print_r("</pre>");
    return $format;
}

function getModal(string $nameModal, $data){
    $view_modal = "Views/Modals/{$nameModal}.php"; 
    return $view_modal;
}
 //Elimina exceso de espacios entre palabras
 function strClean($strCadena){
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR ´1´=´1´',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace("LIKE ´","",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    return $string;
}

 //Genera una contraseña de 10 caracteres
 function passGenerator($length = 10)
 {
     $pass = "";
     $longitudPass=$length;
     $cadena = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789";
     $longitudCadena=strlen($cadena);

     for($i=1; $i<=$longitudPass; $i++)
     {
         $pos = rand(0,$longitudCadena-1);
         $pass .= substr($cadena,$pos,1);
     }
     return $pass;
 }

    //Genera un token
    function token()
    {
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

       //Formato para valores monetarios
       function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }