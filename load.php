<?php
function ClassAutoLoad($ClassName){
    $directories=["form","structure"];
    
    foreach($directories as $dir){
        $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $ClassName . '.php';
        if(file_exists($FileName) AND is_readable($FileName)){
            require $FileName;
           }
    }
}
spl_autoload_register('ClassAutoLoad');
//creation of instances 
$objLayout = new layout();
$objNavigation = new navigation();
$objForms = new forms();