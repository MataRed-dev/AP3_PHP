<?php

namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class CommentaireModel extends SQL
{
    public function __construct()
    {
        parent::__construct('commentaire', 'idcomm');
    }

    public function postComm($comm, $idforma)
    {

        $account = SessionHelpers::getConnected();
        $idinsc = $account['idUt'];
        $stmt = $this->pdo->prepare("INSERT INTO commentaire VALUES (null, ?, ?, 2, 1)");
        $stmt->execute([$comm, $idinsc, $idforma]);
        return 1;
    }

    public function getComm($idForma)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM v_commentaire WHERE IDFORMATION = ? AND etatComm = 3");
        $stmt->execute([$idForma]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
