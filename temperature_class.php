<?php
	
	require_once ('config.php');
	require_once ('MysqliDb.php');

	class temperature_entry
	{
		private $db;
		
		private $prefix = '';
		
		private $tables;
		
		private $users;

		public function __construct()
		{
			$this->db = new Mysqlidb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			

			if (!$this->db) {
				die('database_error');
			}
			
			$this->db->setPrefix($this->prefix);
			

			$this->tables = array(
				'temperature_entry' => array(
					'temperature' => 'int(3) not null',
					'entry_date' => 'varchar(255) not null',
					'entry_time' => 'varchar(255) not null',
				)
			);			
			
			// $this->createTables();
		}
		
		public function createTables()
		{
			foreach ($this->tables as $name => $fields) {
				$this->createTable($this->prefix.$name, $fields);
			}
		}
		
		public function createTable($name, $fields)
		{			
			$query = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT";
			
			foreach ($fields as $k => $v) {
				$query .= ", $k $v";
			}
			
			$query .= ')';

			$this->db->rawQuery($query);
			
		}
		
		public function addEntry($temp_entry)
		{
			$id = $this->db->insert('temperature_entry', $temp_entry);
			
			// if ($id) {
			// 	echo $reminder . ' has been added<br>';
			// }
			// else {
			// 	echo $reminder . ' has not been added.<br>';
			// }
		}
		public function getTemperatureEntry()
		{
			$result = $this->db->get('temperature_entry');
			return $result;
		}
		
		public function getLastUpdated()
		{
			$maxid = $this->db->query('SELECT MAX(id) FROM `temperature_entry`');
			$maxid = $maxid[0]["MAX(id)"];
			$row = $this->db->query('SELECT * FROM `temperature_entry` WHERE id='.$maxid);
			
			// if ($row) {
			//     $maxid = $row->maxid; 
			// }
			
			return $row[0];
		}
	}
