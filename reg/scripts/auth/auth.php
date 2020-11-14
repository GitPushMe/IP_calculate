<?php
 /**
 * Обработчик формы авторизации
 * Авторизация пользователя
 */
 
 //Ключ защиты
 if(!defined('BEZ_KEY'))
 {
     header("HTTP/1.1 404 Not Found");
     exit(file_get_contents('../../404.html'));
 }
 
 //Если нажата кнопка то обрабатываем данные
 if(isset($_POST['submit']))
 {
	if(empty($_POST['email']))
		$err[] = 'Не введен Логин';
	
	if(empty($_POST['pass']))
		$err[] = 'Не введен Пароль';
		
	//Проверяем наличие ошибок и выводим пользователю
	if(count($err) > 0)
		echo showErrorMessage($err);
	else
	{
		/*Создаем запрос на выборку из базы 
		данных для проверки подлиности пользователя*/
		$sql = 'SELECT * 
				FROM `'. BEZ_DBPREFIX .'reg`
				WHERE `login` = "'. escape_str($_POST['email']) .'"';
		echo $sql;
		$res = mysqlQuery($sql);
		echo $res;
		
		//Если логин совподает, проверяем Пароль
		if(mysql_num_rows($res) == 1)
		{
			//Получаем данные из таблицы 
			$row = mysql_fetch_assoc($res);

			if(md5(md5($_POST['pass']).$row['salt']) == $row['pass'])
			{	

				$_SESSION['user'] = true;

				$_SESSION['login'] = $_POST['email']; 

				
				//Сбрасываем параметры
				header('Location:'. BEZ_HOST .'calculate/index.php');
				exit;
			}
			else
				echo showErrorMessage('Неверный пароль!');
		}
		else
			echo showErrorMessage('Логин <b>'. $_POST['email'] .'</b> не найден!');
	}
	
 }

 if (!empty($_SESSION['login'])){

	echo ('Здравствуйте, "'. $_SESSION['login'].'"');

 }

 else {

	echo ("Здравствуйте, Гость.");
						
 }
 
?>