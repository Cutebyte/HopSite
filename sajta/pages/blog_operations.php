<?php
	session_start();
	header("refresh:1; url=" . $_SESSION['previous_page']); 
	include("../libs/blog_engine.php");
	include("../libs/debug.php");
    
	if ($_GET['mode'] == "add")
		addPost($_POST["title"], $_POST["content"], $_POST['description']);
	if ($_GET['mode'] == "delete") {
		if (isset($_POST['post_id']))
			deletePost($_POST['post_id']);
		else
			echo "Nie podano id posta!";
		}
	if ($_GET['mode'] == "deleteC") {
		if (isset($_POST['comment_id']))
			deleteComment($_POST['comment_id']);
		else
			echo "Nie podano id posta!";
		}
	if ($_GET['mode'] == "more") {
		if (isset($_GET['id']))
			showPost($_GET['id']);
		else
			echo "Nie podano id posta!";
	}
	if ($_GET['mode'] == "add_comment") {
		if (isset($_GET['post_id']))
			addComment($_GET['post_id'],$_POST["nick"], $_POST["comment"]);
		else
			echo "Nie podano id posta!";
	}
?>

Za chwile zostaniesz przekierowany na bloga.
