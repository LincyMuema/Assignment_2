<?php
require "connection/constants.php";
require "connection/dbConnect.php";
function ClassAutoLoad($ClassName){
    $directories=["form","structure","sql","vendor","global"];
    
    foreach($directories as $dir){
        $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $ClassName . '.php';
        if(file_exists($FileName) AND is_readable($FileName)){
            require $FileName;
           }
    }
}
spl_autoload_register('ClassAutoLoad');
$conn = new dbConnect(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);
//creation of instances 
$objLayout = new layout();
$objNavigation = new navigation();
$objForms = new forms();
$objContent = new content();
$objInsert = new insert();
$objInsert->signup($conn);
$objMail = new mail();
$objFncs = new fncs();
