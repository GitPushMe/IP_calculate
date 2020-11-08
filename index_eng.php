<!-- Author: GitPusmMe (nikita.demin.1996@index.ru) -->

<!doctype html>
<html lang="ru">

	<head>

		<title>IP calculate</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Link google fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,900&display=swap" rel="stylesheet">
		<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>-->

		<!--<link rel="stylesheet" href="lib/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="lib/css/style.css"> <!-- Resource style -->

		<script src="lib/js/modernizr.js"></script> <!-- Modernizr -->
		<script src="lib/js/jquery-2.1.1.js"></script>
		<script src="lib/js/main.js"></script> <!-- Resource jQuery -->
  	
	</head>

	<body>

		<header>
			<nav class="cd-main-nav-wrapper">
				<ul class="cd-main-nav">
					<li><img src="img/icon.jpg" width="50" height="50"></li>-->
					<li><a href="index_eng.php">IP calculate</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="#0">IPv4</a></li>
					<li><a href="#0">IPv6</a></li>
					<li><a href="blog_eng.php">Blog</a></li>
					<li>
						<a href="#0" class="cd-subnav-trigger"><span>Language menu</span></a>
						<ul>
							<li class="go-back"><a href="#0">Menu</a></li>
							<li><a href="index.php">Russian</a></li>
							<li><a href="index_eng.php">English</a></li>
							<li><a href="#0"></a></li>
							<li><a href="#0" class="placeholder">Placeholder</a></li>
						</ul>
					</li>
				</ul> <!-- .cd-main-nav -->
			</nav> <!-- .cd-main-nav-wrapper -->
			<a href="#0" class="cd-nav-trigger">Menu<span></span></a>
		</header>
	
		<main class="cd-main-content">
			<!-- main content here -->
			<center>
					<form method="post" action="<?php print $_SERVER['PHP_SELF'] ?> ">
					<BR><BR>
					<table width="95%" align=center cellpadding=2 cellspacing=2 border=0>

					<BR>
					<table>
					  <tr>
					        <td>IP & Mask or CIDR:&nbsp;&nbsp;<br> </td>
					        <td><input type="text" name="my_net_info" value="" size="31" maxlength="32"></td>
					        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Start" name="subnetcalc">
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            &nbsp;</td>
					  </tr>
					</table></form><br>
						
			<?php
				require_once ("main_eng.php");
			?>
		</main>

	</body>

</html>