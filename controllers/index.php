<?php
//	    $this->Requests   => get requested parameters from post and get requests
//        $users = $this->db->getAllRows("1", 1); => sample model call
//            $view = array("users"=> $users["query"],"pages"=>$users["pages"]); => example set variables on view
//            self::View("blq", $view);    => example set View
require_once "../lib/BaseController.php";
require_once "../lib/validate/FormValidator.php";

class index extends BaseController{

    public function index()
    {

    }

}

//
//
//public function getUserInfo(){
//	$user = $this->db->getUserInfo($_GET['id']);
//	echo json_encode($user);
//}
//
//public function addUser(){
//
//	$input = $_POST;
//	if (empty($input)){
//		$this->home();
//		return;
//	}
//	$errors = '';
//	$success = false;
//	$sameEmail = false;
//	$validations = array(
//		'usr' => 'not_empty',
//		'email' => 'email',
//		'phone' => 'phone',
//	);
//	$required = array('usr', 'email');
//	$sanatize = array();
//
//	$validator = new FormValidator($validations, $required, $sanatize);
//
//	if(!$validator->validate($input))
//	{
//		$errors = $validator->getScript();
//	}
//	if (empty($errors)){
//		if (isset($input['update']) && $input['update'] == 1) {
//			$this->db->updateUser($input);
//		}else {
//			$same = $this->db->checkEmail($input['email']);
//			if ($same == true) {
//				$this->db->insertRow($input);
//				$success = true;
//			} else {
//				$sameEmail = true;
//			}
//		}
//	}
//	$view = array('success'=> $success, 'errors' => $errors, 'sameEmail' => $sameEmail);
////        header("Location: http://localhost/softHouse/index/home");
//	$this-> home($view);
//}
//public function deleteUser(){
//	$this->db->deleteUser($_GET['id']);
//}
//public function sortUsers(){
//	$input = $_GET;
//
//	$field='';
//	$sort = '';
//	if ($input['id'] == 1){ $field = 'username';}
//	if ($input['id'] == 2){ $field = 'email';}
//	if ($input['id'] == 3){ $field = 'phone';}
//	if ($input['id'] == 4){ $field = 'city';}
//	if ($input['id'] == 5){ $field = 'adress';}
////        if ($input['sort'] == 'asc'){ $sort = 1;}
////        if ($input['sort'] == 'desc'){ $sort = 2;}
//	$users = $this->db->getAllRows($input['page'], $input['sort'], $field);
//	echo json_encode($users['query']);
//}
//public function pageUsers(){
//	$input = $_GET;
//	$users = $this->db->getAllRows($input['id'],1);
//	echo json_encode($users['query']);
//
//}
