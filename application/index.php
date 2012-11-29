<?php
require_once( __DIR__ . "/config/RouterConfig.php");
use application\config\RouterConfig;
use library\URLRequest;
use library\Caller;

function __autoload($class)
{
    $class = str_replace('\\', "/", $class);

    foreach(RouterConfig::$paths as $groupFiles) {
        if (isset($groupFiles[$class])) {
            $file = str_replace("application", "", __DIR__). $class . ".php";
            break;
        }
    }

    if (empty($file)) {
        //TODO $class doesn't routed
    }

    require_once($file);
}

try {
    Caller::callURL(new URLRequest());
} catch (Exception $e) {
    print_r("".$e);exit;
}
