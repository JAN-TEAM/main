
<?php 
require '../database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['username'])){
	$sql = "INSERT INTO users_admin (username,name,email,password) VALUES (:username, :name, :email, :password) ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':username',$_POST['username']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':email',$_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam(':password',$_POST['password']);

	if ($stmt->execute()) {
		$message = "Usuario creado correctamente";
	} else {
		$message = "Usuario no creado";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>SIGNUP</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/header.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>REGISTRO DE ADMINISTRADOR</h1>
		<span>o <a href="login.php">Inicio de sesion</a>	</span>

		<form action="signup.php" method="post">
			<input type="text" name="username" placeholder="Introduce tu nombre de usuario">
			<input type="text" name="name" placeholder="Introduce tu nombre">
			<input type="text" name="email" placeholder="Introduce tu Email">
			<input type="password" name="password" placeholder="Introduce tu contraseña">
			<input type="submit" value="Enviar">
		</form>
	</body>

</html>