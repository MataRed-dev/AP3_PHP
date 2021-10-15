<?php


namespace controllers;


use controllers\base\Web;
use models\AccountModel;
use utils\SessionHelpers;

class Account extends Web
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
    }

    // Méthode de connexion. Prise des paramètre en POST
    function login()
    {
        $error = false;
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->accountModel->login($_POST["login"], $_POST["password"])) {
                $this->redirect("me");
            } else {
                // Connexion impossible avec les identifiants fourni.
                $error = true;
            }
        }

        $this->header();
        include("views/account/login.php");
        $this->footer();
    }

        // Inscription utilisateur.
        function register()
        {
            $error = 1;
            if (isset($_POST['name']) && isset($_POST['pwd'])){
                if ($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 1) {
                    $this->redirect("me");
                }
                elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 0){
                    $error = 0;
                }
                elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 2){
                    $error = 2;
                }               
                 elseif($this->accountModel->register($_POST['name'], $_POST['firstname'], $_POST['pwd'], $_POST['Cpwd'], $_POST['email']) == 4){
                    $error = 4;
                }
                
            }
    
    
            $this->header();
            include("views/account/register.php");
            $this->footer();
    
        }

    // Déconnexion et suppression de la SESSION.
    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("/login");
    }

    // Affiche l'utilisateur actuellement connecté.
    function me()
    {
        $this->header();
        include("views/account/me.php");
        $this->footer();
    }
}