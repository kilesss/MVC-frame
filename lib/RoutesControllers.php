<?php
/**
 * Created by PhpStorm.
 * User: kiles
 * Date: 9/27/2016
 * Time: 10:42 AM
 */



include_once "../routes.php";



// RouteControllers is check if url is matched with some route parameters

class RoutesControllers extends routes{
    protected $methods = array();
    protected $requestUri;
    protected $scriptName;
    protected $controller;
    protected  $ifAllOk;
    protected $tempUri;
    protected $currUri;
protected $Requests;
    protected $action;
    function __autoload() {

        $pieces = explode("@", $this->controller);
        require_once '../controllers/'.$pieces[0].'.php';
        $controllerClass = new $pieces[0]();

        $controllerClass->Requests = $this->Requests;
        $controllerClass->$pieces[1]();

    }

    public function __construct($methods) //, $uri, $action
    {
        $this->methods = $methods;

        $routing = $this->allRoutes();
        $route = $this->MapRoutes($routing);
        if ($this->ifAllOk == true){
            $parseRequest = $this->parseRequset();
            $requests = $this->parseRequset();
            $this->Requests = $requests;
            $this->controller= $this->tempUri[2];
            $this->__autoload();
        }else {
//            REDIRECT TO 404;
            throw new Exception('Undefined routing! ');

        }

//        foreach($routing as $subRout){
//            if(($subRout[0] == $methods[0]) && ($subRout[1] == $methods[1])) {
//                    $this->__autoload($subRout[0]);
//                unset($methods[0]);
//                unset($methods[1]);
//
//                $controllerClass = new $subRout[0]();
//                if (!empty($methods)) {
//                    $controllerClass->urlParams($methods);
//                }
//                $controllerClass->$subRout[1]();
//
//                $error = 0;
//                exit;
//            }
//        }
////        REDIRECT 404 PAGE
//
//        if ($error == 1){
//
//        }
    }
    protected static  function get(){
        var_dump("alah akbaaaar");
        die;
    }


} 