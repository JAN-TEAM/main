<?php 
require '../database.php';

$message = '';




if(!empty($_POST['id'])){
	$sql = "UPDATE teachers SET name=:name, surname=:surname, telephone=:telephone,nif=:nif, email=:email WHERE id_teacher=:id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id',$_POST['id']);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':surname',$_POST['surname']);
	$stmt->bindParam(':telephone',$_POST['telephone']);
	$stmt->bindParam(':nif',$_POST['nif']);
	$stmt->bindParam(':email',$_POST['email']);
	if ($stmt->execute()) {
		$message = "Profesor editado correctamente";
	} else {
		$message = "Curso NO editado";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>MODIFY TEACHER</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/headerad.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>MODIFICAR PROFESOR</h1>

		<form action="modteacher.php" method="post">
			<label for="active">Identificador del profesor:</label>	
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
			<input type="text" name="surname" placeholder="Introduce el/los apellido/s del profesor">
			<input type="text" name="telephone" placeholder="Introduce el número de teléfono">
			<input type="text" name="nif" placeholder="Introduce el NIF del profesor">
			<input type="text" name="email" placeholder="Introduce el email del profesor">
			<br><br><input type="submit" name="Anñadir Curso">
		</form>
		<?php 
		$sql2 = "SELECT * FROM teachers";
		$query = $conn->prepare($sql2);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		echo "ID|NOMBRE|APELLIDO|TELEFONO|NIF|EMAIL <br> ";
		if(count($results)>0){
			foreach ($results as $result) {
				echo "<div>
					<span>".$result->id_teacher."</span>
					<span>".$result->name."</span>
					<span>".$result->surname."</span>
					<span>".$result->telephone."</span>
					<span>".$result->nif."</span>
					<span>".$result->email."</span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}

		?>
	</body>

</html>