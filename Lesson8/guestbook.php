<?php
	$url = $_SERVER['HTTP_REFERER'];
	if ($_POST['']);
	$file=fopen('guestlist.txt','a+');
	fwrite($file,$_POST['name'].": ".date("Y-m-d H:i:s").", ".$url."\n");
	fclose($file);
	
?>

<form action="" method="post">
<p>Ваше имя<br>
<input name="name" type="text"  size="30">
</p>
<p>
<label>
<input type="submit" name="submit"  value="Ok">
</label>
</p>
</form>
