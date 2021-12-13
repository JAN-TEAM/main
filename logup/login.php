<?php 

require '../database.php';
session_start();

if(!empty($_POST['email']) && !empty($_POST['password'])){
	$cons = $conn->prepare('SELECT id_user_admin,email,password FROM users_admin WHERE email=:email');
	$cons->bindParam(':email', $_POST['email']);
	$cons->execute();
	$results = $cons->fetch(PDO::FETCH_ASSOC);
	$message='';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
		$_SESSION['id_user_admin'] = $results['id'];
		header('../indexadmin.php');
	} else {
		$message = 'Las credenciales no coinciden';
	}
}

?>




<html>
	<head>
		<meta charset="utf-8">
		<title>LOGIN</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/header.php'?>

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>INICIO DE SESION DE ADMISTRADOR</h1>
		<span>o <a href="signup.php">Registro</a>	</span>

		<form action="login.php" method="post">
			<input type="text" name="email" placeholder="Introduce tu Email">
			<input type="password" name="password" placeholder="Introduce tu contraseña">
			<input type="submit" value="Enviar">
		</form>
	</body>

</html>