
<?php

/*require_once("extensions/mcrypt/MCrypt.php");
require_once("extensions/phpmailer/PHPMailerAutoload.php");*/

class SystemModel {
	
	/**
     * Search for the user in the database.
     *
     * @param string $user
     * @param string $password
	 * @return integer
     */
	public function verifyUser($user, $password){
		
		/* Verify the existence of the user on the DB */
		$res = $this->searchUser($user, $password);

		if($res){
	
			/* Create the user's session */
			$this->createUserSession();
			return 1;
			
		}	
			
	}
	
	/**
     * Confirms the existence of the user.
     *
     * @param string $user
     * @param string $password
     * @return integer
     */
	private function searchUser($user, $password){

		/* Search for the user in the database */
		$sql = "SELECT * FROM user WHERE user = '" . $user . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		
		/* If the user exists verify the password */
		if(mysqli_num_rows($res)){
			
			DB::free($res);
			//$mcrypt = new MCrypt();

			//echo $mcrypt->encrypt("rigobertadt#2016");
			
			//if($row["password"] === $mcrypt->encrypt($password)){
			if($row["password"] === $password){
				$res = 1;
			} else {
				$res = 0;	
			}
			
		} else {
			$res = 0;	
		}
		return $res;
		
	}
	
	/**
     * Create the array's session for the user.
     *
     * @param string $user
     * @param string $password
     * @return null
     */
	private function createUserSession(){
		$_SESSION['logged_user'] = true;
	}

	/**
     * Close the user's session.
     *
     * @param string $user
     * @param string $password
     * @return null
     */
	public function logout(){
		
		/* Delete the session vars */
		session_unset();
		
		/* Close the user's session */
		session_destroy();	
		
	}
	
}

?>
