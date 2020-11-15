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
					<li><a href="index.php">IP калькулятор</a></li>
					<li><a href="reg/?mode=reg#toregister">Регистрация/Авторизация</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="#botDiv">IPv4</a></li>
					<li><a href="#0">IPv6</a></li>
					<li><a href="blog_eng.php">Блог</a></li>
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
				ini_set('display_errors', 'off');
				session_start();

				if (!empty($_SESSION['login'])){

					echo ('<p>Здравствуйте, <b>'. $_SESSION['login'].'</b>. <BR> Вы авторизированы и можете работать на сайте.<p>');
					echo ('<form action="" method="POST"> 
                            Для смены пользователя требуется выйти из своего профиля 
                           	<p class="login button"> 
                                <input type="submit" value="Выход" name="exit">
                            </form>');
 				}

 				else {

					echo ("<p> Здравствуйте, Гость.</p>");	
 				}

 				if(isset($_POST['exit'])){

 					unset($_SESSION['login']);
 					session_destroy();
 					header('Location:'. BEZ_HOST .'calculate/index.php');
 					
 				}

			echo '<center><h1>Информация</h1>

<p id="two">Калькулятор сети производит расчет адреса сети, широковещательного адреса, количество хостов и диапазон допустимых адресов в сети. Для того, чтобы рассчитать эти данные, укажите IP-адрес хоста и маску сети.
Маску сети необходимо указывать в следующем виде: ХХХ.ХХХ.ХХХ.Х. Можно указать эти данные и в "CIDR notation".
Если данные маски сети не указаны, программа обратится к данным, которые обычно используются для сетей этого типа.
Для того, чтобы более наглядно показать, как рассчитываются программой IP-адреса сетей, рассчитанные данные приведены в двоичном формате. Часть адреса перед пробелом отражает сведения о принадлежности к сети. Указанные здесь данные носят название "битов сети". Часть, следующая за пробелом, отвечает за адреса хостов. Они именуются битами хостов. В широковещательном адресе их значение равно единице, в адресе сети оно составляет 0.
Биты, находящиеся в начале, обозначают класс сети. Если сеть находится в Intranet, это необходимо указать отдельно.</p>

				<h1>Резервация адресов для особых функций</h1>

<p id="two"> Имеется ряд IPv4 адресов, сохраненных для определенных задач. Они не используются для глобальной маршрутизации. К функциям, которые выполняются с их помощью, относится создание сокетов IP, обеспечение коммуникаций внутри хоста, многоадресная рассылка, регистрация адресов, имеющих специальное назначение, и др. Эти адреса могут быть использованы в частных сетях, в провайдерских сетях. Часть из них сохранена для последующего использования:</p2> </center>';	?>
		<table class="iksweb">
			<tbody>
				<tr>
					<td><b>Подсеть</b></td>
					<td><b>Назначение</b></td>
				</tr>
				<tr>
					<td>0.0.0.0/8</td>	
					<td>Адреса источников пакетов "этой" ("своей") сети, предназначены для локального использования на хосте при создании сокетов IP. Адрес 0.0.0.0/32 используется для указания адреса источника самого хоста.</td>
				</tr>
				<tr>
					<td>10.0.0.0/8</td>
					<td>Для использования в частных сетях.</td>
				</tr>
				<tr>
					<td>127.0.0.0/8</td>
					<td>Подсеть для коммуникаций внутри хоста.</td>
				</tr>
				<tr>
					<td>169.254.0.0/16</td>
					<td>Канальные адреса; подсеть используется для автоматического конфигурирования адресов IP в случает отсутствия сервера DHCP.</td>
				</tr>
				<tr>
					<td>172.16.0.0/12</td>
					<td>Для использования в частных сетях.</td>
				</tr>
				<tr>
					<td>100.64.0.0/10</td>
					<td>Для использования в сетях сервис-провайдера.</td>
				</tr>
				<tr>
					<td>192.0.0.0/24</td>
					<td>Регистрация адресов специального назначения.</td>
				</tr>
				<tr>
					<td>192.0.2.0/24</td>
					<td>Для примеров в документации.</td>
				</tr>
				<tr>
					<td>192.168.0.0/16</td>
					<td>Для использования в частных сетях.</td>
				</tr>
				<tr>
					<td>198.51.100.0/24</td>
					<td>Для примеров в документации.</td>
				</tr>
				<tr>
					<td>198.18.0.0/15</td>
					<td>Для стендов тестирования производительности.</td>
				</tr>
				<tr>
					<td>203.0.113.0/24</td>
					<td>Для примеров в документации.</td>
				</tr>
				<tr>
					<td>240.0.0.0/4</td>
					<td>Зарезервировано для использования в будущем.</td>
				</tr>
				<tr>
					<td>255.255.255.255</td>
					<td>Ограниченный широковещательный адрес.</td>
				</tr>
			</tbody>
		</table>

		<center><p id="tree">Зарезервированные адреса, которые маршрутизируются глобально:</p></center>
		
		<table class="iksweb">
			<tbody>
				<tr>
					<td><b>Подсеть</b></td>
					<td><b>Назначение</b></td>
				</tr>
				<tr>
					<td>192.88.99.0/24</td>	
					<td>Используются для рассылки ближайшему узлу. Адрес 192.88.99.0/32 применяется в качестве ретранслятора при инкапсуляции IPv6 в IPv4 (6to4)</td>
				</tr>
				<tr>
					<td>224.0.0.0/4</td>	
					<td>Используются для многоадресной рассылки.</td>
				</tr>

		</table>
		<center>
		<h1>Как рассчитать сеть при помощи калькулятора</h1>
		<p id="two"> Имеется ряд IPv4 адресов, сохраненных для определенных задач. Они не используются для глобальной маршрутизации. К функциям, которые выполняются с их помощью, относится создание сокетов IP, обеспечение коммуникаций внутри хоста, многоадресная рассылка, регистрация адресов, имеющих специальное назначение, и др. Эти адреса могут быть использованы в частных сетях, в провайдерских сетях. Часть из них сохранена для последующего использования:</p2> </center>

		<br><hr>

		<center>
				

					<a href="#topDiv"></a>
					<div id="botDiv"></div>
				</form>
	
			</main>

			
	</body>

</html>