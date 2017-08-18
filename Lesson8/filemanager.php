
<!DOCTYPE html>
<html>
<head>
	<title>filemanager</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
		<div>
			<div id = 'manag'>
				
						<div class = 'left'>
							<div class = 'form'>
								<?php 
									if($_SERVER["REQUEST_METHOD"] == "POST") {
									    //print_r($_FILES);

									    $ext = array('png','jpg','txt','pdf');

									    $name = $_FILES['filename']['name'];
									    $file = $_FILES['filename']['tmp_name'];
									    $file_ext = pathinfo($name,PATHINFO_EXTENSION);
									    $base = pathinfo($name, PATHINFO_FILENAME);

									    function transliterate($st) {
										  $st = strtr($st, 
										    "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
										    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
										  );
										  $st = strtr($st, array(
										    'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",  
										    'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
										    'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
										    'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
										  ));
										  return $st;
										}
										transliterate("У попа была собака, он ее любил.");

									    if(in_array($file_ext,$ext)) {
									        while (file_exists('images/'.$name)) {
									            //$name = $base.time().'.'.$file_ext;
									            $name = transliterate($base).substr(md5(rand(1 , 1000).uniqid(1)),-4).'.'.$file_ext;
									        }
									        $res = move_uploaded_file($file,'images/'.$name);
									        if($res) {
									            echo "ok";
									        } else {
									            echo "false";
									        }
									    } else {
									        echo "wrong_type";
									    }
									}
								 ?>

								<form action='' method='post' enctype='multipart/form-data'>
										<p>Загрузите  это фото</p>
										<input name='filename' type='file' multiple='true' min='1' max='99'>
										<p><input type='submit' value='Ok'></p>
								</form>
							</div>

						</div>
						<div class = 'right'>
							<div class = 'list'>
							<?php 
								$dir = "images/";
								$h = opendir($dir);
								while ($item = readdir($h)) {
								    if($item == '.' || $item == '..')
								        continue;
								    if (is_file($item)) {
								        echo "<b>file: $item</b><br>";
								    } elseif (is_dir($item)) {
								        echo "<b>dir: $item</b><br>";
								    } else {
								        echo $item."<br>";
								    }

								}
								closedir($h);
							 ?>
							 </div>
						</div>
					
			</div>

		</div>

</body>
</html>