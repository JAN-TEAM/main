<?php 
require '../database.php';

$message = '';




if(!empty($_POST['id'])){
	$sql = "UPDATE courses SET name=:name, description=:desct, date_start=:dstart,date_end=:dend, active=:active WHERE id_course=:id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id',$_POST['id']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':desct',$_POST['desct']);
	$stmt->bindParam(':dstart',$_POST['dstart']);
	$stmt->bindParam(':dend',$_POST['dend']);
	$stmt->bindParam(':active',$_POST['active']);
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
		<title>SIGNUP</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/header.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<form action="modcourse.php" method="post">
			<label for="active">Identificador del curso:</label>	
			<select name="id">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
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
			<br><br><input type="submit" name="Anñadir Curso">
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