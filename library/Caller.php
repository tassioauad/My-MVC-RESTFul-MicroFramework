<?php

namespace library;

use library\AbstractController;
use application\config\RouterConfig;

abstract class Caller
{
    public static function callURL(Request $request)
    {
        $controllerNamespace = "application/src/controller/" . $request->getController();
        $actionName = $request->getAction();
        $viewPath = RouterConfig::$paths["views"][$controllerNamespace][$request->getAction()];

        if ($viewPath == null) {
            //TODO Action doesn't routed
        }

        /**
         * @var AbstractController $controller
         */
        $controller = new $controllerNamespace();
        $controller->setParamsToController($request->getParams());
        $controller->$actionName();

        extract($controller->getAllParamsToView());
        require_once($viewPath);
    }

    public static function callController()
    {

    }
}
