<?php 

require '../database.php';
session_start();

if(!empty($_POST['username']) && !empty($_POST['password'])){
	$cons = $conn->prepare('SELECT id,username,pass FROM students WHERE username=:username');
	$cons->bindParam(':username', $_POST['username']);
	$cons->execute();
	$results = $cons->fetch(PDO::FETCH_ASSOC);
	$message='';

	if(count($results) > 0 && password_verify($_POST['pass'], $results['pass'])){
		//$_SESSION['id'] = $results['id'];
		//header('Location: /p6');
		$message = 'Login bien';
	} else {
		$message = 'Las credenciales no coinciden';
	}
}


?>




<html>
	<head>
		<meta charset="utf-8">
		<title>LOGIN STUDENT</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/header.php'?>

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>LOGIN</h1>
		<span>o <a href="signupstudent.php">SignUp</a>	</span>

		<form action="loginstudent.php" method="post">
			<input type="text" name="id" placeholder="Introduce tu nombre de usuario">
			<input type="password" name="pass" placeholder="Introduce tu contraseña">
			<input type="submit" value="Enviar">
		</form>
	</body>

</html>