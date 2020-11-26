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
					<li><a href="index.php">Главная</a></li>
					<li><a href="reg/?mode=reg#toregister">Регистрация/Авторизация</a></li>
					<li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li><li><a href="#0"></a></li>
					<li><a href="ipv4.php">IPv4 калькулятор</a></li>
					<li><a href="ipv6.php">IPv6 калькулятор</a></li>
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

			echo '<center><h1>IP калькулятор через форму IPv6</h1>'
			;	?>


		<center>
				
					<form method="post" action="<?php print $_SERVER['PHP_SELF'] ?> ">
					





					       



<table>
					  <tr>
					        <td><b>IP адрес и Маска сети  или безклассовый адрес (CIDR):</b>&nbsp;&nbsp;<br> </td>
					        <td><input type="text" name="network" value="<?php echo $_REQUEST['network'] ?>" size="31" maxlength="64"></td>
					        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Start" name="subnetcalc">
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            &nbsp;</td>

					  </tr>
					</table>	

</form><br>

<?php
//Start table
print "<table cellpadding=\"2\">\n<COL span=\"4\" align=\"left\">\n" ;



if (empty($_REQUEST['network'])){
	tr('Используйте IP адрес и CIDR сетевую маску: 	&nbsp;', '2002:4559:1fe2::4559:1fe2/56');
	print $end ;
	exit ;
}

function tr(){
	echo "\t<tr>";
	for($i=0; $i<func_num_args(); $i++) echo "<td>".func_get_arg($i)."</td>";
	echo "</tr>\n";
}


ini_set('display_errors',1);

$maxSubNets = '2048'; // Stop memory leak from invalid input or large ranges

$superNet = $_REQUEST['network'];
$superNetMask = ''; // optional

$subNetCdr = $_REQUEST['subnet'];
$subNetMask = ''; // optional

// Calculate supernet mask and cdr
if (preg_match('~/~',$superNet)){  //if cidr type mask
	$charHost = inet_pton(strtok($superNet, '/'));
	$charMask = _cdr2Char(strtok('/'),strlen($charHost));
} else {
  $charHost = inet_pton($superNet);
  $charMask = inet_pton($superNetMask);
}


// Single host mask used for hostmin and hostmax bitwise operations
$charHostMask = substr(_cdr2Char(127),-strlen($charHost));

$charWC = ~$charMask; // Supernet wildcard mask
$charNet = $charHost & $charMask; // Supernet network address
$charBcst = $charNet | ~$charMask; // Supernet broadcast
$charHostMin = $charNet | ~$charHostMask; // Minimum host
$charHostMax = $charBcst & $charHostMask; // Maximum host
//$HostKol = $charHostMax - $charHostMin;
$host_total=(bindec(str_pad("",(128-$charMask),1)) - 1);
$host_total_pub=bindec(str_pad("",(128-$charMask),1));
// Print Results
echo '<br> Введенный адрес и CIDR сетевая маска: <b>' ,"$superNet",'</b>';
echo '<br>';
echo '<br> Данные: </b>';
echo '<br> Маска подсети: <b>' ,''.inet_ntop($charMask)."", '</b>';
echo '<br> Адрес сети: <b>',''.inet_ntop($charNet)."", '</b>';
echo '<br> Адрес шлюза по умолчанию (default gateway): <b>' ,''.inet_ntop($charNet)."",'</b>';
echo '<br> Минимальный IP на стороне клиента: <b>' ,''.inet_ntop($charHostMin).'','</b>';
echo '<br> Максимальный IP на стороне клиента: <b>' ,''.inet_ntop($charHostMax).'','</b>';
echo '<br> Адрес широковещательной рассылки (broadcast): <b>' ,''.inet_ntop($charBcst).'','</b>';
echo '<br> Количество публичных адресов сети: <b>' ,"$host_total_pub",'</b>';
echo '<br> Количество публичных адресов на стороне клиента: <b>' ,"$host_total",'</b>';

