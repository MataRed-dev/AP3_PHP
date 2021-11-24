<?php

namespace routes;

use controllers\Account;
use controllers\Formation;
use controllers\Competence;
use controllers\Main;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct() 
    {
        $main = new Main();
        $formation = new Formation();
        $account = new Account();

        Route::Add('/', [$main, 'home']);
        Route::Add('/formations', [$formation, 'home']);
        Route::Add('/about', [$main, 'about']);-
        Route::Add('/login', [$account, 'login']);
        Route::Add('/register', [$account, 'register']);
        Route::Add('/tv', [$formation, 'tv']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/me', [$account, 'me']);
            Route::Add('/add', [$formation, 'addComm']);
            Route::Add('/logout', [$account, 'logout']);;
        }
    }
}

