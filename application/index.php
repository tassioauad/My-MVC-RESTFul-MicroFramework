<?php
use application\config\MvcRouterConfig;
use library\URLRequest;
use library\Caller;

function __autoload($class)
{
    $arquivo = str_replace("application", "", __DIR__) . $class . '.php';

    require_once($arquivo);
}
try {
    MvcRouterConfig::$CONTROLLER_PATH = __DIR__ . MvcRouterConfig::$CONTROLLER_PATH;
    MvcRouterConfig::$VIEW_PATH = __DIR__ . MvcRouterConfig::$VIEW_PATH;
    Caller::callURL(new URLRequest());
} catch (Exception $e)
{
    print_r("".$e);exit;
}
