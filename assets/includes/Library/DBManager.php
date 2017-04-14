<?php
require_once("DBI.php");
require_once("Loader.php");

function fatal_error($label = 'Fatal Error!' , $message='') {
	echo '<div style="border: 1px dashed #cc0000;font-family:Tahoma;background-color:#FBEEEB;width:100%;padding:10px;color:#cc0000;"><strong> '.$label.'</strong><br>'.$message.'</div>';
}

class DBManager {

	private $connection;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	private function open_connection() {
		@$this->connection = mysql_connect(DBH,DBU,DBPW);
			if(!$this->connection) {
			fatal_error("connection Failed!" , mysql_error());
			}  else {
				$db_select= mysql_select_db(DBN, $this->connection);
					if(!$db_select) {
					fatal_error("Database Selection Failed!" , mysql_error());
					}
				
					$db_charset= mysql_query("SET NAMES 'utf8'"); 
					if(!$db_charset) {
					fatal_error("Database charset Encoding Failed!" , mysql_error());
					}	
				}
	}
	
	function __construct() {
	$this->open_connection();
	$magic_quotes_active = get_magic_quotes_gpc();
	$real_escape_string_exists = function_exists( "mysql_real_escape_string" );

	}
	
	public function close_connection() {
		if(isset($this->connection)) {
		mysql_close($this->connection);
		unset($this->connection);		
		}
	}
	
	//db_backup function ...
	public function backup_database($tables = '*')
		{
		ini_set('max_execution_time', 300);

		  //get all of the tables
		  if($tables == '*')
		  {
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
			  $tables[] = $row[0];
			}
		  }
		  else
		  {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		  }
		  $return="";
		  //cycle through
		  foreach($tables as $table)
		  {
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
			  while($row = mysql_fetch_row($result))
			  {
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
				  $row[$j] = addslashes($row[$j]);
				  $row[$j] = preg_replace("#\n#","\\n",$row[$j]);
				  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
				  if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			  }
			}
			$return.="\n\n\n";
		  }
		//save file
		$filename ='Database backup ('.strftime('%B %d, %Y at %I,%M %p',time()).').sql';
		header('Content-type: text/appdb');
		header('Content-Disposition: attachment; filename="' . $filename);
		echo $return;
		}
	
	
	function autodbback($tables = '*') {
		ini_set('max_execution_time', 300);

		  //get all of the tables
		  if($tables == '*')
		  {
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
			  $tables[] = $row[0];
			}
		  }
		  else
		  {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		  }
		  $return="";
		  //cycle through
		  foreach($tables as $table)
		  {
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
			  while($row = mysql_fetch_row($result))
			  {
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
				  $row[$j] = addslashes($row[$j]);
				  $row[$j] = preg_replace("#\n#","\\n",$row[$j]);
				  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
				  if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			  }
			}
			$return.="\n\n\n";
		  }
		//save file
		$filename ='Database backup ('.strftime('%B %d, %Y at %I,%M %p',time()).').sql';
		
			$myFile = ADMINPANEL . DS . "resources" . DS . "auto" . DS .  "db_bkp" . DS . $filename;
			if ($fh = fopen($myFile, 'wb') ) {
				fwrite($fh, $return);
				fclose($fh);
				return $filename;
			} else {
				return false;
			}
			
		}
	
	public function query($sql) {
	
	$result = mysql_query($sql, $this->connection);
	$this->confirm_query($result);
	return $result;
	}
	
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists) { // PHP v4.3.0 or higher
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
		}
		return $value;
	}

	//database natural related functions .. 
	
	public function fetch_array($result) {
		return mysql_fetch_array($result);
	}

	public function num_rows($result) {
		return mysql_num_rows($result);
	}	
	
	public function insert_id() {
		return mysql_insert_id($this->connection);
	}
	
	public function affected_rows() {
		return mysql_affected_rows($this->connection);	
	}
	
	private function confirm_query($result) {
		if(!$result) {
			fatal_error ('Query Failed!', mysql_error());
		}
	}
}

$db = new DBManager();

?>