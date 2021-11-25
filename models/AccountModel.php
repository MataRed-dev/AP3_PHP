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
            SessionHelpers::login(array("username" => "{$inscrit["NOMINSCRIT"]} {$inscrit["PRENOMINSCRIT"]}", "email" => $inscrit["EMAILINSCRIT"], "idUt" => $inscrit["IDINSCRIT"]));
            return true;
        } else {
            SessionHelpers::logout();
            return false;
        }
    }

    public function getDiplome(){
        $stmt = $this->pdo->prepare("SELECT * FROM diplome");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function register($name, $firstname, $password, $passwordC, $email, $diplome)
    {
        $uppercase = preg_match('@[A-Za-z0-9]@', $password);
        
        if ($password == $passwordC && $uppercase && null !== $diplome){
            if(!$uppercase || strlen($password) < 8) {
                return 2;
            }
            $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->pdo->prepare("INSERT INTO inscrit VALUES (null, ? ,? ,? , ?, ?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $firstname);
            $stmt->bindParam(3, $email);    
            $stmt->bindParam(4, $password);
            $stmt->bindParam(5, $diplome);
            $stmt->execute();


            $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT = ? LIMIT 1");
            $stmt->execute([$email]);
            $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);
            SessionHelpers::login(array("username" => "{$name} {$firstname}", "email" => $email, "idUt" => $inscrit["IDINSCRIT"]));
            return 1;
        }

        if(null !== $diplome){
            return 3;
        }

        if(@$inscrit && $inscrit["mail"] == $email){
            return 0;
        }
        return 4;
        
    }
}