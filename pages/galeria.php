<style> <?php include 'gallery.css'; ?> </style>
<div id="gallery">
	<h1>Galeria</h1>
	<?php
		if (isset($_GET['img_id']))
			echo "Kliknij obraz, aby wrócić...";
		else
			echo "Kliknij obraz, aby go otworzyć...";
	?>
	<script>
		function goBack() {
			window.history.back();
		}
	</script>
	<hr/>
	<?php
		if (isset($_GET['img_id'])) {
	$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "hop_blog";
	
			$connection = new mysqli($servername, $username, $password, $dbname);
	
			if ($connection->connect_error) {
				die("Error: " + $connection->connect_error);	
			}
	
			$sql = "SELECT idImage, title, description, file FROM gallery_images WHERE idImage = '" . $_GET['img_id'] . "'";
			$result = $connection->query($sql);
	
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<img id='big_img' onClick='goBack()' src='uploads/" . $row['file'] . "'></img><br/>";
					echo "<h1>" . $row['title'] . "</h1>\n<hr>";
					echo $row['description'];
				}
			}
			else
				echo "Brak obrazu!";
	
			$connection->close();
		} else {
	$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "hop_blog";
	
			$connection = new mysqli($servername, $username, $password, $dbname);
	
			if ($connection->connect_error) {
				die("Error: " + $connection->connect_error);	
			}
	
			$sql = "SELECT idImage, title, description, file FROM gallery_images";
			$result = $connection->query($sql);
	
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<div id='image_block'><a href='index.php?page=galeria&img_id=" . $row['idImage'] . "'><img src='uploads/" . $row['file'] . "'></img></a></div>";
				}
			}
			else
				echo "Brak obrazów!";
	
			$connection->close();
		}
	?>
</div>
