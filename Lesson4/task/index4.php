<?php 

	echo "Задача 2";
	/*Cоздать массив из 1000 чисел каждый элемент которого равен квадрату своего номера.
	Результат вывести в виде таблицы (офорить ее рамкой)*/
		echo "<br>";

	echo '<table border = 1>';
	$arr = array();
	for($i = 0; $i < 100; $i++) {
		$arr[$i] = pow($i, 2) . " ";
		}
	$j = 0;
	foreach($arr as $val) {
	    if ($j === 0) {echo '<tr>';
    }else if ($j >= 10) {
	        echo '</tr>';
	        $j = 0;
	    	}
	    echo "<td>$val</td>";
	    $j++;
		}
	echo '</table>';
	echo "<br>", "<br>";


	echo "Задача 3";
	/*Создайте массив из 1000 случайных чисел. Определите, есть ли в массиве повторяющиеся элементы*/
	echo "<br>";
	$arr2 = array(); /*Создал массив из 100 чисел, т.к. из 1000 чисел занимает очень много места на экране*/
	for($i = 0; $i < 100; $i++){
		$arr2[$i] = rand(0, 100);
		}
 	$uniq = array_count_values($arr2);
 	foreach ($uniq as $key => $value) {
 		if($value > 1) {
 		echo "число $key повторилось $value раза; ";
 		}
 	} 
 	echo "<br>", "<br>";

	echo "Задача 4";
	/*Создать массив из 100 случайных чисел. Найти сумму чисел, которые кратны 5-ти(пяти)*/
	echo "<br>";
	$summ = 0;
	$arr3 = array(); /*Создал массив из 100 чисел, т.к. из 1000 чисел занимает очень много места на экране*/
	for($i = 0; $i < 100; $i++){
		$arr3[$i] = rand(0, 100);
		}
		foreach ($arr3 as $v) {
			if($v % 5 == 0) {
				$summ += $v;
			}
		}
	echo "Сумма значений кратных 5-ти: $summ";
	echo "<br>", "<br>";


	echo "Задача 5";
	/*Дана строка. Если ее длина больше 10 символов, то оставить в строке только первые 6 символов, иначе дополнить строку символами 'o' до длины 12*/
	echo "<br>";
	$str = 'Hello_men';
	echo $strlen =  mb_strlen($str);
		echo "<br>";
	if($strlen >10) {
		echo mb_substr($str, 0, 6);
	} elseif ($strlen < 10) {	
		$dif = 12 - $strlen;
		for($i = 0; $i < $dif; $i++) {
			$str = $str .'o';
			}
		}
	echo $str ;
	echo "<br>", "<br>";

	echo "Задача 6";
	/*Сгенерировать массив из 10-ти случайных чисел. После этого, сгенерировать одно случайно число и проверить, входи ли оно в данный массив.*/
	echo "<br>";
	$arr4 = array(); 
	for($i = 0; $i < 10; $i++){
		echo $arr4[$i] = rand(0, 10). " ";
		}
		echo "<br>";
		echo $num = rand(0, 10);
			if(in_array($num, $arr4)) {
				echo " это число входит в массив";
				} else echo " этого числа нет в массиве";
	echo "<br>", "<br>";

	echo "Задача 7";
	/*Создать массив из 100 случайных как чисел так и ключей. После этого выполнить:
	Сортировку массива по значению
	Сортировку массива по ключу.
	*/
	echo "<br>";
	$arr5 = array();
	for($i =0; $i < 100;  $i++) {
		$arr5[rand(0, 100)] = rand(0, 100);
	}
	print_r($arr5);
	echo "<br>";
	
	echo "Сортировка по значению: ";
	echo "<br>";
	asort($arr5);
	foreach ($arr5 as $key => $value) {
		echo "$key => $value; ";
	}
	echo "<br>";
	echo "Сортировка по ключам: ";
	echo "<br>";
	ksort($arr5);
	foreach ($arr5 as $key => $value) {
		echo "$key => $value; ";
	}
	echo "<br>", "<br>";

	echo "Задача 8";
	/*Создать два массива из 10-ти случайных чисел.
	Выполнить сравнения массивов по двум критеряим: вычислить схождение массива, вычислить расхождение массива.
	*/
	echo "<br>";
	$arr6 = array();
	for($i =0; $i < 10;  $i++) {
		echo $arr6[$i] = rand(0, 10) . " ";
	}
	echo "<br>";
	$arr7 = array();
	for($j =0; $j < 10;  $j++) {
		echo $arr7[$j] = rand(0, 10) . " ";
	}
	$res1 = array_diff($arr6, $arr7);
	echo "<br>";
	echo "Вычислить расхождение массива: ". print_r($res1) . "<br>";
		$res2 = array_intersect($arr6, $arr7);
		echo "Вычислить схождение массива: ". print_r($res2) . "<br>";
	echo "<br>", "<br>";

	echo "Задача 9";
	/*Создать массив из 50-ти случайных чисел. Генерируя случайно число, проверять есть ли такой ключ в данном массив.
	*/
	echo "<br>";
	$arr8 = array(); 
	for($i = 0; $i < 50; $i++){
		 $arr8[rand(0, 50)] = rand(0, 50);
		}
		print_r($arr8);
		echo "<br>";
		echo $num2 = rand(0, 50);
			if(array_key_exists($num2, $arr8)) {
				echo " это число является ключем в массиве"."<br>";
				} else echo " этого число не является ключем в массиве"."<br>";
 	echo "<br>", "<br>";

 	echo "Задача 10";
		/*Создать массив из 100 случайных ключей. Создать еще один массив, который будет содержать все ключи первого массива. Использовать функции php, не писать «велосипед»
	*/
	echo "<br>";
	$arr9 = array(); 
	for($i = 0; $i < 100; $i++){
		 $arr9[rand(0, 100)] = $i;
		}
		print_r($arr9);
		echo "<br>";
		echo array_keys($arr9);
		foreach ($arr9 as $key => $value) {
			echo $key. " ";

		}

	echo "<br>", "<br>";

 	echo "Задача 11";
		/*Создать массива з 10-ти чисел. Вычислить произведение значений массива. Не использовать для решения задачи циклы.	*/
	echo "<br>";
		$a = array(2, 4, 6, 8, 10, 7, 1, 9, 3, 15);
		echo var_dump($a). '<br>';
	echo  $summarr = "Сумма элементов массива = ". array_product($a);
echo "<br>", "<br>";

 	echo "Задача 12";
		/*Создать массива з 10-ти чисел. Вычислить произведение значений массива. Не использовать для решения задачи циклы.	*/
	echo "<br>";
echo "<pre>";
	$height = 5;
    for($y = 1; $y <= $height; $y++){
    echo str_repeat(' ',$height - $y);
    echo str_repeat('1',$y*2 - 1)."<br>";
}
echo "</pre>";
echo "<br>";

echo "Задача 13";
		/*Нарисовать ромб из чисел, используя php. Принцип почти такой же, как в задаче 12	*/
	echo "<br>";
echo "<pre>";
	$height = 5;
    for($y = 1; $y <= $height; $y++){
    echo str_repeat(' ',$height-$y);
    echo str_repeat('1',$y*2-3)."<br>";
}
	for($y = $height; $y >= 1; $y--){
    echo str_repeat(' ',$height - $y);
    echo str_repeat('1',$y*2 - 3)."<br>";
}

echo "</pre>";
echo "<br>";
 ?>