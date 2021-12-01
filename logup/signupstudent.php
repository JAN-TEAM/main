
<?php 
require '../database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['surname']) && !empty($_POST['telephone']) && !empty($_POST['nif']) && !empty($_POST['datereg'])){

	$sql = "INSERT INTO students (username,pass,email,name,surname,telephone,nif,date_registered) VALUES (:username, :password, :email, :name, :surname, :telephone, :nif, :datereg)";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':username',$_POST['username']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam(':password',$_POST['password']);
	$stmt->bindParam(':email',$_POST['email']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':surname',$_POST['surname']);
	$stmt->bindParam(':telephone',$_POST['telephone']);
	$stmt->bindParam(':nif',$_POST['nif']);
	$stmt->bindParam(':datereg',$_POST['datereg']);

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

		<form action="signupstudent.php" method="post">
			<input type="text" name="username" placeholder="Introduce tu nombre de usuario">
			<input type="password" name="password" placeholder="Introduce tu contraseña">						
			<input type="text" name="email" placeholder="Introduce tu Email">
			<input type="text" name="name" placeholder="Introduce tu nombre">
			<input type="text" name="surname" placeholder="Introduce tus apellidos">
			<input type="text" name="telephone" placeholder="Introduce tu numero de telefono">
			<input type="text" name="nif" placeholder="Introduce tu NIF">
				<label for="datereg">Introduce la fecha y hora de registro:</label><br>
			<input type="datetime-local" name="datereg"><br><br>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>