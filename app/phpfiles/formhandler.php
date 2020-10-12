<?php
//  header('Location: index.php');
session_start();


include_once "bd.php";

	if( (isset($_POST['submit'])) && ($_POST["content"] != '')){
		if($_POST['name'] === '')$_POST['name'] = 'Гость';

	$name = $_POST['name'];
	$content = $_POST['content'];

	$query = "INSERT INTO comments VALUES(NULL,:name,:content,NOW() )";
	$msg = $conn -> prepare($query);
	$msg -> execute(['name' => $name,'content' => $content]);

	$_SESSION['notification'] = 'Ваше сообщение успешно доставленно';
	echo "<script>location.href='../index.php';</script>";
	}

	else echo "Вернитесь и заполните форму для добавления своего комментария";

