<?php

use App\Core\Middlewares\Auth;
use App\Core\Middlewares\CryptPassword;

 $middlewares = [
           "auth" => Auth::class,
           "cryptPass" => CryptPassword::class
        //    "client" => ClientMiddleware::class
 ];

