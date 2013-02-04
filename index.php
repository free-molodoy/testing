<?php

$config = Array (
  'database' => Array (
		'server' 	=> 'localhost',
		'user'		=> 'user',
		'password'	=> 'mysq_passwd',
		'database'	=> 'guestbool',
		
		'prefix'	=> ''
		
		'tables'	=> Array (
			'messages' => 'messages'
		)
	), 
	'admin' => Array (
		'login'		=> 'root',
		'password'	=> 'passwd'
	)
);

constant ('MESSAGES_TABLE', $config['database']['prefix'] . $config['database']['tables']['messages']);

class guestbook {
	private $database_link = null;
	
	function __construct ()
	{
		global $config;
		
		$db_server 		= $config['database']['server'];
		$db_user 		= $config['database']['user'];
		$db_password 	= $config['database']['password'];
		$db_database 	= $config['database']['database'];
		
		$db_prefix		= $config['database']['prefix'];
		
		if (!$this->database_link = mysql_connect ($db_server, $db_user, $db_password)) {
			return false; // Не удалось подключится к mySql серверу
		} else {
			
			if (!mysql_dselect_db ($db_database, $this->database_link))
			{
				return false;
			} else 
				
			}
		}
	}
	
	public function get_messages ()
	{
		if (!$result = mysql_query ("SELECT * FROM `".MESSAGES_TABLE."`;", $this->database_link)) 
		{ 
			return false; 
		} else {
			$array_messages = Array ();
			foreach ($data = mysql_fetch_array ($result))
			{
				$array_messages[] = $data;
			}
			
			return $array_messages;
			
		} else { 
			return false; 
		}
	}
}
?>
