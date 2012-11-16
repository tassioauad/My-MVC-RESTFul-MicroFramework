<?php

namespace library;

class AbstractController
{
    private $paramsToController = array();
    private $paramsToView = array();

    function __construct()
    {
    }

    public function setParamsToController($params)
    {
        $this->paramsToController = $params;
    }

    public function getAllParams()
    {
        return $this->paramsToController;
    }

    public function getParam($key)
    {
        if (isset($this->paramsToController[$key])) {
            return $this->paramsToController[$key];
        } else {
            //TODO: CALL ERRORCONTROLLER
            //TODO : ERROR: There is no arg called $key
        }

    }

    /**
     * @param $toView array
     */
    public function sendToView(array $toView)
    {
        foreach ($toView as $key => $value) {
            $this->paramsToView[$key] = $value;
        }
    }

    /**
     * @param $key string
     * @return mixed
     */
    public function getParamToView($key)
    {
        if (isset($this->paramsToView[$key])) {
            return $this->paramsToView[$key];
        } else {
            //TODO: CALL ERRORCONTROLLER
            //TODO : ERROR: There is no arg to view called $key
        }
    }

    public function getAllParamsToView()
    {
        return $this->paramsToView;
    }

}
