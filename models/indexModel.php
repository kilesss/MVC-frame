<?php
/**
 * Created by PhpStorm.
 * User: kiles
 * Date: 9/28/2016
 * Time: 11:09 AM
 */
require_once "../lib/database/Database.php";

class indexModel extends Database{
    public function getAllRows($page, $acdc,$fieldOrder = false){
        $limit = '';
        $sort = '';

        if ($acdc == 1 && $fieldOrder != false){
            $sort = "ORDER BY `$fieldOrder` ASC";
        }elseif($acdc == 2){   //Desc
            $sort = "ORDER BY `$fieldOrder` DESC";

        }

        $countUsers = $this->fetchOne("SELECT COUNT(`id`) FROM `users`");
        if($countUsers>10){
            if($page>0) {
                $limit1 = $page * 10;
                $limit2 = $limit1 - 10;
                $limit = "LIMIT $limit2,$limit1";
            }
        }
        $queryRequest = "SELECT `id`,`username`,`email`,`phone`,`city`,`adress` FROM `users` $sort $limit";


        $query = $this->fetchAll($queryRequest);
        $pages = intval($countUsers/10);
        $arr = array('query' => $query, 'pages' => $pages );
        return $arr;
    }
    public function checkEmail($email){

        $query = $this->fetchOne("SELECT `id` FROM `users` WHERE `email` = '$email'");
        if ($query == null){
            return true;
        }else{
            return false;
        }
    }
    public function updateUser($input){
//        $this->db->update('#_users_session', array('last_activity' => time()), "user_id = {$user['user_id']}");

        $this->update('users',
            array(
                'username' => $input['usr'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'city' => $input['city'],
                'adress' => $input['address'],
            ),
            "id = '".$input['id']."'");
    }
    public function deleteUser($id){
        $this->delete('users',"id = '$id'" );
    }
    public function getUserInfo($id){

        $query = $this->fetchRow("SELECT `id`,`username`,`email`,`phone`,`city`,`adress` FROM `users` WHERE `id` = '$id'");
        return $query;
    }
    public function insertRow($input){
        $this->insert(
            'users',
            array(
                'username' => $input['usr'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'city' => $input['city'],
                'adress' => $input['address'],
            )
        );
    }
} 