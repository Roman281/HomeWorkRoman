<?php 
 	if(isset($_POST['GO'])) {
	$login = trim($_POST['login']);
    $password = trim($_POST['password']);
	    
	 	if(preg_match('/^[a-zA-Z0-9]{4,}$/i', $login) == false) {
	 		$mess = 'errLog';
	 		//echo 'не правильно ввели логин';
	  	} elseif (preg_match('/(([a-zA-Z0-9_]+)-?([_a-zA-Z0-9-]+)?){4,}/ui',$password) == false) {
	  		$mess = 'errPass';
	       // echo 'не правильно ввели password';
	    } else { /*echo 'все хорошо';*/

	    $res = addUser($login, $password);
	    if ($res) {
	    	$mess = 'succRegistr';
	    	//echo 'Пользователь добавлен';
	    } else {
	    	$mess = 'errRegistr';
	    	//echo 'Пользователь не добавлен';
	    }
		}
 	}

	function addUser($login, $password) {

	$hashlog = $login;
    $hashpass = password_hash($passwod, PASSWORD_DEFAULT);

  	$put_txt = '';
    $put_txt .= $hashlog.":::".$hashpass."\n";

    $res = file_put_contents('customer.txt', $put_txt, FILE_APPEND | LOCK_EX);
	return true;
	}
/*--------------------------------------------------*/
	if(isset($_POST['GOGO'])) {
		$login = trim($_POST['login']);
	    $password = trim($_POST['password']);
	 
	 	if(preg_match('/^[a-zA-Z0-9]{4,}$/i', $login) == false) {
	 		$mess = 'errLog';
	 		//echo 'не правильно ввели логин';
	  	} elseif (preg_match('/(([a-zA-Z0-9_]+)-?([_a-zA-Z0-9-]+)?){4,}/ui',$password) == false) {
	        $mess = 'errPass';
	        //echo 'не правильно ввели password';
	    } else {/*echo 'все хорошо';*/

			$success = getUser($login, $password);
			if (true) {
				$mess = 'succAuthoriz';
				//echo 'Пользователь найден';
			} else {
				$mess = 'errAuthoriz';
				//echo 'Пользователь не найден';
			}
		}
	}


	function getUser($login, $password) {
		$han = fopen('customer.txt', 'r');
		$arr = array();
		while ($line = fgets($han)) {
			   $arr[] = explode(':::', $line);
			 //  print_r($arr);
		}
		
		$success = false;
		foreach ($arr as $user) {
			if ($user[0] == $login) {
				//print_r($user);
				if (password_verify($password, $user[1])) {
					$success = true;
					
				}
			}
		}
		fclose($han);
		return $success;
	} 
/*--------------------------------------------------*/
	
	 	$arrm = array(
	 		'errLog' => 'не верно ввели логин', 
	 		'errPass' => 'не верно ввели пароль', 
	 		'succRegistr' => 'Регистрация прошла успешно', 
	 		'errRegistr' => 'Пользователь не зарегистрирован, повторите еще раз.', 
	 		'succAuthoriz' => 'Пользователь авторизирован', 
	 		'errAuthoriz' => 'Пользователь не авторизирован'
 		);

	 foreach ($arrm as $k => $value) {
	}
 	function messages($mess, $arrm) {
 			switch ($k = $mess) {
 				case 'errLog':
 					echo $arrm['errLog'];
 					break;
				case 'errPass':
 					echo $arrm['errPass'];
 					break;
				case 'errRegistr':
 					echo $arrm['errRegistr'];
 					break;
				case 'succRegistr':
 					echo $arrm['succRegistr'];
 					break;
				case 'succAuthoriz':
 					echo $arrm['succAuthoriz'];
 					break;
				case 'errAuthoriz':
 					echo $arrm['errAuthoriz'];
 					break;
 				default:
 					$mess = 'все ОК';
 					break;
 			} 
 			return $mess1;
 		
 	}



	
 ?>

<form action="" method="post" name="forma"> 
		<h2>Регистрация</h2> 
	<p>Введите логин</p>
	<input name="login" type="text" size="20" maxlength="40" value="">
	</p>
	<p>Введите пароль<br>
	<input name="password" type="password" size="20" maxlength="40">
	</p>
	<p>
	<input name="GO" type="submit" value="Добавить">
	</p>
	<div>
	<?php	$mess1 = messages($mess, $arrm); ?>
	</div>
</form>
<br>
<form action="" method="post" name="forma1"> 
		<h2>Авторизация</h2> 
	<p>Введите логин</p>
	<input name="login" type="text" size="20" maxlength="40" value="">
	</p>
	<p>Введите пароль<br>
	<input name="password" type="password" size="20" maxlength="40">
	</p>
	<p>
	<input name="GOGO" type="submit" value="Войти">
	</p>
	<div>
	<?php	$mess1 = messages($mess, $arrm); ?>
	</div>
</form>