
<?php

class User {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idUser;

	/**
     * User's user.
     *
     * @var string
     */
	private $user;

	/**
     * User's password.
     *
     * @var string
     */
	private $password;

	/**
     * User's username.
     *
     * @var string
     */
	private $username;

	/**
     * User's email.
     *
     * @var string
     */
	private $email;
	
	/**
     * Initial constructor.
     *
     * @param integer $idUser
     * @param string $user
     * @param string $password
     * @param string $username
     * @param string $email
     * @return null
     */
	public function __construct(integer $idUser, string $user, string $password, string $username, string $email){
		$this->idUser = $idUser;
		$this->user = $user;
		$this->descripcion = $descripcion;
		$this->username = $username;
		$this->email = $email;
	}
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdUser(){
		return $this->idUser;	
	}

	/**
     * Get the user's user.
     *
     * @return $string
     */
	public function getUser(){
		return $this->user;	
	}
	
	/**
     * Get the user's password.
     *
     * @return $string
     */
	public function getPassword(){
		return $this->password;	
	}

	/**
     * Get the user's username.
     *
     * @return $string
     */
	public function getUsername(){
		return $this->username;	
	}

	/**
     * Get the user's email.
     *
     * @return $string
     */
	public function getEmail(){
		return $this->email;	
	}

}

?>
