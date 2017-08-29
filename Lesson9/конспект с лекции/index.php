<?php
header("Content-Type: text/html; charset=utf-8");
$str = "Hello my /world We work at IMT academy in city:Dnepr";


// . - любой символ кроме переноса строки

// слеши показывает начало и конец регулярки
echo "<h2>самая простая регулярка</h2>";
$res = preg_match('/./',$str,$match);
echo "<pre>";
print_r($match);
echo "</pre>";

echo "<hr>";
//КВАНТИФИКАТОРЫ

// ? -  есть/нет символа
echo "<h2>Есть или нет символа</h2>";
$str_1 = "Hello my /world. We work at IMT academy in city:Dnepr";
echo "<b>$str_1</b>";
$res_1 = preg_match('/world.?/',$str_1, $match_1);
echo "<pre>";
print_r($match_1);
echo "</pre>";
echo "<hr>";

// + - от 1-го до бесконечности
echo "<h2>от 1-го до бесконечности</h2>";
$str_2 = "heeeeeeeeeelo";
echo "<b>$str_2</b>";
$res_2 = preg_match('/e+l/',$str_2, $match_2);
echo "<pre>";
print_r($match_2);
echo "</pre>";

echo "<hr>";

// * - или нет, или есть до бесконечности
echo "<h2>или нет, или есть до бесконечности</h2>";
$str_3 = "heelo";
echo "<b>$str_3</b>";
$res_3 = preg_match('/he*l/',$str_3, $match_3); // е- может не быть или быть много
echo "<pre>";
print_r($match_3);
echo "</pre>";



echo "<hr>";

//КВАНТИФИКАТОРЫ КОЛИЧЕСТВА
echo "<b>{X} - точное количество</b><br>";
echo "<b>{X,Y} - диапазон (min,max )</b><br>";
echo "<b>{X,} - максимум не ограничен</b><br>";
echo "<b>{,Y} - максимум ограничен</b><br>";


$str_3 = "heelo";
echo "<b>$str_3</b>";
$res_3 = preg_match('/he{1,2}l/',$str_3, $match_3);
echo "<pre>";
print_r($match_3);
echo "</pre>";


echo "<hr>";

echo "<h2>Начало и конец строки ( ^ , $)</h2>";
$str_3 = "hello my little friend";
echo "<b>$str_3</b>";
$res_3 = preg_match('/^he/',$str_3, $match_3); // строка должна начинаться с he
echo "<pre>";
print_r($match_3);
echo "</pre>";


$str_3 = "hello my little friend";
echo "<b>$str_3</b>";
$res_3 = preg_match('/end$/',$str_3, $match_3); // строка должна заканчиваться на end
echo "<pre>";
print_r($match_3);
echo "</pre>";



echo "<hr>";

echo "<h2>Класс символов</h2>";
echo "[] - класс символоd<br>";
echo "() - группировка символов<br>";


$str_3 = "hello dear 100500 client";
echo "<b>$str_3</b>";
$res_3 = preg_match('/[0-9]+/',$str_3, $match_3);
//$res_3 = preg_match('/[0-9]{1,}/',$str_3, $match_3);
echo "<pre>";
print_r($match_3);
echo "</pre>";

//Разбивка строки

$str_3 = "hello dear 123456 client";
echo "<b>$str_3</b>";
$res_3 = preg_match('/([0-9])([0-9]{2})([0-9])/',$str_3, $match_3);

echo "<pre>";
print_r($match_3);
echo "</pre>";


echo "<hr>";


echo "<h2>Спец символы</h2>";

$str_3 = "hello 45*/? []";
echo "<b>$str_3</b>";
$res_3 = preg_match('/45\*\/\? \[\]/',$str_3, $match_3);

echo "<pre>";
print_r($match_3);
echo "</pre>";

echo "<hr>";



echo "<h2>Жадные квантификаторы (* , +)</h2>";


$test = "
<a href='index.php'>main</a> link of main page <a href='login.php'>login</a> link of login page";
echo $test;

$res_3 = preg_match('/<a.*>(.*)<\/a>/',$test, $match_3); // жадный поиск
$res_4 = preg_match('/<a.*?>(.*?)<\/a>/',$test, $match_4); // не жадный поиск


echo "<pre>";
print_r($match_3);
print_r($match_4);
echo "</pre>";


echo "<hr>";

echo "<h2>замена по регулярке preg_replace()</h2>";


$str_t = "date 20 good";

$pattern = '/([a-z]+) ([0-9]+) ([a-z]+)/';
$replace = '${3} ${2} ${1}';
$new_str = preg_replace($pattern,$replace,$str_t);

echo $new_str;
?>