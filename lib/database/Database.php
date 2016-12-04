<?php

require_once dirname(__FILE__)."/../../config/config.php";
class Database extends DbConfig
{
	const PREG_MAIL = '#^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$#i';

	private static $_instance = null;

	// PDO connection
	public $debugger_data = array();



	// Cache
	private $_connection = null;

	// Debugger on or off
	private $_cache = null;

	// Start of query execution
	private $debugger = 1;

	/**
	 * @return string
	 */
	public function getSetDebugMode()
	{
		return $this->setDebugMode;
	}

	/**
	 * @param string $setDebugMode
	 */
	public function setSetDebugMode($setDebugMode)
	{
		$this->setDebugMode = $setDebugMode;
	}
	/**
	 * @var string
	 */
	protected $setDebugMode = 'html';

	// Debugger data
	private $start_exec_time;

	// The number of decimal points
	private $decimal_points = 2;

	// Connect to DB
	public function __construct()
	{
		try {
			// try to connect
			$dsn = parent::$SERVER_TYPE . ":host=" . parent::$DB_HOST . ";dbname=" . parent::$DB_NAME;
			$this->_connection = new PDO($dsn, parent::$DB_USER, parent::$DB_PASSWORD);

			// set error handling
			$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Set encoding
			$this->_connection->query("SET NAMES '" . parent::$CHARSET . "'");
		} catch (PDOException $e) {
			$error = 'DatabaseError: Cannot connect to database!';
			throw new DbException($error, DbException::DBConnectionError);
		}
	}

