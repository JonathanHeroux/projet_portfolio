<?php 
session_start();
require __DIR__ . '/../app/controller/controller.php';

try{
    if(isset($_GET['page'])){
        if($_GET['page'] === "home"){
            home();
        }

        elseif($_GET['page'] === "projects"){
            projects();
        }
        elseif($_GET['page'] === "articles"){
            articles();
        }
        elseif($_GET['page'] === "aboutme"){
            aboutMe();
        }
        elseif($_GET['page'] === "contact"){
            contact();
        }
        elseif($_GET['page'] === "login"){
            logIn();
        }
        elseif($_GET['page'] === "logout"){
            logOut();
        }
        elseif($_GET['page'] === "register"){
            register();
        }
        elseif($_GET['page'] === "article"){
            article();
        }


        else{
            throw new Exception("This page can't be reach or doesn't exist.");
            pageError();
        }
    
    } else {
        home();
    }
}
catch(Exception $e){
    $error = $e->getMessage();
    require __DIR__ . '/../app/view/errorView.php';

}
