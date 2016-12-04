<?php
include(dirname(__FILE__)."/../database/Database.php");

class Terminal extends Database {

	/*
	 *  mysql
	 *      create ->  create migration file
	 *          terminal.php mysql create table
	 *      update -> drop current table and upload new
	 *          terminal.php mysql update table
	 *      delete -> drop table (delete file or rename file)
	 *          terminal.php mysql delete table
	 *      migrate -> create new file
	 *          terminal.php mysql migrate table
	 *
	 *
	 *
	 * system file with history for tables
	 *
	 *
	 */
	public function __construct ( $parameters) {
		if ($parameters[1] == 'mysql'){
			if ($parameters[2] == 'create'){
				$this->MysqlCreateTable($parameters[3]);
			}elseif($parameters[2] == 'update'){
				$this->MysqlUpdateTable($parameters[3]);
			}elseif($parameters[2] == 'delete'){
				$this->MysqlDeleteTable($parameters[3]);
			}elseif($parameters[2] == 'migrate'){
				$this->MysqlMigrate($parameters[3]);
			}else{
				print "WRONG MYSQL REQUEST !!!";
				die;
			}
		}elseif ($parameters[1] == 'controller'){
			if ($parameters[2] == 'create'){
				$this->createController($parameters[3]);
			}else{
				print "WRONG CONTROLLER REQUEST !!!";
				die;
			}
		}elseif($parameters[1] == 'script'){
			$this -> executeFile($parameters);
			}else{
			print "WRONG REQUEST !!!";
			die;
		}
	}

	public function executeFile($parameters){
		unset($parameters[0]);
		unset($parameters[1]);
		$script = $parameters[2];
		unset($parameters[2]);
		$scriptParam = "";
		foreach($parameters as $v){
			$scriptParam .= $v." ";
		}
		$t = system('perl '.dirname(__FILE__).'/../../PerlScripts/'.$script." ".$scriptParam);
	}
	public function createController($parameters){

		$newFileName = './controllers/'.$parameters.".php";
		if (file_exists($newFileName)) {
			echo "The file $newFileName exists";
		} else {
			$newFileContent = '<?php
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

				}';

			if ( file_put_contents( $newFileName, $newFileContent ) !== false ) {
				echo "File created (" . basename( $newFileName ) . ")";
			} else {
				echo "Cannot create file (" . basename( $newFileName ) . ")";
			}
		}

		$newFileModel = './models/'.$parameters."Model.php";
		if (file_exists($newFileModel)) {
			echo "The file $newFileModel exists";
		} else {
			$newFileContent = '<?php
				require_once "../lib/database/Database.php";
				// Example for request
				//$queryRequest = "SELECT `id`,`username`,`email`,`phone`,`city`,`adress` FROM `users`";
				//$query = $this->fetchAll($queryRequest);

				class homeModel extends Database{
				    public function getAllRows(){

				        return;
				    }
				} ';
			if ( file_put_contents( $newFileModel, $newFileContent ) !== false ) {
				echo "File created (" . basename( $newFileModel ) . ")";
			} else {
				echo "Cannot create file (" . basename( $newFileModel ) . ")";
			}
		}
	}

	protected function MysqlCreateTable($parameters){


		$newFileName = './migrations/'.$parameters.".php";
		if (file_exists($newFileName)) {
			echo "The file $newFileName exists";
		} else {
			$newFileContent = "<?php
			function tableConfig (){
				\$table = array(
					'dropTable' => '" . $parameters . "',
					'engine' => 'MyISAM',
					'encoding' => 'utf8',
					'columns'=> array(
						'id' => array(
							'type' => 'int',
							'size'=> 10,
							'autoIncrement' => 1,
							'notNull'  => 1,
							'primaryKey'  => 1,
							'unsigned'  => 1
						),

						'username' => array(
							'type' => 'varchar',
							'size'=> 100,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0
						),
						'password' => array(
							'type' => 'varchar',
							'size'=> 10,
							'autoIncrement' => 0,
							'notNull'  => 1,
							'primaryKey'  => 0,
							'unsigned'  => 0

						)
					)
				);
			return \$table;
			}
			";

			if ( file_put_contents( $newFileName, $newFileContent ) !== false ) {
				echo "File created (" . basename( $newFileName ) . ")";
			} else {
				echo "Cannot create file (" . basename( $newFileName ) . ")";
			}
		}
	}

//	protected function MysqlUpdateTable($parameter){
//
//	}

	protected function MysqlDeleteTable($parameter){
		$query = $this->dropTable($parameter);
		echo $query;
	}

	protected function MysqlMigrate($parameter){
		$query = $this->createTable($parameter);
		echo $query;
	}


}
