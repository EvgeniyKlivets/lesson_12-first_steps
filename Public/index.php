<?php
require_once dirname(__DIR__). '/Config/constants.php';
require_once BASE_DIR. '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv:: createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

if (!session_id()) {
    session_start();
}

try{
    $router = new \Core\Router();

    require_once  BASE_DIR . '/routers/web.php';

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){
        $router->dispatch($_SERVER['REQUEST_URI']);
    }

} catch(Exception $e){
    dd($e->getMessage());
}
