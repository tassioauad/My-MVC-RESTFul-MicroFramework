<?php

namespace application\library;

use application\library\Request;

class URLRequest extends Request
{
    function __construct()
    {
        $this->setController("Index");
        $this->setAction("main");

        $url = $_GET['url'];
        $urlParams = explode("/", $url);

        if (is_array($urlParams)) {

            if(isset($urlParams[0])) {
                $this->setController($urlParams[0]);
            }

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
