<?php

namespace library;

use library\Request;

class URLRequest extends Request
{
    function __construct()
    {
        $this->setController("Index");
        $this->setAction("main");

        if (isset($_GET["url"])) {
            $urlParams = explode("/", $_GET["url"]);

            $this->setController($urlParams[0]);

            if(isset($urlParams[1])) {
                $this->setAction($urlParams[1]);
            }

            if(isset($urlParams[2]) && isset($urlParams[3])) {
                $param = array (
                    $urlParams[2] => $urlParams[3]
                );
                $this->setParams($param);
            }
        }

    }

}
