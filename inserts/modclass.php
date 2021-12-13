<?php 
require '../database.php';

$message = '';




if(!empty($_POST['id'])){
	$sql = "UPDATE class SET id_teacher=:id_teacher, id_course=:id_course, id_schedule=:id_schedule,name=:name, color=:color WHERE id_class=:id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id',$_POST['id']);
	$stmt->bindParam(':id_teacher',$_POST['id_teacher']);
	$stmt->bindParam(':id_course',$_POST['id_course']);
	$stmt->bindParam(':id_schedule',$_POST['id_schedule']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':color',$_POST['color']);
	if ($stmt->execute()) {
		$message = "Curso editado correctamente";
	} else {
		$message = "Curso NO editado";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>MODIFY CLASS</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/headerad.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>MODIFICAR CLASE</h1>

		<form action="modclass.php" method="post">
			<label for="id">Identificador de la clase:</label>	
			<select name="id">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
			<input type="text" name="id_teacher" placeholder="Introduce el ID del profesor">
			<input type="text" name="id_course" placeholder="Introduce el ID del curso ">
			<input type="text" name="id_schedule" placeholder="Introduce el ID del horario de la clase">
			<input type="text" name="name" placeholder="Introduce el nombre de la clase">
			<input type="text" name="color" placeholder="Introduce el color de la clase">
			<br><br><input type="submit" name="Añadir clase">
		</form>
		<?php 
		$sql2 = "SELECT * FROM courses";
		$query = $conn->prepare($sql2);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);

		if(count($results)>0){
			foreach ($results as $result) {
				echo "<div>
					<span>".$result->id_course."</span>
					<span>".$result->name."</span>
					<span>".$result->description."</span>
					<span>".$result->date_start."</span>
					<span>".$result->date_end."</span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}

		?>
	</body>

</html>