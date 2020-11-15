<!-- Author: GitPusmMe (nikita.demin.1996@index.ru) -->

<!DOCTYPE html>
<html lang="ru">

	<head>

		<title>BLOG IP_CALCULATE</title>
	       

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Link google fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,900&display=swap" rel="stylesheet">

		<!--<link rel="stylesheet" href="lib/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="lib/css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" href="lib/css/style_blog.css"> <!-- Resource style the blog -->
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<script src="lib/js/modernizr.js"></script> <!-- Modernizr -->
		<script src="lib/js/jquery-2.1.1.js"></script>
		<script src="lib/js/main.js"></script> <!-- Resource jQuery -->
  	
	</head>

	<body>

		<header>
			<nav class="cd-main-nav-wrapper">
				<ul class="cd-main-nav">
					<li><img src="img/icon.jpg" width="50" height="50"></li>-->	
					<li><a href="index.php">IP калькулятор</a></li>
					<li><a href="reg/?mode=reg#toregister">Регистрация/Авторизация</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="ipv4.php">IPv4</a></li>
					<li><a href="ipv6.php">IPv6</a></li>
					<li><a href="blog_rus.php">Блог</a></li>
					<li>
						<a href="#0" class="cd-subnav-trigger"><span>Языковое меню</span></a>
						<ul>
							<li class="go-back"><a href="#0">Меню</a></li>
							<li><a href="index.php">Русский</a></li>
							<li><a href="index_eng.php">Английский</a></li>
							<li><a href="#0"></a></li>
							<li><a href="#0" class="placeholder">Placeholder</a></li>
						</ul>
					</li>
				</ul> <!-- .cd-main-nav -->
			</nav> <!-- .cd-main-nav-wrapper -->
			<a href="#0" class="cd-nav-trigger">Меню<span></span></a>
		</header>
	
		<main class="cd-main-content">
			<article> 
		 		<!-- content -->
		 		<?php
		 				
						require_once dirname(__FILE__).'/conf_bd.php';

						$counter = mysql_query('SELECT COUNT(`id`) FROM `blog`');
						$counter = mysql_fetch_array($counter);
						$pages = intval( ($counter[0] - 1) / $conf['pp']) + 1;
						
						if (!empty($_SESSION["login"])){
		 					echo $_SESSION["login"];
						}
						else {
							echo ("Здравствуйте, Гость.");
						}
		 				

						if( isset($_GET['page'])) {
						// Да, пользователь что-то передал
						$page = (int) $_GET['page'];
							if ( $page > 0 && $page <= $pages ) {
								// Вычисляем с какого номера статьи надо начинать выводить
								$start = $page * $conf['pp'] - $conf['pp'];
								$sql = "SELECT * FROM `blog` ORDER BY `date` DESC LIMIT {$start}, {$conf['pp']}";
							}
							else { 
								$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $conf['pp']; 
								$page = 1;
							}
						}
						else {
						$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $conf['pp'];
						$page = 1;
						}
						$otvet = mysql_query($sql);
				?>
		 		<?php
			 		while($row = mysql_fetch_assoc($otvet)){
			 			echo "<section>
			 			<h2>{$row['title']}</h2>
			 			{$row['content']}
			 			<p class=\"date\">{$row['date']}</p>
			 			</section>";
			 		
			 		}
		 		?>
	 		</article>
	 		<nav>
				<?php
					if( $page > 1 ) echo '<a href="index.php?page='.($page-1).'">← туда</a>';
					if( $page < $pages ) echo '<a href="index.php?page='.($page+1).'">туда →</a>';
				?>
			</nav>   
	 	</main>
	</body>
</html>
			
