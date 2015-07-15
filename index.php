<?php
session_start();									//Начало сессии
include ('user.php');
//include ('post.php');

if($_POST){
	if(isset($_POST['login'])){						//нажата кнопка с name="login"
		$user = new User();
		$user->login($_POST);
	}elseif(isset($_POST['register'])){
		$user = new User();
		$user->register($_POST);
	}elseif(isset($_POST['writePost'])){
		
	}
}


?>

<html>
<head>
<meta charset="utf8">
</head>
<body>

<form method="POST">
	<input name="name"><br>
	<input name="password" type="password"><br>
	<input name="login" type="submit" value="Войти"><br>
	<input name="email"><br>
	<input type="submit" name="register" value="Регистрация"><br>
</form>