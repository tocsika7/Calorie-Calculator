<?php 

spl_autoload_register('autoLoader');

function autoLoader($className){
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . strtolower($className) . $extension;

    if(file_exists($fullPath)){
        require_once $fullPath;
    }
    else{
        $path = "classes/database/";
        $extension = ".class.php";
        $fullPath = $path . strtolower($className) . $extension;

        require_once $fullPath;
        }   
    

}

?>