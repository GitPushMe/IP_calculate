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
					<li><a href="index_rus.php">IP калькулятор</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="#0">IPv4</a></li>
					<li><a href="#0">IPv6</a></li>
					<li><a href="#0">Блог</a></li>
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
			<!-- main content here -->
		<?php 

				session_start();

				if (!empty($_SESSION['login'])){

					echo ('Здравствуйте, '. $_SESSION['login'].'. <BR> Вы авторизированы и можете работать на сайте.');

 				}

 				else {

					echo ("Здравствуйте, Гость.");
						
 				}
				
			echo '<br><h1>Инфо</h1><br>

Калькулятор сети производит расчет адреса сети, широковещательного адреса, количество хостов и диапазон допустимых адресов в сети. Для того, чтобы рассчитать эти данные, укажите IP-адрес хоста и маску сети.
Маску сети необходимо указывать в следующем виде: ХХХ.ХХХ.ХХХ.Х. Можно указать эти данные и в "CIDR notation".
Если данные маски сети не указаны, программа обратится к данным, которые обычно используются для сетей этого типа.
Для того, чтобы более наглядно показать, как рассчитываются программой IP-адреса сетей, рассчитанные данные приведены в двоичном формате. Часть адреса перед пробелом отражает сведения о принадлежности к сети. Указанные здесь данные носят название "битов сети". Часть, следующая за пробелом, отвечает за адреса хостов. Они именуются битами хостов. В широковещательном адресе их значение равно единице, в адресе сети оно составляет 0.
Биты, находящиеся в начале, обозначают класс сети. Если сеть находится в Intranet, это необходимо указать отдельно.<br>

				<br><h1>Резервация адресов для особых функций</h1><br>

Имеется ряд IPv4 адресов, сохраненных для определенных задач. Они не используются для глобальной маршрутизации. К функциям, которые выполняются с их помощью, относится создание сокетов IP, обеспечение коммуникаций внутри хоста, многоадресная рассылка, регистрация адресов, имеющих специальное назначение, и др. Эти адреса могут быть использованы в частных сетях, в провайдерских сетях. Часть из них сохранена для последующего использования.<br>
TEST 
wf
wordwrap(fe==)';	?>
			<center>
					<form method="post" action="<?php print $_SERVER['PHP_SELF'] ?> ">
					<BR><BR>
					<table width="95%" align=center cellpadding=2 cellspacing=2 border=0>

					<BR>
					<table>
					  <tr>
					        <td>IP адрес и Маска сети  или безклассовый адрес (CIDR):&nbsp;&nbsp;<br> </td>
					        <td><input type="text" name="my_net_info" value="" size="31" maxlength="32"></td>
					        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Start" name="subnetcalc">
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            &nbsp;</td>
					  </tr>
					</table></form><br>
				<?php require_once ("main_rus.php");?>		
			</main>
			
	</body>

</html>