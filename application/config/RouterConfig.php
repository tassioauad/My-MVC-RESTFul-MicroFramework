<?php

namespace application\config;

abstract class RouterConfig
{
    public static $paths = array (

        /**
         * "configs" => array ( "namespace" => "className" )
         */
        "configs" => array(
            "application/config/RouterConfig" => "RouterConfig",
        ),

        /**
         * "library" => array ( "namespace" => "className" )
         */
        "library" => array(
            "library/AbstractController" => "AbstractController",
            "library/Caller" => "Caller",
            "library/Request" => "Request",
            "library/URLRequest" => "URLRequest",
        ),

        /**
         * "controllers" => array ( "namespace" => "controllerName" )
         */
        "controllers" => array(
            "application/src/controller/Index" => "Index",
        ),

        /**
         * "views" => array ( "controllerName" => array ("action" => "viewPath") )
         */
        "views" => array (
            "application/src/controller/Index" => array (
                "main" => "application/src/view/index/main.phtml",
            ),
        )
    );
}
