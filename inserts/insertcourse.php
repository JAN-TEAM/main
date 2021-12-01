<?php 
require '../database.php';

$message = '';

if(!empty($_POST['name']) && !empty($_POST['desct']) && !empty($_POST['dstart']) && !empty($_POST['dend']) && !empty($_POST['active'])){
	$sql = "INSERT INTO courses (name,description,date_start,date_end,active) VALUES (:name,:desct, :dstart,:dend,:active) ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':desct',$_POST['desct']);
	$stmt->bindParam(':dstart',$_POST['dstart']);
	$stmt->bindParam(':dend',$_POST['dend']);
	$stmt->bindParam(':active',$_POST['active']);
	if ($stmt->execute()) {
		$message = "Curso creado correctamente";
	} else {
		$message = "Curso no creado";
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

		<form action="insertcourse.php" method="post">
			<input type="text" name="name" placeholder="Introduce el nombre del curso">
			<input type="text" name="desct" placeholder="Introduce una breve descripcion">
			<label for="dstart">Fecha de inicio:</label>
			<input type="date" id="dstart" name="dstart">
			<br>
			<label for="dend">Fecha de finalizacion:</label>
			<input type="date" id="dend" name="dend"><br>
			<label for="active">¿Esta activo el curso?</label>	
			<select name="active" >
				<option value="1">Si</option>
				<option value="0">No</option>
			</select>
			<br><br><input type="submit" name="Añadir curso">
		</form>
		
	</body>

</html>