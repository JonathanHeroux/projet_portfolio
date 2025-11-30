<?php

require __DIR__ . '/../model/Manager.php';
require __DIR__ . '/../model/UserManager.php';
require __DIR__ . '/../model/ArticleManager.php';
require __DIR__ . '/../model/ProjectManager.php';



function home(){

    require __DIR__ . '/../view/homeView.php';
}

function aboutMe(){

    require __DIR__ . '/../view/aboutMeView.php';
}

function projects(){

    $projectManager = new ProjectManager();

    // Admin condition 
    if(!empty($_SESSION['connect']) && $_SESSION['role'] === "admin" && $_SERVER['REQUEST_METHOD'] === 'POST'){

        //Delete project
        if(!empty($_POST['delete_id'])){

            $id = (int)$_POST['delete_id'];

            $projectManager->deleteProject($id);
            header('Location: /projet_portfolio/public/index.php?page=projects&deleted=1');
            exit();
        }

        //update project
        elseif(isset($_POST['update_project']) && !empty($_POST['id'])){
            
            $id             = (int)$_POST['id'];
            $title          = trim($_POST['title']);
            $description    = trim($_POST['description']);
            $project_image  = trim($_POST['project_image']);
            $project_url    = isset($_POST['project_url']) ? trim($_POST['project_url']) : '';

            $projectManager->updateProject($id,$title,$description,$project_image,$project_url);
            header('Location: /projet_portfolio/public/index.php?page=projects&updated=1');
            exit();
        }
        //Create project
        elseif(empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['project_image'])){
        
            $title          = trim($_POST['title']);
            $description    = trim($_POST['description']);
            $project_image  = trim($_POST['project_image']);
            $project_url    = isset($_POST['project_url']) ? trim($_POST['project_url']) : '';

            $projectManager->createProject($title,$description,$project_image,$project_url);
            header('Location: /projet_portfolio/public/index.php?page=projects&success=1');
            exit();
        }
    }
    //Prepare to edit
    $projectToEdit = null;

    if(!empty($_SESSION['connect']) && $_SESSION['role'] ==="admin" && !empty($_GET['edit_id']) && ctype_digit($_GET['edit_id'])){
        $id = (int) $_GET['edit_id'];
        $projectToEdit = $projectManager->getProjectById($id);
    }

   // Display all project
    $projects = $projectManager->getAllProjects();
    

    //View
    require __DIR__ . '/../view/projectsView.php';

}

function articles(){

    $articleManager = new ArticleManager();

    // Admin condition 
    if(!empty($_SESSION['connect']) && $_SESSION['role'] === "admin" && $_SERVER['REQUEST_METHOD'] === 'POST'){

        //Delete article
        if(!empty($_POST['delete_id'])){

            $id = (int)$_POST['delete_id'];

            $articleManager->deleteArticle($id);
            header('Location: /projet_portfolio/public/index.php?page=articles&deleted=1');
            exit();
        }

        //update article
        elseif(isset($_POST['update_article']) && !empty($_POST['id'])){
            
            $id             = (int)$_POST['id'];
            $title          = trim($_POST['title']);
            $teaser         = trim($_POST['teaser']);
            $article_image  = trim($_POST['article_image']);

            $articleManager->updateArticle($id,$title,$teaser,$article_image);
            header('Location: /projet_portfolio/public/index.php?page=articles&updated=1');
            exit();
        }
        //Create article
        elseif(empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['teaser']) && !empty($_POST['article_image'])){
        
            $title          = trim($_POST['title']);
            $teaser         = trim($_POST['teaser']);
            $article_image  = trim($_POST['article_image']);

            $articleManager->createArticle($title,$teaser,$article_image);
            header('Location: /projet_portfolio/public/index.php?page=articles&success=1');
            exit();
        }
    }
    //Prepare to edit form
    $articleToEdit = null;

    if(!empty($_SESSION['connect']) && $_SESSION['role'] ==="admin" && !empty($_GET['edit_id']) && ctype_digit($_GET['edit_id'])){
        $id = (int) $_GET['edit_id'];
        $articleToEdit = $articleManager->getArticleById($id);
    }

   // Display all articles
    $articles = $articleManager->getAllArticles();

    //View
    require __DIR__ . '/../view/articlesView.php';
}

function pageError(){

    require __DIR__ . '/../view/errorView.php';
}

function contact(){

    require __DIR__ . '/../view/contactView.php';
}
function logIn(){

    // Check if the form isn't empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        // Check if the user doesn't fit with the email
        if(!$user){
            header('Location: /projet_portfolio/public/index.php?page=login&error=1&message=Unable+to+connect');
            exit();
        }
        // Hash the password
        $passwordHashed = "aq1" . sha1($password . "123") . "25";

        // Check if the password fit with the DB
        if($passwordHashed ==$user['password']){

            // Connexion ok: create session
            $_SESSION['connect'] = 1;
            $_SESSION['email'] =$user['email'];
            $_SESSION['role'] =$user['role'];

            // Remember me
            if(isset($_POST['auto'])){
                setcookie('auth', $user['secret'], time() + 365*24*3600, '/', null, false, true);
            }
            // Everything ok
            header('Location: /projet_portfolio/public/index.php?page=home&success=1');
            exit();
        } else{
            // Wrong password
            header('Location: /projet_portfolio/public/index.php?page=login&error=1&message=Unable+to+connect');
            exit();
        }
    }
    // Condition not ok: show this page
    require __DIR__ . '/../view/logInView.php';
}

function logOut(){
    
    $_SESSION = [];
    session_destroy();
    // Remove cookie
    setcookie('auth', '', time() - 3600, '/', null, false, true);

    header('Location: /projet_portfolio/public/index.php?page=home');
    exit();
}

function register(){

    // Check if the form isn't empty.
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])){

    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $passwordTwo    = $_POST['password_two'];

    // Check if the passwords are the same.
    if($password != $passwordTwo){
        header('Location: /projet_portfolio/public/index.php?page=login&error=1&message= Wrong+password');
        exit();
    }
    //Check if the email is valid.
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: /projet_portfolio/public/index.php?page=login&error=1&message= Invalid+email');
        exit();
    }
    //check if the email doesn't exist.
    $userManager = new UserManager();

    if($userManager->emailExist($email)){
        header('Location: /projet_portfolio/public/index.php?page=login&error=1&message= Email+already+exist');
        exit();
    }

    // Add the user
    $userManager->createUser($email, $password);

    // If success.
        header('Location: /projet_portfolio/public/index.php?page=login&success=1');
        exit();
    } else{
        header('Location: /projet_portfolio/public/index.php?page=login');
        exit();
    }

    // condition not ok: show this page
    require __DIR__ . '/../view/logInView.php';
}






