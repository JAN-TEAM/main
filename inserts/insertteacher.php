<?php 
require '../database.php';

$message = '';

if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['telephone']) && !empty($_POST['nif']) && !empty($_POST['email'])){
	$sql = "INSERT INTO teachers (name,surname,telephone,nif,email) VALUES (:name,:surname, :telephone,:nif,:email) ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name',$_POST['name']);
	$stmt->bindParam(':surname',$_POST['surname']);
	$stmt->bindParam(':telephone',$_POST['telephone']);
	$stmt->bindParam(':nif',$_POST['nif']);
	$stmt->bindParam(':email',$_POST['email']);
	if ($stmt->execute()) {
		$message = "Profesor creado correctamente";
	} else {
		$message = "Profesor no creado";
	}

}
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>INSERT TEACHER</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body>
		
		<?php require '../partials/headerad.php';?>	

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>

		<h1>AÑADIR PROFESOR</h1>

		<form action="insertteacher.php" method="post">
			<input type="text" name="name" placeholder="Introduce el nombre del profesor">
			<input type="text" name="surname" placeholder="Introduce el/los apellido/s del profesor">
			<input type="text" name="telephone" placeholder="Introduce el número de teléfono">
			<input type="text" name="nif" placeholder="Introduce el NIF del profesor">
			<input type="text" name="email" placeholder="Introduce el email del profesor">
			<br><br><input type="submit" name="Añadir profesor">
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