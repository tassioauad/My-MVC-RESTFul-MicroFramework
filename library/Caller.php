<?php

namespace library;

use library\AbstractController;
use application\config\MvcRouterConfig;

abstract class Caller
{
    public static function callURL(Request $request)
    {
        $controllerName = $request->getController();
        $actionName = $request->getAction();
        require_once(MvcRouterConfig::$CONTROLLER_PATH . $controllerName . ".php");

        /**
         * @var AbstractController $controller
         */
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            $controller->setParamsToController($request->getParams());
            if (is_callable(array($controllerName,$actionName))) {
                call_user_func(array($controllerName,$actionName));
                extract($controller->getAllParamsToView());
                $viewPath = MvcRouterConfig::$VIEW_PATH . "/" . strtolower($controllerName)
                                    . "/" . $actionName . ".phtml";
                require_once($viewPath);
            } else {
                //TODO: CALL ERRORCONTROLLER
                //TODO : ERROR: The function $actionName in class $controllerName doesn't exist!
            }

        } else {
            //TODO: CALL ERRORCONTROLLER
            //TODO : ERROR: This controller doesn't exist!
        }

    }

    public static function callController()
    {

    }
}
