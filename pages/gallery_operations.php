<?php
	session_start();
	header("refresh:1; url=" . $_SESSION['previous_page']); 
	include("../libs/admin.php");
	include("../libs/debug.php");
    
	if ($_GET['mode'] == "image_upload")
		imageUpload($_POST['title'], $_POST['descriptionImg']);
	if ($_GET['mode'] == "image_delete")
		imageDelete($_POST['image_id']);
		
	function imageUpload($title, $description) {
		$target_dir = "../uploads/";
		$target_file = $target_dir . basename($_FILES["fileU"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if (file_exists($target_file)) {
		    echo "Plik istnieje!";
		    $uploadOk = 0;
		}
		if ($_FILES["fileU"]["size"] > 2000000) {
			 echo "Plik jest zbyt duży!";
			 $uploadOk = 0;
		}
		if ($uploadOk == 0) {
			 echo "Plik nie został wgrany na serwer.";
		// if everything is ok, try to upload file
		} else {
			 if (move_uploaded_file($_FILES["fileU"]["tmp_name"], $target_file)) {
				  	echo "Plik: ". basename( $_FILES["fileU"]["name"]). " został poprawnie wgrany na serwer.";
				  
					$username = "hopsite";
					$password = "fucky0uh4x0r";
					$servername = "localhost";
					$dbname = "hop_blog";
	
					$connection = new mysqli($servername, $username, $password, $dbname);
	
					if ($connection->connect_error) {
						die("Error: " + $connection->connect_error);	
					}
	
					$title = $connection->real_escape_string($title);
					$description = $connection->real_escape_string($description);
	
					$sql = "INSERT INTO gallery_images (title, description, file) VALUES ('" . $title . "', '" . $description . "', '" . $_FILES["fileU"]["name"] . "')";
	
					if ($connection->query($sql) === TRUE) {
						echo "Dane pliku dodano do bazy danych!<BR>";
					}
					else
						echo "Coś wybuchło podczas procesu dodawania nowych danych do bazy... ;-; INFO: " . $connection->error;
	
					$connection->close();
				  
			 } else {
				  echo "Coś poszło nie tak.";
			 }
		}
	}
	
	function imageDelete($index) {
		$username = "hopsite";
		$password = "fucky0uh4x0r";
		$servername = "localhost";
		$dbname = "hop_blog";
	
		$connection = new mysqli($servername, $username, $password, $dbname);
	
		if ($connection->connect_error) {
			die("Error: " + $connection->connect_error);	
		}
	
		echo "MySQL connection success<br/><br/>";
	
		$index = $connection->real_escape_string($index);
	
		$sql = "DELETE FROM gallery_images WHERE idImage = $index";
	
		if ($connection->query($sql) === TRUE) {
			echo "Usunięto!";
		}
		else
			echo "Coś wybuchło podczas procesu usuwania danych z bazy... ;-; INFO: " . $connection->error;
	
		$connection->close();
	}
?>

Za chwile zostaniesz przekierowany.
