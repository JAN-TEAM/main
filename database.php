<?php  

	$server = 'localhost';
	$username = 'root';
	$password= '';
	$database = 'producto2';

try {
	$conn = new PDO('mysql:host=localhost;dbname=producto2;',$username,$password);
} catch (PDOException $e) {
	die('Connection Failed: '.$e->getMessage());
}

?>
