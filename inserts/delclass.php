<?php 
require '../database.php';

$message = '';

if(!empty($_POST['id'])){
	$sql = "DELETE FROM class WHERE id_class=:id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id',$_POST['id']);
	if ($stmt->execute()) {
		$message = "Clase borrada correctamente";
	} else {
		$message = "Clase NO borrada";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>DELETE CLASS</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/headerad.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>BORRAR CLASE</h1>

		<form action="delclass.php" method="post">
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
			<br><br><input type="submit" name="Anñadir Curso">
		</form>
		<?php 
		$sql2 = "SELECT * FROM class";
		$query = $conn->prepare($sql2);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);

		if(count($results)>0){
			foreach ($results as $result) {
				echo "<div id='tabla'>
					<span>".$result->id_class."</span>
					<span>".$result->id_teacher."</span>
					<span>".$result->id_course."</span>
					<span>".$result->id_schedule."</span>
					<span>".$result->name."</span>
					<span>".$result->color."</span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}

		?>
	</body>

</html>