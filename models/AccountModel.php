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
        if ($password == $passwordC){
            password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->pdo->prepare("INSERT INTO utilisateur VALUES (null, ? ,? ,? ,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $firstname);
            $stmt->bindParam(3, $email);
            $stmt->execute();
        }
        // -> À faire, récupération des paramètres & création du mot de passe
        // -> Ajouter en base de données l'utilisateur.
        // password_hash($password, PASSWORD_BCRYPT, ['cost' => 12])
    }
}