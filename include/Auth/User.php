<?php
class User{
	private $username=null;
	private $password=null;
	private $name="Admin";
	private $level=1;
	
	public function  User($user, $pass){
		$this->username=$user;
		$this->password=$pass;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getLevel(){
		return $this->level;
	}
}