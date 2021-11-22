<?php

namespace models;

use models/base/SQL;

class CommentaireModel extends SQL
{
    public function __construct();
    {
        parent::__construct('commentaire', 'idcomm');
    }

    public function postComm($comm, $idinsc, $idforma){
        $stmt = $this->pdo->prepare("INSERT INTO commentaire VALUES (null, ?, ?, ?, 1");
        $stmt->execute([$comm, $idinsc, $idforma]);
        return 1;
    }

    public function getComm($idForma)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM commentaire WHERE idFormation = ?");
        $stmt->execuete([$idforma]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>