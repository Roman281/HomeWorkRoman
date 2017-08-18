<?php 

	for($i = 0; $i < 1000; $i++) {
	$txt = array();
	$txt[$i] = $i + rand(0, 500);
		foreach($txt as $k=>$v){
			$file = fopen('text1.txt','a+');		 
			fwrite($file, "$k = $v \n ");
			fclose($file);

				if($v%2 == 0) { 
					$file2 = fopen('text2.txt', 'a+');	
					fwrite($file2, "$k = $v \n ");
					fclose($file2);
				} else {
				$file3 = fopen('text3.txt', 'a+');
				fwrite($file3, "$k = $v \n ");
				fclose($file3);
				}
		}
	}
	

 ?>