<?php
/**
 *
 * Created by PhpStorm.
 * User: kiles
 * Date: 10/26/2016
 * Time: 10:45 AM
 *
 *
 * Log(type, messages)
 */

class Logs {
    protected $messages;
    function  __construct($type, $messages){
        $this-> messages = $messages;
        if ($type = 'mysql'){
            $this->mysql();
        }
    }

    private function mysql(){
        var_dump($_SERVER);
        die;
        $file = 'people.txt';
// Open the file to get existing content
        $current = file_get_contents($file);
// Append a new person to the file
        $current .= "John Smith\n";
// Write the contents back to the file
        file_put_contents($file, $current);
    }

} 