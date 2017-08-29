
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

if($_SERVER["REQUEST_METHOD"] == "POST" & isset($_POST['upload'])) {
	    //print_r($_FILES);
	$files = reset($_FILES);
	$ext = array('png','jpg','txt','pdf');

	for ($i = 0; $i < count($files['name']); $i++) {
		$filename = $files['name'][$i];
		$path = $files['tmp_name'][$i];
	$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	$base = pathinfo($filename, PATHINFO_FILENAME);



		if(in_array($file_ext,$ext)) {
			if(!file_exists('images')){
		                mkdir('images',0777);
		    }
		        while (file_exists('images/'.$name)) {
		            //$name = $base.time().'.'.$file_ext;
		            $name = translit($base).substr(md5(rand(1 , 1000).uniqid(1)),-4).'.'.$file_ext;
		        }
				        $res = move_uploaded_file($path,'images/'.$name);
		        if($res) {
		            echo "ok";
		        } else { echo "wrong_type";
		    	}
		} else { $message = 'wrong filetype!';
		}

	}
}

if(isset($message)) {
    echo "<h5>$message</h5>";
}

										
function getImages($dir = null){
	if(is_null($dir) || !file_exists($dir)) {
        return false;
    }
    $perms = array('png','jpg','txt','pdf');
    $handle_dir = opendir($dir);

    $uploaded_files = array();
    while ($file = readdir($handle_dir)) {
    	if (in_array(pathinfo($file,PATHINFO_EXTENSION), $perms)) {
    		$uploaded_files[$file] = filesize($dir.'/'.$file);
    	}
    }
    closedir($handle_dir);
    
	foreach ($uploaded_files as $name => $size) {
		echo "<ul>";
			echo "<li>";
				echo "name: ".$name. " _" . round($size/1024, 2) . "Kb";
			echo "</li>";
		echo "</ul>";
	}

}
	
	 ?>

	<form action='' method='post' enctype='multipart/form-data'>
		<p>Загрузите  это фото</p>
		<input name='filename[]' type='file' multiple='true' min='1' max='99'>
		<p><input type='submit' value='Ok' name="upload"></p>
	</form>
	</div>

</div>
<div class = 'right'>
		<div class = 'list'>
		<h3>Загруженные фото</h3>
		<?php 
			/*$dir = "images/";
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
			closedir($h);*/

            getImages('images');
            
		 ?>
		 </div>
	</div>
			
	</div>

</div>

</body>
</html>