// Calculate subnet mask and cdr
if ($subNetCdr) {
	preg_match('/\d+/',$subNetCdr,$cdr);
  $subNetCdr = $cdr[0];
	$charSubMask = _cdr2Char($subNetCdr,strlen($charHost));
	$charSubWC = ~$charSubMask; // Subnet wildcard mask
	$superNetMask = inet_ntop($charSubMask);
} else {
	print "$end";
	exit;
}



// Convert to unsigned short so we can do some math
$intNet=_unpackBytes($charNet);
$intSubWC=_unpackBytes($charSubWC);

// Set up initial subnet address, it will be the same as the supernet address
$intSub = $intNet;
$charSub = $charNet;
$charSubs = array();


// Generate adjacent subnets until we leave the supernet
$n = 0;
while ((($charSub & $charMask) == $charNet) && $n < $maxSubNets) {
  array_push($charSubs,$charSub);
  $intSub = _addBytes($intSub,$intSubWC);
  $charSub = _packBytes($intSub);
  $n++;
}

echo '<tr><td colspan="2" bgcolor="#999999"></td><tr>';
      
// Output result
foreach ( $charSubs as $charSub ) {
	tr('Network:','<font color="blue"><a href="?network='.urlencode(inet_ntop( $charSub)."/"._char2Cdr($charSubMask)).'">'.inet_ntop( $charSub)."/"._char2Cdr($charSubMask)."</a></font>");
}

	print "$end";
	exit;






?>





					        <td><input type="text" name="my_net_info" value="" size="31" maxlength="32"></td>
					        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Start" name="subnetcalc">
					            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            &nbsp;</td>
					  </tr>
					</table>
					<a href="#topDiv"></a>
					<div id="botDiv"></div>
				</form><br>
				<?php require_once ("main_rus.php");?>		
			</main>

<?php 
// Convert array of short unsigned integers to binary
function _packBytes($array) {
  foreach ( $array as $byte ) {
		$chars .= pack('C',$byte);
	}
	return $chars;
}

// Convert binary to array of short integers
function _unpackBytes($string) {
	return unpack('C*',$string);
}

// Add array of short unsigned integers
function _addBytes($array1,$array2) {
	$result = array();
	$carry = 0;
	foreach ( array_reverse($array1,true) as $value1 ) {
		$value2 = array_pop($array2);
		if ( empty($result) ) { $value2++; }
		$newValue = $value1 + $value2 + $carry;
		if ( $newValue > 255 ) {
		  $newValue = $newValue - 256;
		  $carry = 1;
		} else {
		  $carry = 0;
		}
		array_unshift($result,$newValue);
	}
	return $result;
}

/* Useful Functions */

function _cdr2Bin ($cdrin,$len=4){
	if ( $len > 4 || $cdrin > 32 ) { // Are we ipv6?
		return str_pad(str_pad("", $cdrin, "1"), 128, "0");
	} else {
	  return str_pad(str_pad("", $cdrin, "1"), 32, "0");
	}
}

function _bin2Cdr ($binin){
	return strlen(rtrim($binin,"0"));
}

function _cdr2Char ($cdrin,$len=4){
	$hex = _bin2Hex(_cdr2Bin($cdrin,$len));
	return _hex2Char($hex);
}

function _char2Cdr ($char){
	$bin = _hex2Bin(_char2Hex($char));
	return _bin2Cdr($bin);
}

function _hex2Char($hex){
	return pack('H*',$hex);
}

function _char2Hex($char){
	$hex = unpack('H*',$char);
	return array_pop($hex);
}

function _hex2Bin($hex){
  $bin='';
  for($i=0;$i<strlen($hex);$i++)
    $bin.=str_pad(decbin(hexdec($hex{$i})),4,'0',STR_PAD_LEFT);
  return $bin;
}

function _bin2Hex($bin){
  $hex='';
  for($i=strlen($bin)-4;$i>=0;$i-=4)
    $hex.=dechex(bindec(substr($bin,$i,4)));
  return strrev($hex);
}
?>

	</body>

</html>