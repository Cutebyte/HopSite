<?php
	include 'libs/blog_engine.php';
?>
<style> <?php include 'blog.css'; ?> </style>
<div id="blog">
	<h1>Blog</h1>
	<?php
		#sayHello();
		if (!isset($_GET['post_id']))
			printAllEntries();
		else
			showPost($_GET['post_id']);
				
	?>
</div>
