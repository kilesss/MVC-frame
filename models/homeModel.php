<?php
require_once "../lib/database/Database.php";
// Example for request
//$queryRequest = "SELECT `id`,`username`,`email`,`phone`,`city`,`adress` FROM `users`";
//$query = $this->fetchAll($queryRequest);

class homeModel extends Database{
    public function getAllRows(){

        return $query;
    }
}