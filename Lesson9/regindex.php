<?php 
/*header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors',true);
error_reporting(E_ALL);*/
	//if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['make_order']) {
   // $DATA = clear($_POST);
   /* $cart_products = array();
    $total_amount = 0;
    $total_price = 0;
    $cart = new stdClass();
    if(isset($_COOKIE['cart'])) {
        $ids = unserialize($_COOKIE['cart']);
        foreach ($ids as $id=>$amount) {
            $cart_products[$id] = getProduct($products,$id);
            $cart_products[$id]->amount = $amount;
            $total_price += $cart_products[$id]->variant->price*$amount;
            $total_amount += $amount;
        }
        $cart->items = $cart_products;
    }
    $cart->total_price = $total_price;
    $cart->total_amount = $total_amount;*/

    

/*if (preg_match("/^[а-яА-Яa-zA-Z0-9_\.\-]+@[а-яА-Яa-zA-Z0-9\-]+\.[а-яА-Яa-zA-Z\-\.]+$/Du", $email) > 0) {
  // to do
}*/
/*
	if(preg_match('/\w\d/', $name)) {
		echo 'все хорошо';
        } 
        elseif (preg_match('/\w\d/', $last_name)){
        	echo 'все хорошо';
        }  else echo 'false';

}


	*/

 ?>

<!--  <div class="col-lg-12">
    <h3>Контактные данные</h3>
    <form method="post" action="">

        <div class="form-group">
            <label>Имя</label>
            <input class="form-control" type="text" name="name" value="" required>
        </div>
        <div class="form-group">
            <label>Фамилия</label>
            <input class="form-control" type="text" name="last_name" value="" required>
        </div>
       <!-- <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="" required>
        </div>
        <div class="form-group">
            <label>Телефон</label>
            <input class="form-control" type="tel" name="phone" value="" required>
        </div>
        <div class="form-group">
            <label>Адрес доставки</label>
            <input class="form-control" type="text" name="address" value="" >
        </div>
        <div class="form-group">
            <label>Комментарий</label>
            <textarea class="form-control" name="comment"></textarea>
        </div>


        <input class="btn" type="submit" name="make_order" value="Купить">
    </form>
</div>-->
<br>

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
	$login = $_POST['login'];
	$name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
	 	if(preg_match('/^[a-zA-Z0-9]{4,10}$/', $login) == false) {
	 		echo 'не правильно ввели логин';
 	} elseif(preg_match('/^[а-яА-Я]{2,20}-?([а-яА-Я]{2,20})$/i',$name) == false) { 
        echo 'не правильно ввели имя';
	} elseif (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,})$/ui',$email) == false) {
        echo 'не правильно ввели email';
      } elseif (preg_match('/(([a-zA-Z0-9_]+)-?([_a-zA-Z0-9-]+)?\*?([_a-zA-Z0-9-]+)?\/?([_a-zA-Z0-9-]+)?\??([_a-zA-Z0-9-]+)?){4,}/ui',$password) == false) {
        echo 'не правильно ввели password';
    }else echo 'все хорошо';
	 
	 //	!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,})$/ui',$last_name);

	/*} elseif (preg_match('/\w/', $name)){
	  echo 'все хорошо';
	} else echo 'не правильно ввели';*/

 } else echo 'Вы заполнели не все поля';
 echo "<br>";
    
    $name1 = 'Лоооо';
    //$as = preg_match("/[а-яА-Яa-zA-Z0-9]{2,12}[^*]/", $name1, $tes);
    //$as = preg_match_all('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,})$/ui', $name1, $tes);
    $as = preg_match('/^([а-яА-Я]+-?([а-яА-Я]+?)){2,20}/ui', $name1, $tes);
//+([_a-zA-Z0-9-]+){4,20})$
     //$as ='/([а-яА-Яa-zA-Z0-9_\s]){2,10}/';
   //echo $as;
   print_r($tes);

  echo $as;
 ?>	



<?php /*

        if (empty($_POST['name_grup']))
  echo "поле пустое";
else
  {
    $result =  mysql_query("INSERT INTO grupi(name_grup)  VALUES ('{$_POST['name_grup']}')");
 
    if ($result =='true')
      {
        echo "Группа успешно добавлена";
      }
    else 
     {
       echo "Группа не добавлнен";
     }
 
} */



?>

<?
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

$mailto = "vashe_milo@mail.ru";
$charset = "windows-1251";
$subject = "Имя письма";
$content = "text/html";
$status="<br>";
if (!empty($_POST))
{
   $name = htmlspecialchars(stripslashes($_POST['imko']));
   $message = htmlspecialchars(stripslashes($_POST['tikstik']));
   $mail = htmlspecialchars(stripslashes($_POST['posta'])); 
   
   if(empty($_POST['posta']))
   {
      $status = "Вы не указали свой E-mail!";
   }
   elseif (!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $mail))
   {
      $status = "Вы ввели некорректный E-mail!";
   }
   else
   {
       $headers  = "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: ".$content." charset=".$charset."\r\n";
       $headers .= "From: \"".$name."\" <".$mail.">\r\n";
       $headers .= "Bcc: vashe_milo2@yaya.ru\r\n";
       $headers .= "X-Mailer: E-mail from my super-site \r\n";
       $sendmessage = "<html><body>
         <p><b>E-mail для связи:</b> ".$mail."</p>
         <p><b>Сообщение:</b> ".$message."</p>
         </body></html>";
       if (mail($mailto,$subject,$sendmessage,$headers))
       {
          unset($name, $mail, $message);
          $status = "Ваше сообщение отправлено!";
       }
       else
       {
          $status = "По техническим причинам сообщение не было отправлено. Попробуйте снова, а если не получится, обратитесь к разработчикам";
       }
   }
}
?> 
<form method='post' name='formname'>  
    <p> 
       <label for="imko">Контактное лицо:</label><br> 
       <input name="imko" maxlength="50" type="text" size="10"> 
    </p> 
    <p> 
       <label for="posta">Почта для связи:</label><br> 
       <input name="posta" type="text" size="10" value=""> 
    </p> 
    <p> 
       <label for="tikstik">Сообщение:</label><br> 
       <textarea rows="5" cols="14" name="tikstik"></textarea> 
    </p> 
    <p> 
       <input name="submit" type="submit" value="Отправить"> 
    </p> 
</form> 
<?=$status;?>


        