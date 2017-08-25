
<?php

class DB {
	
	/**
     * PHP connection.
     *
     * @var string
     */
	public static $connection;
	
	/**
     * Connect to the database.
     *
     * @return null
     */
	public static function connect(){
		if($_SERVER["HTTP_HOST"] === "localhost"){
			DB::$connection = mysqli_connect("localhost", DB_USER, DB_PASSWORD, DB_NAME);
		} else {
			DB::$connection = mysqli_connect("localhost", DB_USER, DB_PASSWORD, DB_NAME);
		}
		
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	/**
     * Make a sql query to the database.
     *
     * @param string $sql
     * @return integer
     */
	public static function query($sql){
		DB::connect();
		$res =  mysqli_query(DB::$connection, $sql);
		DB::close();
		return $res;
	}
	
	/**
     * Free the last query made to the database.
     *
     * @param integer $res
     * @return null
     */
	public static function free($res){
		mysqli_free_result($res);
	}
	 
	/**
     * Close the connection on the database.
     *
     * @return null
     */
	public static function close(){
		mysqli_close(DB::$connection);
	}
	
}

?>
