<?php
require_once"lib/RoutesControllers.php";
include_once "lib/ParseRouting.php";

class routes extends ParseRouting {
    protected  function allRoutes(){

//       array with all routings
/* *********************** METHOD ***************
 *  GET
 * POST
 * DELETE
 * CONSOLE
 *
 * *****************Routings****************************
 *   $routes = array(
 * "GET|POST|DELETE|UPDATE", ___/{}/____/{}?/___/{[]}, "HomeController@index"
 * )
 *
 * *   $routes = array(
 *          "GROUP", ___/{}/____/{}?/___/{[]}, array(
 *              "GET|POST|DELETE|UPDATE", ___/{}/____/{}?/___/{[]}, "HomeController@index"
 *           )
 *      )
 *
 */

//        RoutesControllers::get();

        $routes = array(
//            array('get', 'index','index@home'),
//            array('index','home'),
//            array('index','getUserInfo'),
//            array('index','addUser'),
//            array('index','deleteUser'),
//            array('index','sortUsers'),
//            array('index','pageUsers'),
	        array("GET","home", "home@index"),


	        array("GET","test/{id}?/{id}?/test22/test2/{id2}/test3/{id3}?/test4/{[1,2,3,4]}", "index@abv"),
            array("GROUP","groupTest", array(
                    array("POST", 'testGroupUrl', "home@group")
                )
            ),
            array("GROUP","TestWithGroup", array(
                    array("GROUP","groupTestWithGroup", array(
                            array("POST", 'GrouptestGroupUrl', "home@groupGroup")
                        )
                    )
                 )
            )
        );

        return $routes;
    }
}
