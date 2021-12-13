<?php 
require '../database.php';

$message = '';

if(!empty($_POST['id_teacher']) && !empty($_POST['id_course']) && !empty($_POST['id_schedule']) && !empty($_POST['name']) && !empty($_POST['color'])){
	$sql = "INSERT INTO class (id_teacher,id_course,id_schedule,name,color) VALUES (:id_teacher,:id_course, :id_schedule,:name,:color) ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id_teacher',$_POST['id_teacher']);
	$stmt->bindParam(':id_course',$_POST['id_course']);
	$stmt->bindParam(':id_schedule',$_POST['id_schedule']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':color',$_POST['color']);
	if ($stmt->execute()) {
		$message = "Clase creada correctamente";
	} else {
		$message = "Clase no creada";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>INSERT CLASS</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/headerad.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>AÑADIR CLASE</h1>

		<form action="insertclass.php" method="post">
			<input type="text" name="id_teacher" placeholder="Introduce el ID del profesor">
			<input type="text" name="id_course" placeholder="Introduce el ID del curso al que pertenece la clase">
			<input type="text" name="id_schedule" placeholder="Introduce el ID del horario de la clase">
			<input type="text" name="name" placeholder="Introduce el nombre de la clase">
			<input type="text" name="color" placeholder="Introduce el color de la clase">
			<br><br><input type="submit" name="Añadir clase">
		</form>
		
	</body>

</html>