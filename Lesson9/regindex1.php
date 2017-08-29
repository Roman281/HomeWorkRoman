<?php 

	$login = trim($_POST['login']);
	$name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
	 	if(preg_match('/^[a-zA-Z0-9]{4,10}$/', $login) == false) {
		 		echo 'не правильно ввели логин';
	 	} elseif(preg_match('/^([а-яА-Я]+-?([а-яА-Я]+?)){2,20}/ui',$name) == false) { 
	        echo 'не правильно ввели имя';
		} elseif (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,})$/ui',$email) == false) {
	        echo 'не правильно ввели email';
      	} elseif (preg_match('/(([a-zA-Z0-9_]+)-?([_a-zA-Z0-9-]+)?\*?([_a-zA-Z0-9-]+)?\/?([_a-zA-Z0-9-]+)?\??([_a-zA-Z0-9-]+)?){4,}/ui',$password) == false) {
	        echo 'не правильно ввели password';
	    }else echo 'все хорошо';

 	} /*else echo 'Не все поля заполнены . <br>';*/
 
 ?>


<form action="" method="post" name="forma"> 
	<p>Введите логин<br>
	<input name="login" type="text" size="20" maxlength="40" value="">
	</p>
	<p>Введите имя<br>
	<input name="name" type="text" size="20" maxlength="40" value="">
	</p>
	<p>
	<p>Введите email<br>
	<input name="email" type="text" size="20" maxlength="40" value="">
	</p>
	<p>Введите пароль<br>
	<input name="password" type="password" size="20" maxlength="40">
	</p>
	<p>
	<input name="submit" type="submit" value="Добавить">
	</p>
</form>

<?php 
function translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ' ' => '-',    
    );
    return strtr($string, $converter);
}
	/*$tes = ' Колосок   kjhk   ';
	$test1 = trim($tes);
echo $test = mb_strtolower(translit($test1));
echo "<br>";
	echo $test2 = preg_replace('/-+/', '-', $test);
*/

echo "<br>";
$deport = trim($_POST['address']);
if (!empty($_POST['address'])){
	$deport1 = mb_strtolower(translit($deport));
print_r($deport1);
	$deport2 = preg_match('/^[^(\w)|(\x7F-\xFF)|(\s)]+[a-z0-9-]+\/?([_a-z0-9-]+)?\.?([_a-z0-9]+)?$/', $deport1, $res);
	//$deport2 = preg_match('/^[^/]?.+$/', $deport1, $res);

	//print_r($res);
	$deport3 = preg_replace('/-+/', '-', $res);
	//print_r($deport3);
	$deport3 = preg_replace('/^-+/', '', $deport3);
//	print_r($deport3);
	$deport3 = preg_replace('/-*$/', '', $deport3);
	//print_r($deport3);
	$deport3 = preg_replace('/^\/*/', '', $deport3);
	//print_r($deport3);
	$deport3 = preg_replace('/^-+/', '', $deport3);
	print_r($deport3);
 }

 ?>

<form method="post">
	<input type="test" name="address">
	<input type="submit" name="check" value="Перейти">
</form>