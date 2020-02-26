<?php
/**
 * Database connection class.
 * $db = new db(array(host, user, password, database));
 * $db->connect();
 * $clean = $db->clean($dirty);
 * $db->query("");
 * $db->disconnect();
 */
class Db {
 
	private $db = array();
	private $connection;
	var $server='94.73.148.90';
	var $username= 'u5635028_dict';
	var $password='e3r4t5E3R4T5';
	var $database='u5635028_dictdatabase.php';
	
	public function __construct()
		{
		$this->db['server']		= '94.73.147.210';
		$this->db['username'] 	= 'u8038404_mainp';
		$this->db['password'] 	= 'e3r4t5E3R4T5';
		$this->db['database'] 	= 'u8038404_mainp';
		}
	public function dbwithvalue($args = array()) 
		{
		$this->db['server']		= $args['server'];
		$this->db['username'] 	= $args['username'];
		$this->db['password'] 	= $args['password'];
		$this->db['database'] 	= $args['database']; 
		}
 
	public function connect() 
		{
		$this->connection = mysqli_connect($this->server, $this->username, $this->password);
		mysqli_set_charset($this->connection,"utf8");
		$this->select_db(); 
		}
 
	public function disconnect() 
		{
		mysqli_close($this->connection);
		$this->connection = null; 
		}
 
	public function select_db() 
		{
		mysqli_select_db($this->connection, $this->database); 
		}
 
	public function query($sql) 
		{
		$this->result = mysqli_query($this->connection, $sql); 
		return mysqli_query($this->connection, $sql); 
		}
 
	public function is_connected()
		{
		return ($this->connection) ? true : false; 
		}
	public function getconnection()
		{
		return $this->connection; 
		}
	public function clean($dirty)
		{
		if (!is_array($dirty)) {
			$dirty = ereg_replace("[\'\")(;|`,<>]", "", $dirty);
			$dirty = mysqli_real_escape_string($this->connection, trim($dirty));
			$clean = stripslashes($dirty);
			return $clean; };
		$clean = array();
		foreach ($dirty as $p=>$data) {
			$data = ereg_replace("[\'\")(;|`,<>]", "", $data);
			$data = mysqli_real_escape_string($this->connection, trim($data));
			$data = stripslashes($data);
			$clean[$p] = $data; };
		return $clean; 
	}
 
}
?>