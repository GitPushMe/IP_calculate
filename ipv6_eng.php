<!-- Author: GitPusmMe (nikita.demin.1996@index.ru) -->

<!doctype html>
<html lang="ru" class="no-js">

	<head>

		<title>IP калькулятор</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Link google fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,900&display=swap" rel="stylesheet">
		<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>-->

		<!--<link rel="stylesheet" href="lib/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="lib/css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" href="lib/css/style_table.css"> <!-- Resource style -->
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<script src="lib/js/modernizr.js"></script> <!-- Modernizr -->
		<script src="lib/js/jquery-2.1.1.js"></script>
		<script src="lib/js/main.js"></script> <!-- Resource jQuery -->

		<script type="text/javascript">

			$(document).ready(function () {
			    $("a").click(function () {
			        var elementClick = $(this).attr("href");
			        var destination = $(elementClick).offset().top;
			        if ($.browser.family === 'Yandex') {
			            $('body').animate({ scrollTop: destination }, 100); //1100 - скорость прокрутки
			        } else {
			            $('html').animate({ scrollTop: destination }, 100);
			        }
			        return false; 
			    });
			});

		</script>
  	
	</head>

	<body>

		<header>
			<nav class="cd-main-nav-wrapper">
				<ul class="cd-main-nav">
					<li><img src="img/icon.jpg" width="50" height="50"></li>-->
					<li><a href="index_eng.php">Main</a></li>
					<li><a href="reg/?mode=reg#toregister">Registration/Authorization</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="ipv4_eng.php">IPv4 calculator</a></li>
					<li><a href="ipv6_eng.php">IPv6 calculator</a></li>
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
		<?php 
				ini_set('display_errors', 'off');
				session_start();

				if (!empty($_SESSION['login'])){

					echo ('Hello, <b>'. $_SESSION['login'].'</b>. <BR> You are logged in and can work on the site.');
					echo ('<form action="" method="POST"> 
                            To change the user, you need to log out of your profile 
                           	<p class="login button"> 
                                <input type="submit" value="Exit" name="exit">
                            </form>');
 				}

 				else {

					echo ("<p> Hello, Guest.</p>");	
 				}

 				if(isset($_POST['exit'])){

 					unset($_SESSION['login']);
 					session_destroy();
 					header('Location:'. BEZ_HOST .'calculate/index.php');
 					
 				}

			echo '<center><h1>IP calculator IPv6</h1>'
			;	?>


		<center>
				
					<form method="post" action="<?php print $_SERVER['PHP_SELF'] ?> ">
					

					<table width="95%" align=center cellpadding=2 cellspacing=2 border=0>

					
					<table>
					  <tr>
					        <td><b>IP address and Network mask length (CIDR) or without:</b>&nbsp;&nbsp;<br> </td>
					        <td><input type="text" name="my_net_info" value="" size="31" maxlength="32"></td>
					        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Start" name="subnetcalc">
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            &nbsp;</td>
					  </tr>
					</table>
					<a href="#topDiv"></a>
					<div id="botDiv"></div>
				</form><br>
				<?php require_once ("main_eng.php");?>		
			</main>

			
	</body>

</html>