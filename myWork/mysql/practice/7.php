<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data
*/
	$servername = 'localhost';
	$username = 'root';
	$password = '';

	//create connection
	$connection = new mysqli($servername, $username, $password);
	//check connection
	if($connection->connect_error) {
		die('connection failed ' . $connection->connect_error);
	}

	//create database 
	// $sql = "CREATE DATABASE excercise7";
	// $sql_useDatabase = "USE excercise7";
	// if($connection->query($sql) && $connection->query($sql_useDatabase)) {
	// 	echo 'database created successfully and in use';
	// } else {
	// 	echo 'error connecting to the database ' . $connection->error;
	// }

	$sql_useDatabase = "USE excercise7";
	if($connection->query($sql_useDatabase)) {
		echo 'database created successfully and in use';
	} else {
		echo 'error connecting to the database ' . $connection->error;
	}

	// // create a new table 
	// $sql_createNewTable = "CREATE TABLE Persons (
	// 	id int,
	// 	username varchar(255),
	// 	city varchar(255) 
	// );";
	// if($connection->query($sql_createNewTable)) {
	// 	echo 'databases table created succesfully';
	// } else {
	// 	echo 'error creating new table ' . $connection->error;
	// }

	// $sql_insertData = "INSERT INTO Persons(id, username, city) VALUES (1, 'Marcos Carbonell', 'Heidelberg')";
	// $sql_insertData2 = "INSERT INTO Persons(id, username, city) VALUES (2, 'Lehr Benjamin', 'Mannheim')";
	// $sql_insertData3 = "INSERT INTO Persons(id, username, city) VALUES (3, 'Cavallaro Andre', 'Mannheim')";
	// if($connection->query($sql_insertData2) && $connection->query($sql_insertData3)) {
	// 	echo 'data succesfully inserted';
	// } else {
	// 	echo 'the data was not inserted into the database'; 
	// }
	$query = "SELECT * FROM Persons";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)) {
		echo "<pre>";
		echo var_dump($row);
		echo "</pre>";
	}

	$connection->close();
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>
