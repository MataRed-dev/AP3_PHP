<?php

use utils\Gravatar;
use utils\SessionHelpers;

$account = SessionHelpers::getConnected();
var_dump($account);
?>
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
                <img class="m-5" src="<?= Gravatar::get_gravatar($account['email']) ?>"/>
                <h3 class="text-center pb-5">Bienvenue « <?= $account['username'] ?> »</h3>
                <div class="mt-5">
                    <a class="btn btn-danger d-block full" href="./logout">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
</div>


