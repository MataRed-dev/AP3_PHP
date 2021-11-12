<?php

namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class AccountModel extends SQL
{
    public function __construct()
    {
        parent::__construct('inscrit', 'IDINSCRIT');
    }

    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT=? LIMIT 1");
        $stmt->execute([$username]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($inscrit !== false && password_verify($password, $inscrit['MOTPASSEINSCRIT'])) {
            SessionHelpers::login(array("username" => "{$inscrit["NOMINSCRIT"]} {$inscrit["PRENOMINSCRIT"]}", "email" => $inscrit["EMAILINSCRIT"]));
            return true;
        } else {
            SessionHelpers::logout();
            return false;
        }
    }

    public function register($name, $firstname, $password, $passwordC, $email)
    {
        $uppercase = preg_match('@[A-Za-z0-9]@', $password);

        
        if ($password == $passwordC && $uppercase && isset($password)){
            $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->pdo->prepare("INSERT INTO inscrit VALUES (null, ? ,? ,? ,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $firstname);
            $stmt->bindParam(3, $email);    
            $stmt->bindParam(4, $password);
            $stmt->execute();


            $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT = ? LIMIT 1");
            $stmt->execute([$mail]);
            $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);
            SessionHelpers::login(array("username" => "{$name} {$firstname}", "email" => $email));
            return 1;
        }

        if(@$inscrit && $inscrit["mail"] == $email){
            return 0;
        }

        if(!$uppercase || strlen($password) < 8) {
            return 2;
        } 
        return 4;
    }
}