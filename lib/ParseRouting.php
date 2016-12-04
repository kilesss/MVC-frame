<?php
/**
 * Created by PhpStorm.
 * User: kiles
 * Date: 10/23/2016
 * Time: 2:19 AM
 *
 *
 *  //test   ([a-zA-Z0-9]+)$
//{id}?  (\{.*?\}\?)
//{id2}  (\{.*?\})
//{[1,2,3,4]}  (\{\[\S+\]\})
//{[1,2,3,4]}?  (\{\[\S*\]\})\?

 */

class ParseRouting {

    protected $parsedRoute = array();
    protected $requestUri;
    protected $tempUri;
    protected $currUri;
    protected $controller;
    protected  function MapRoutes($routeArray){

        $this->recursionRoutes($routeArray);
        $ifAllOk = $this->mapRoutingUrl();

        return $this->parsedRoute;
    }


    private function mapRoutingUrl()
    {
        $ifAllOk = false;
        $uri = '';
        $tempPi = '';
        foreach ($this->methods as $ur) {
            $uri .= '/' . $ur;
        }

        foreach ($this->parsedRoute as $url) {

            $pieces = explode("/", $url[1]);
            $regex = '';
            foreach ($pieces as $pi) {
                if (preg_match('/^(\{\[\S+\]\})$/is', $pi)) {
                    $regex = $regex . '\/(\[\S*\])';
                } elseif (preg_match('/^([a-zA-Z0-9]+)$/is', $pi)) {
                    $regex = $regex . '\/' . $pi;
                } elseif (preg_match('/(\{.*?\}\?)/is', $pi)) {
                    $regex = $regex . '\/(.*?)';
                } elseif (preg_match('/^(.*?)$/is', $pi)) {
                    $regex = $regex . '\/(.*?)';
                } elseif (preg_match('/^(\{\[\S*\]\})\?$/is', $pi)) {
                    $regex = $regex . '\/(\[\S*\])';
                }
            }

            $regex = preg_replace('/^..(.*?)$/', '$1', $regex);

            if (preg_match('/' . $regex . '/', $uri)) {
                $regex = $regex;
                $tempPi = $url;
                $ifAllOk = true;

                $this->tempUri = $tempPi;
                $this->currUri = $uri;

                break;

            }
        }
        $this->ifAllOk = $ifAllOk;
        return $ifAllOk;
    }

    protected function parseRequset(){

        $requests = array();
        $tempPi = $this->tempUri;
        $uri = $this->currUri;
        $re = '/(?:^|\/)?(?:(\w*)(?:(?:\/)?((?:(?:\/)?\{.*?\}\??)*)?)?)?(?:\/|$)?/is';
        preg_match_all($re, $tempPi[1], $matches);
        unset($matches[0]);
        $count = 0;
        foreach($matches[2]  as $m){
            if ($m != null){
                if ($matches[1][$count+1] != null){
                    $re = '/(?:\/)?'.$matches[1][$count].'\/(.*?)\/'.$matches[1][$count+1].'(?:\/|$)?/is';
                }else{
                    $re = '/(?:\/)?'.$matches[1][$count].'(?:\/)?(.*?)$/is';
                }
                preg_match_all($re, $uri, $matchesValues);
                $pieces = explode("/", $matchesValues[1][0]);

                $tempArr = array();
                foreach ($pieces as $pie){
                    if (preg_match('/\[(.*?)\]/is',$pie,$tempArrPie)){
                        $pieces2 = explode(",", $tempArrPie[1]);
                        $tempArr[] = $pieces2;
                    }else {
                        $tempArr[] = $pie;
                    }
                }
                $requests[$matches[1][$count]] = $tempArr;
            }
            $count++;
        }
    return $requests;
    }


    private  function recursionRoutes($routes){
       $group = array();
        foreach($routes as $r){

            if($r[0] == "GROUP"){
                $r[2][0][1] = $r[1].'/'.$r[2][0][1];
                $group[] = $r[2][0];
            }else{
                $this->parsedRoute[] = $r;
            }
        }
        if (empty($group)){
            return;
        }else{
            $this->recursionRoutes($group);
        }
    }
} 