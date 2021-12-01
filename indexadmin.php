<?php 
require 'database.php';
?>


<html>
	<head>
		<meta charset="utf-8">
		<title>pannel prueba</title>
		<link href="https://fonts.googleapis.com/css?family=Numans">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		

	<h1>CURSOS DISPONIBLES</h1>
		<?php 
		$sql = "SELECT * FROM courses";
		$query = $conn->prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		echo "CURSO|NOMBRE|FECHA INICIO|FECHA FIN ";
		if(count($results)>0){
			foreach ($results as $result) {
				echo "<div>
					<span>".$result->id_course."</span>
					<span>".$result->name."</span>
					<span>".$result->date_start."</span>
					<span>".$result->date_end."</span>
					<span><a href=\"modcourse.php?id".$result->id_course."\">Modificar</a></span>
					<span><a href=\"delcourse.php?id".$result->id_course."\">Borrar</a></span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}

		?>
		<p><a href="inserts/insertcourse.php">Añadir un nuevo curso</a></p>

		<h1>CLASES DISPONIBLES</h1>
		<?php 
		$sql2 = "SELECT * FROM class";
		$query2 = $conn->prepare($sql2);
		$query2->execute();
		$results2=$query2->fetchAll(PDO::FETCH_OBJ);

		echo "CLASE|PROFESOR|CURSO|HORARIO|NOMBRE|COLOR ";
		if(count($results2)>0){
			foreach ($results2 as $result2) {
				echo "<div>
					<span>".$result2->id_class."</span>
					<span>".$result2->id_teacher."</span>
					<span>".$result2->id_course."</span>
					<span>".$result2->id_schedule."</span>
					<span>".$result2->name."</span>
					<span>".$result2->color."</span>
					<span><a href=\"modteacher.php?id".$result2->id_class."\">Modificar</a></span>
					<span><a href=\"delteahcer.php?id".$result2->id_class."\">Borrar</a></span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}
		?>
		<p><a href="inserts/insertcourse.php">Añadir una nueva clase</a></p>

		<h1>PROFESORES ACTIVOS</h1>
		<?php 
		$sql1 = "SELECT * FROM teachers";
		$query1 = $conn->prepare($sql1);
		$query1->execute();
		$results1=$query1->fetchAll(PDO::FETCH_OBJ);
		echo "ID|NOMBRE|APELLIDO|TELEFONO|NIF|EMAIL ";
		if(count($results1)>0){
			foreach ($results1 as $result1) {
				echo "<div>
					<span>".$result1->id_teacher."</span>
					<span>".$result1->name."</span>
					<span>".$result1->surname."</span>
					<span>".$result1->telephone."</span>
					<span>".$result1->nif."</span>
					<span>".$result1->email."</span>
					<span><a href=\"modteacher.php?id".$result1->id_teacher."\">Modificar</a></span>
					<span><a href=\"delteahcer.php?id".$result1->id_teacher."\">Borrar</a></span>
				</div>";
			}
		} else {echo "<p>No hay resultados</p>";}
		?>
		<p><a href="inserts/insertcourse.php">Añadir un nuevo profesor</a></p>
	</body>
	

</html>