	/**
	 *
	 * Singleton
	 */
	public static function getInstance()
	{
		if (!self::$_instance instanceof self) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __clone()
	{
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

	public function getCache()
	{

		return $this->_cache;
	}

	public function setCache($cache)
	{
		$this->_cache = $cache;
	}

	public function getDebugger()
	{
		return $this->debugger;
	}

	public function setDebugger($value)
	{
		$this->debugger = (bool)$value;
	}

	public function setDecimalPoints($value)
	{
		$this->decimal_points = (int)$value;
	}

	public function getPDO()
	{
		return $this->_connection;
	}

	public function search($sql, $values_arr = array())
	{
		//Prepare the PDO statement and execute it
		$select = $this->_connection->prepare($sql);
		$select->execute($values_arr);

		return $select->fetchAll(PDO::FETCH_ASSOC);
	}
	public function createTable($file){
		$filename = dirname(__FILE__)."/../../migrations/$file.php";
		if (file_exists($filename)) {
			include_once($filename);
			$conf = tableConfig();
			$primaryKey = false;
			$sqlQuery = "CREATE TABLE IF NOT EXISTS `".$conf['dropTable']."` (";
			foreach($conf['columns'] as $key => $value){
				$notNull = "";
				$autoIncrement = "";
				$unsignet = "";
				if ($value['notNull'] == 1){ $notNull = "NOT NULL"; }
				if ($value['autoIncrement'] == 1){ $autoIncrement = "auto_increment"; }
				if ($value['unsigned'] == 1){ $unsignet = "unsigned"; }
				if ($value['primaryKey'] == 1){
					if ($primaryKey == false){
						$primaryKey = $key;
					}else {
						return "ERROR : Table can have only one primary key !!!";
					}
				}
				$sqlQuery .= "   `".$key."` ".$value['type']."(".$value['size'].") ".$unsignet." ".$notNull." ".$autoIncrement.",";
			}
			if ($primaryKey == false){

				return "ERROR : Table need column with primary key !!!";
			}else {
				$sqlQuery .= "PRIMARY KEY  (`".$primaryKey."`)";
			}
			$sqlQuery .= ") ENGINE=".$conf['engine']."  DEFAULT CHARSET=".$conf['encoding'];


		} else {
			return "The file $filename does not exist";
		}

		$mysqli = new mysqli(parent::$DB_HOST,parent::$DB_USER,parent::$DB_PASSWORD,parent::$DB_NAME);
		if ($mysqli->connect_error) {
			die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		$results = $mysqli->query($sqlQuery);
		$mysqli->close();
		if ($results == 1){
			return "The table was created!!!";
		}else{
			return "ERROR : Something when wrong !!!!";
		}
	}
	public function dropTable($param){
		$mysqli = new mysqli(parent::$DB_HOST,parent::$DB_USER,parent::$DB_PASSWORD,parent::$DB_NAME);
		if ($mysqli->connect_error) {
			die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		$results = $mysqli->query("DROP TABLE ".$param);
		if ($results == true){
			return "Table $param is deleted !!! ";
		}else {
			return "ERROR: Someting is wrong !!!";
		}
		$mysqli->close();
	}

	public function fetchAll($query, $params = null, $options = array(), $cacheOptions = array(), $fetchMode=PDO::FETCH_ASSOC)
	{
		// Get start time
		$this->markStart();
        $result ='';
		$query = $this->checkDbPrefix($query);

		$useCache = empty($cacheOptions) ? false : true;
		if ($useCache) {
			$key = isset($cacheOptions['key']) ? $cacheOptions['key'] : array($query, $params);
			$result = $this->_cache->load($key);
		}
		if (!$result) {
			// Execure the query
			$sth = $this->_connection->prepare($query, $options);
			try {
				$sth->execute($params);
			} catch (PDOException $e) {
				$this->onDbError($query, $e->getMessage());
			}
			// Fetch data
			$result = $sth->fetchAll($fetchMode);
			if ($useCache) {
				$this->_cache->save($key, $result, $cacheOptions['expires'], $cacheOptions['compressed']);
			}
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$query = $useCache ? 'cached query: ' . $query : $query;
			$this->addDebugData($query);
		}

		// Return fetched data
		return $result;
	}

	protected function markStart()
	{
		$this->start_exec_time = microtime(true);
	}

	public function checkDbPrefix($query)
	{
		$query = str_replace('#_', parent::$TABLE_PREFIX, $query);

		return $query;
	}

	//search function

	protected function onDbError($query, $message)
	{
		if ($this->debugger == 'json') {
			$this->addDebugData($query);
			$this->addDebugData($message);
			if (APPLICATION_ENV == 'development') {
				$this->showSQLDebugger($this->getSetDebugMode());
				exit();
			} else {
				exit(PRODUCTION_ERROR_MESSAGE);
			}
		}elseif($this->debugger){
			$this->addDebugData($query);
			$this->addDebugData($message);
			if (APPLICATION_ENV == 'development') {
				$this->showSQLDebugger($this->getSetDebugMode());
				exit();
			} else {
				exit(PRODUCTION_ERROR_MESSAGE);
			}
		}
		exit(PRODUCTION_ERROR_MESSAGE);
	}

	// Replaces the table prefix

	protected function addDebugData($query)
	{
		$end_exec_time = microtime(true);
		$this->debugger_data[] = array("time" => round($end_exec_time - $this->start_exec_time, 4), "query" => $query);
	}

	// Get all found rows

	public function showSQLDebugger($debug = 'html')
	{
		// Check if the debugger is on
		if ($this->debugger) {
			if($debug == 'json'){
				echo $this->jsonFormatedError($this->debugger_data); exit;
			}else{
				echo $this->htmlFormatedError($this->debugger_data);
			}
		}
	}

	public function jsonFormatedError(){

		return json_encode($this->debugger_data);
	}
	public function htmlFormatedError(){
		// Form the main table
			$return = '';

			$return
				.= '
				<table border="1" cellpadding="3" width="100%" style="font-size: 11px;clear:both;" class="debugger">
					<tr>
						<td align="center" colspan="3"><b>MySQL Debugger Results</b></td>
					</tr>
					<tr>
						<td align="center" width="5%"><i>Count</i></td>
						<td align="center" width="5%"><i>Time to execute</i></td>
						<td align="left" width="90%"><i>SQL query</i></td>
					</tr>
			';

			// Store all queries time
			$time = 0;
		foreach ($this->debugger_data as $key => $value) {

			$temp = $key + 1;
			$return
				.= '
					<tr>
						<td align="center"><b>' . $temp . '</b></td>
						<td align="center"><b>' . $value['time'] . '</b></td>
						<td align="left"><b>' . $value['query'] . '</b></td>
					</tr>
				';
			$time += $value['time'];
		}

		$return
			.= '
				<tr>
					<td align="center" style="color: red"> - - </td>
					<td align="center" style="color: red"><b>' . $time . '</b></td>
					<td align="left" style="color: red"><b>All Queries Time</b></td>

				</tr>
			';
		// Show the SQL debugger
		$return . "</table><br /><br />";

		return $return;
	}


	// Get a row

	public function fetchRow($query, $params = null, $options = array())
	{
		// Get start time
		$this->markStart();

		$query = $this->checkDbPrefix($query);

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute($params);
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// Fetch data
		$result = $sth->fetch(PDO::FETCH_ASSOC);

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}

		// Return fetched data
		return $result;
	}

	// Get one field

	public function lastInsertId()
	{
		// Return the last insert id
		return $this->_connection->lastInsertId();
	}

	// Get the last insert id

	public function insert($table, $data, $secure = true, $options = array())
	{
		// If the insert data is not an array
		if (!is_array($data)) {
			return;
		}

		// Filter the input data
		foreach ($data as $col => $val) {
			$cols[] = $col;

			if ($secure == true) {
				if (is_float($val)) {
					$vals[] = $this->formatDecimal($val);
				} else {
					$vals[] = $this->quote(htmlspecialchars(trim($val)));
				}
			} else {
				if (is_float($val)) {
					$vals[] = $this->formatDecimal($val);
				} else {
					$vals[] = $this->quote($val);
				}
			}
		}

		$table = $this->checkDbPrefix($table);

		// Form the SQL query
		$query = "INSERT INTO $table (" . implode(', ', $cols) . ') VALUES (' . implode(', ', $vals) . ')';

		// Get start time
		$this->markStart();

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute();
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}
	}

	// Insert record

	public function formatDecimal($value)
	{
		return number_format($value, $this->decimal_points, '.', '');
	}

	public function quote($string, $type = null)
	{
		return $this->_connection->quote($string, $type);
	}

	// Delete record

	/**
	 * @param $table
	 * @param $data
	 * @param bool $secure
	 * @param array $options
	 * @param array $prepend Parrent id
	 */
	public function insertMany($table, $data, $secure = false, $options = array(), array $prepend = array())
	{

		// If the insert data is not an array
		if (!is_array($data)) {
			return;
		}


		$rowVals = array();

		// Filter the input data
		foreach ($data as $k => $row) {
			$vals = array();
			$row = array_merge($prepend, $row);
			foreach ($row as $col => $val) {
				if ($k === reset($row) || $k == 0) {
					$cols[] = $col;
				}

				if ($secure == true) {
					if (is_float($val)) {
						$vals[] = $this->formatDecimal($val);
					} else {
						$vals[] = $this->quote(htmlspecialchars(trim($val)));
					}
				} else {
					if (is_float($val)) {
						$vals[] = $this->formatDecimal($val);
					} else {
						$vals[] = $this->quote($val);
					}
				}
			}
			$rowVals[] = implode(',', $vals);
		}

		$table = $this->checkDbPrefix($table);

		// Form the SQL query
		$query = "INSERT INTO $table (" . implode(', ', $cols) . ") VALUES (" . implode("), (", $rowVals) . ")";

		// Get start time
		$this->markStart();

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute();
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}
	}


	// Update record

	public function delete($table, $where, $limit = '', $options = array())
	{
		// Check the data
		if (!isset($table) || !is_string($table)) {
			$this->onDbError('Missing table name on Delete attampt', '');
		}
		if (!isset($where) || !is_string($where)) {
			$this->onDbError('Missing $where array on Delete attampt', '');
		}
		if (!empty($limit) && !is_int($limit)) {
			$this->onDbError('Limit count is not integer on Delete attampt', '');
		}

		// Set some limit
		if (!empty($limit)) {
			$limit = " LIMIT " . $limit;
		}

		$table = $this->checkDbPrefix($table);

		// Clear the data
		$table = htmlspecialchars(addslashes(trim($table)));
		$where = htmlspecialchars(trim($where));

		// Form the SQL query
		$query = "DELETE from $table WHERE " . $where . $limit;

		unset($where, $limit);

		// Get start time
		$this->markStart();

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute();
			return $sth->rowCount();

		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}
	}


