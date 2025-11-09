<?php 

require __DIR__ . '/../app/controller/controller.php';

try{
    if(isset($_GET['page'])){
        if($_GET['page'] === "home"){
            home();
        }
        else{
            throw new Exception("This page can't be reach or doesn't exist.");
        }
    
    } else {
        home();
    }
}
catch(Exception $e){
    $error = $e->getMessage();
    require __DIR__ . '/../app/view/errorView.php';

}
