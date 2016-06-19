<!DOCTYPE html>
<?php
	session_start();
	$_SESSION['previous_page'] = "http://hop.cutebyte.net" . $_SERVER['REQUEST_URI'];
	include('libs/debug.php');
	if (isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 'main';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CuteByte.net - <?php echo $page;?></title>
		<link rel="stylesheet" type="text/css" href="css/baseStyle.css">
		<script src="libs/jquery-1.11.1.js"></script>
		<script src="libs/functions.js"></script>
	</head>
	<body>
		<main>
			<center>
			<header>
				<span>
				<script>
					rainbowText("CuteByte.net");
				</script>
				</span>
			</header>
			<nav>
				<div class="nav-content">
					<center>
						<?php
							$podstrony = array('Galeria', 'Blog', 'Main', 'Projekty', 'Pliki');
							$podstrony2 = array('galeria', 'blog', 'main', 'projekty', 'pliki');
							$key = array_search($page, $podstrony2);
							if ($page == null) $key = 2;
							$result = '	<a href="?page=#-2#"><div class="leftNav">
												*-2*
											</div></a>
											<a href="?page=#-1#"><div class="leftNav">
												*-1*
											</div></a>
											<a href="?page=#0#"><div class="centerNav">
												*0*
											</div></a>
											<a href="?page=#1#"><div class="rightNav">
												*1*
											</div></a>
											<a href="?page=#2#"><div class="rightNav">
												*2*
											</div></a>';
							$val = $key;
							$result = str_replace("*0*", $podstrony[$val], $result);
							$result = str_replace("#0#", $podstrony2[$val], $result);
							$val = $key-1;
							if ($val < 0) $val = 5+$val;
							$result = str_replace("*-1*", $podstrony[$val], $result);
							$result = str_replace("#-1#", $podstrony2[$val], $result);
							$val = $key-2;
							if ($val < 0) $val = 5+$val;
							$result = str_replace("*-2*", $podstrony[$val], $result);
							$result = str_replace("#-2#", $podstrony2[$val], $result);
							$val = $key+1;
							if ($val > 4) $val = $val-5;
							$result = str_replace("*1*", $podstrony[$val], $result);
							$result = str_replace("#1#", $podstrony2[$val], $result);
							$val = $key+2;
							if ($val > 4) $val = $val-5;
							$result = str_replace("*2*", $podstrony[$val], $result);
							$result = str_replace("#2#", $podstrony2[$val], $result);
							echo $result;
						?>
					</center>
				</div>
			</nav>
			<article>
				<?php
					if (file_exists("pages/$page.php")) 
						include("pages/$page.php");
					else 
						include("pages/404.php");
				?>
			</article>
			</center>
		</main>
		<div id='admin_panel_clicker'>/\<a href='index.php?page=admin_panel'>Admin</a></div>
	</body>
</html>
