<?php

namespace controllers;

use controllers\base\Web;
use models\CommentaireModel;
use models\FormationsModel;
use models\FormationModel;
use utils\SessionHelpers;


class Commentaire extends Web
{
    $account = SessionHelpers::getConnected();

    protected $commentaireModel;

    public function __construct()
    {
        $this->commentaireModel = new CommentaireModele;
        $this->formationModel = new FormationModel();
    }

    function printCommentaire()
    {
        $formations = $this->formationModel->getVideos();
        $this->commentaireModel->postComm($formations['IDFORMATION']);


        $this->__constructheader();
        include("views/formations/tv.php");
        $this->footer();
    }
}

