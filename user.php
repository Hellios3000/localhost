<?php

class user extends Mysqli{

	function __construct($config = array()){
		if(empty($config)){
			$config = array(
				'server'	=>	'localhost',
				'user'		=>	'root',
				'password'	=>	'',
				'database'	=>	'test'
			);
		}
		
		parent::__construct($config['server'], $config['user'], $config['password'], $config['database']);
	}
	
	function login($data){                                                  //блять, где у тебя есть $name?!?!?!?!
		$query = $this->query("SELECT * FROM `users` WHERE `login` = '{$data['name']}' LIMIT 1");
				
		if($query->num_rows >= 1){
			$password = md5($data['password']);
			
			while($row = $query->fetch_assoc()){
				if($row['password'] == $password){
					$_SESSION['user_id'] = $row['id'];
					return 'Привет, '.$row['login'].'!';
				}				
			}
		}else{
			return 'Такого пользователя нет в бд!';
		}
	}
	
	function register($data){
		$password = md5($data['password']);
		$query = $this->query("INSERT INTO `users` (`email`, `login`, `password`) VALUES ('{$data['email']}', '{$data['name']}', '{$password}')");
	}
}