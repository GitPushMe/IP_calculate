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
		<link rel="stylesheet" href="lib/css/style_table.css"> <!-- Resource style -->

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
					<li><a href="index_eng.php">IP calculate</a></li>
					<li><a href="reg/?mode=reg#toregister">Registration/Authorization</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href=#botDiv>IPv4</a></li>
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

					echo ("Hello, Guest.");
						
 				}

 				if(isset($_POST['exit'])){

 					unset($_SESSION['login']);
 					session_destroy();
 					header('Location:'. BEZ_HOST .'calculate/index.php');
 					
 				}

				
			echo '<h1>Info</h1>

<p id="two">The network calculator calculates the network address, broadcast address, number of hosts, and range of valid addresses in the network. To calculate this data, specify the hosts IP address and network mask.
The network mask must be specified in the following format: XXX. XXX. XXX. X. You can also specify this data in "CIDR notation".
If the network mask data is not specified, the program will access data that is normally used for this type of network.
In order to show more clearly how the program calculates network IP addresses, the calculated data is given in binary format. The part of the address before the space represents information about network membership. The data specified here is called "network bits". The part following the space is responsible for host addresses. These are called host bits. In the broadcast address, their value is one; in the network address, it is 0.
The bits at the beginning indicate the network class. If the network is located in Intranet, this must be specified separately.</p>

				<h1>Reserving addresses for special functions</h1>

<p id="two">There are a number of IPv4 addresses saved for specific tasks. They are not used for global routing. The functions that are performed with their help include creating IP sockets, providing communications within the host, multicasting, registering addresses that have a special purpose, and others. These addresses can be used in private networks, in provider networks. Some of them are saved for later use </p>';	?>
			<table class="iksweb">
			<tbody>
				<tr>
					<td><b>Subnet</b></td>
					<td><b>Appointment</b></td>
				</tr>
				<tr>
					<td>0.0.0.0/8</td>	
					<td>Packet source addresses of "this" ("own") network are intended for local use on the host when creating IP sockets. The address 0.0.0.0/32 is used to specify the source address of the host itself.</td>
				</tr>
				<tr>
					<td>10.0.0.0/8</td>
					<td>For use in private networks.</td>
				</tr>
				<tr>
					<td>127.0.0.0/8</td>
					<td>Subnet for communications within the host.</td>
				</tr>
				<tr>
					<td>169.254.0.0/16</td>
					<td>Channel addresses; the subnet is used for automatic configuration of IP addresses in the absence of a DHCP server.</td>
				</tr>
				<tr>
					<td>172.16.0.0/12</td>
					<td>For use in private networks.</td>
				</tr>
				<tr>
					<td>100.64.0.0/10</td>
					<td>For use in service provider networks.</td>
				</tr>
				<tr>
					<td>192.0.0.0/24</td>
					<td>Registration of special-purpose addresses.</td>
				</tr>
				<tr>
					<td>192.0.2.0/24</td>
					<td>For examples in the documentation.</td>
				</tr>
				<tr>
					<td>192.168.0.0/16</td>
					<td>For use in private networks.</td>
				</tr>
				<tr>
					<td>198.51.100.0/24</td>
					<td>For examples in the documentation.</td>
				</tr>
				<tr>
					<td>198.18.0.0/15</td>
					<td>For performance testing stands.</td>
				</tr>
				<tr>
					<td>203.0.113.0/24</td>
					<td>For examples in the documentation.</td>
				</tr>
				<tr>
					<td>240.0.0.0/4</td>
					<td>Reserved for future use.</td>
				</tr>
				<tr>
					<td>255.255.255.255</td>
					<td>Restricted broadcast address.</td>
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
				
				<h1>IP калькулятор через форму IPv4</h1>
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
					</table>
					<a href="#topDiv"></a>
					<div id="botDiv"></div>
				</form><br>
						
			<?php
				require_once ("main_eng.php");
			?>
		</main>

	</body>

</html>

