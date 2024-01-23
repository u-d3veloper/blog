<?php

    namespace Request;

class Request
{
    private $url;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getPath():string
    {
        $path = explode('?',$this->url)[0];

        return $path;
    }

    public function getParams():mixed
    {
        if (isset(explode('?',$this->url)[1])) {
            $arguments = explode('?',$this->url)[1];
            $params = explode('&',$arguments);
            $args = array();
            for ($i=0; $i < count($params); $i++) { 
                [$key,$value] = explode('=',$params[$i]);
                $args[$key] = $value;
            }

            return $args;
        }

        return null;
    }

}