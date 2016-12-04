<?php
/**
 * Created by PhpStorm.
 * User: kiles
 * Date: 9/27/2016
 * Time: 11:14 AM
 */
require 'libsSmarty/Smarty.class.php';

// BaseController is takes care of Smarty and variables which shall be submitted to the View

class BaseController {
    public  $urlParams = array();
    public $db;
    public $session  = array();
    public $Requests;
    public function __construct(){
        $this->__autoload();
        $name = get_class($this).'Model';
        $db = new $name();
        $this->db = $db;
    }

    public function  __autoload(){
        require_once '../models/'.get_class($this).'Model.php';
    }

    public function urlParams($params){
        if($params != false){
            $this->urlParams = $params;
        }
    }
    protected static  function View($file, $arrayVar = false){


        if (file_exists('../views/templates/'.$file.'.tpl')) {
            self::MakeView($file, $arrayVar);
        } else {
            throw new Exception('File '.$file. ' isn`t exist');
        }
    }

    private static function MakeView($file, $arrayVar = false){

        $smarty = new Smarty;

        //$smarty->force_compile = true;
        $smarty->debugging = false;
        $smarty->caching = false;
        $smarty->cache_lifetime = 120;
        if(isset($arrayVar)) {
            $smarty->assign('temp', $arrayVar);
        }
        $smarty->display($file.'.tpl');

    }
} 