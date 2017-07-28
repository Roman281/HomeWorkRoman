<?php 
	echo "Задача 1";
	/*Cоздайте функцию drawTable() или Table().
	Задайте для функции три аргумента: $col, $row, $color.
	отрисуйте таблицу умножения 3 раза с разным цветом., вызывая свою функцию с произвольными параметрами.*/
	echo "<br>";
	function multipl($row, $col, $color) {
	echo '<table border = 1>';
		for($i = 1; $i < $row; $i++ ) {
			echo "<tr>";
			for($j = 1; $j < $col; $j++) {
				$t = $i * $j;
				echo "<td><font color = $color>$t</font></td>";
				if($i >= $row) {
					echo "<tr>";
				}
			}
		}

	echo '</table>';
	}
	multipl(10, 10, "red");
	multipl(5, 7, "blue");
	multipl(15, 15, "green");
	echo "<br>";


 
	echo "Задача 2";
	/*Создайте функцию MainMenu() с двумя аргументами.
	Первый аргумент $menu - в него будет передаваться массив, содержащий структуру меню
	Второй аргумент $type со значением по умолчанию равным true. 
	Данный параметр указывает, каким образом будет отрисовано меню -
	вертикально или горизонтально.
	Измените код таким образом, чтобы меню отрисовывалось в зависимости от 
	входящего параметра $type - либо вертикально, либо горизонтально
	Отрисуйте оба таких меню.*/
	
	$arr = array('Главная', 'Новости', 'Контакты', 'О нас');
	function MainMenu($menu, $type = true) {
		foreach($menu as $menu_v) {
			if($type) {
			echo "<li><a href='#'>$menu_v</a></li>";
			} else {
			echo "<a href='#'>$menu_v</a>"." ";
			} 
			
		} 
	}
	
?>
	<ul><?php MainMenu($arr, true); ?></ul>
	<ul><?php MainMenu($arr, false); ?></ul>