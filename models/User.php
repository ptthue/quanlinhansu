<?php
include_once('library/Database.php');
class User extends Database{
	
	protected $user_id = NULL;
	protected $user_full = NULL;
	protected $user_name = NULL;
	protected $user_pass = NULL;
	protected $user_mail = NULL;
	protected $user_level = NULL;
	
	function __construct(){
		$this->connect();	
	}
	
	public function set_user_id($user_id){
		$this->user_id = $user_id;
	}
	public function get_user_id(){
		return $this->user_id;
	}
	//
	public function set_user_full($user_full){
		$this->user_full = $user_full;
	}
	public function get_user_full(){
		return $this->user_full;
	}
	//
	public function set_user_name($user_name){
		$this->user_name = $user_name;
	}
	public function get_user_name(){
		return $this->user_name;
	}
	//
	public function set_user_pass($user_pass){
		$this->user_pass = $user_pass;
	}
	public function get_user_pass(){
		return $this->user_pass;
	}
	//
	public function set_user_mail($user_mail){
		$this->user_mail = $user_mail;
	}
	public function get_user_mail(){
		return $this->user_mail;
	}
	//
	public function set_user_level($user_level){
		$this->user_level = $user_level;
	}
	public function get_user_level(){
		return $this->user_level;
	}
	
	public function login(){
		
		$sql = "SELECT * FROM users
				WHERE user_name = '$this->user_name'
				AND user_pass = '$this->user_pass'";
		$this->query($sql);
		if($this->num_rows() > 0){
			$_SESSION['user_name'] = $this->user_name;
			$_SESSION['user_pass'] = $this->user_pass;
		}
		else{
			return 'login fail';	
		}
	}
	public function add(){
		
		$sql = "SELECT * FROM users
				WHERE user_name = '$this->user_name'";
		$this->query($sql);
		if($this->num_rows() > 0){
			return 'user exist';
		}
		else{
			$sql = "INSERT INTO users(user_full, user_name, user_pass, user_mail, user_level)
					VALUES('$this->user_full',
						   '$this->user_name', 
						   '$this->user_pass', 
						   '$this->user_mail', 
						   '$this->user_level');";
			$this->query($sql);	
			
		}
	}
	public function edit(){
		
		$sql = "SELECT * FROM users
				WHERE user_name = '$this->user_name'
				AND user_id != $this->user_id
				";
		$this->query($sql);
		if($this->num_rows() > 0){
			return  'user exist';
		}
		else{
			$sql = "UPDATE users SET user_full = '$this->user_full',
									 user_name = '$this->user_name',
									 user_pass = '$this->user_pass',
									 user_mail = '$this->user_mail',
									 user_level = $this->user_level
					WHERE user_id = $this->user_id";
			$this->query($sql);
		}
		
	}
	public function del(){
		$sql = "DELETE FROM users
				WHERE user_id = $this->user_id";
		$this->query($sql);
	}
	
}



/*$User = new User();
$User->set_user_id(9);
$User->set_user_full('Le Thi B');
$User->set_user_name('admin567');
$User->set_user_pass('233333');
$User->set_user_mail('lethib222222@gmail.com');
$User->set_user_level(2);
$User->edit();*/


?>