	// Execute a query
	/**
	 * @param $table
	 * @param array $update
	 * @param $where
	 * @param bool $filter
	 * @param array $options
	 * @param null $rowCount
	 * @return int
	 */
	public function update($table, array $update, $where, $filter = true, $options = array(),$rowCount = null)
	{
		$update_string = '';
		$update_array = array();
		// Clear the data and form the update string
		foreach ($update as $key => $val) {
			if ($filter == true) {
				if (!is_float($val)) {
					$val = htmlspecialchars(trim($val));
				} else {
					$val = $this->formatDecimal($val);
				}
			}
			$val = $this->quote($val);
			$update_string .= $key . '=' . $val;
			$update_array[] = $key . '=' . $val;
			$update_string = implode(", ", $update_array);
		}

		$table = $this->checkDbPrefix($table);

		if ($where) {
			$where_q = " WHERE " . $where;
		}

		// Form the SQL query
		$query = "UPDATE $table SET " . $update_string . $where_q;
//		echo $query.'<br>';
//die;
		// Unset variables
		unset($update_string, $where);

		// Get start time
		$this->markStart();

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute($options);
			if($rowCount){

				return $sth->rowCount();
			}
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}
	}

	// MySQL debugger - show queryies in the footer

	public function query($query, $params = null, $options = array())
	{
		// Get start time
		$this->markStart();

		$query = $this->checkDbPrefix($query);

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute($params);
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}
	}

	public function validate($data, $validators)
	{
		$error = array();
		foreach ($validators as $k => $v) {
			$val = $data[$k];
			if ($v[0] && empty($val) && $val !== 0) {
				$error[$k] = $v[1];
			} elseif (!empty($v[2])) {
				switch ($v[2]) {
					case 'str':
						if ((notblank($v[3]) && strlen($val) < $v[3]) || (notblank($v[4]) && strlen($val) > $v[4])) {
							$error[$k] = $v[5];
						}
						if (notblank($v[6]) && preg_match($v[6], $val) == 0) {
							$error[$k] = $v[7];
						}
						break;
					case 'arr':
						if ((notblank($v[3]) && count($val) < $v[3]) || (notblank($v[4]) && count($val) > $v[4])) {
							$error[$k] = $v[5];
						}
						break;
					case 'int':
						$val = (int)$val;
						if ((notblank($v[3]) && $val < $v[3]) || (notblank($v[4]) && $val > $v[4])) {
							$error[$k] = $v[5];
						}
						break;
					case 'flt':
						$val = (float)$val;
						if ((notblank($v[3]) && $val < $v[3]) || (notblank($v[4]) && $val > $v[4])) {
							$error[$k] = $v[5];
						}
						break;

				}
			}
		}

		return $error;
	}

	/*
		$validators['Field Name'] = array(
			0 => Required (true, false),
			1 => Required error txt,
			2 => Field Type ('str', 'int', 'flt', 'arr'),
			3 => Min (x1 - length for str and arr, value for int and flt),
			4 => Max (x2 - ...),
			5 => Min/Max error txt,
			6 => Pattern (strings only, regular expression),
			7 => Pattern error txt
		)
	*/

	public function validateExisting($data, $validators)
	{
		$error = array();
		foreach ($validators as $k => $v) {
			$val = $this->quote($data[$k]);
			$query = "SELECT COUNT(*) FROM `$v[0]` WHERE `$k`=$val";
			if ($v[2] > 0) {
				$query .= " AND `$v[1]`<>" . (int)$v[2];
			}
			$check = (int)$this->fetchOne($query);
			if ($check > 0) {
				$error[] = $v['max'];
			}
		}

		return $error;
	}


	/*
		$validators['Field Name'] = array(
			0 => db table name,
			1 => id_field, (if checking on edit, use exlude_id to exclude the current record)
			2 => exlude_id value or 0,
			3 => error txt,
		)
	*/

	public function fetchOne($query, $params = null, $options = array())
	{
		// Get start time
		$this->markStart();

		$query = $this->checkDbPrefix($query);

		// Execure the query
		$sth = $this->_connection->prepare($query, $options);
		try {
			$sth->execute($params);
		} catch (PDOException $e) {
			$this->onDbError($query, $e->getMessage());
		}

		// Fetch data
		$result = $sth->fetch(PDO::FETCH_NUM);

		// If the debugger is on - add the time and the query
		if ($this->debugger) {
			$this->addDebugData($query);
		}

		// Return fetched data
		return $result[0];
	}

	function getEnumValue( $table, $field )
	{
		$type = $this->fetchRow("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" );

		preg_match('/^enum\((.*)\)$/', $type['Type'], $matches);
		foreach( explode(',', $matches[1]) as $value )
		{

			$enum[] = trim( $value, "'" );
		}
		return $enum;
	}


   public function generateRandomString($length = 10,$checkString = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
		return substr(str_shuffle($checkString), 0, $length);
	}

}

class DbException extends Exception
{
	const DBConnectionError = 1;
}

/*
 *	returns true if the variable is not empty ot its a zero
 */
function notblank($var)
{
	if (empty($var)) {
		if ($var === 0) {
			return true;
		}

		return false;
	}

	return true;
}