<?
$cat_1 = new stdClass();
$cat_1->name = 'Бытовая техника';
$cat_1->url = 'url_1';
$cat_1->visible = 1;

$cat_4 = new stdClass();
$cat_4->name = 'A5';
$cat_4->url = 'url_1';
$cat_4->visible = 1;

$cat_3 = new stdClass();
$cat_3->name = 'Samsung';
$cat_3->url = 'url_3';
$cat_3->visible = 1;
$cat_3->subcategories = array(0=>$cat_4);

$cat_2 = new stdClass();
$cat_2->name = 'Мобильные телефоны';
$cat_2->url = 'url_2';
$cat_2->visible = 1;
$cat_2->subcategories = array(0=>$cat_3);

$cat_5 = new stdClass();
$cat_5->name = 'Пылесосы';
$cat_5->url = 'url_5';
$cat_5->visible = 1;

/*Создание массива с обьектами категорий START*/
$categories = array(
 0 => $cat_1,
 1 => $cat_2,
 2 => $cat_5,
);
/*Создание массива с обьектами категорий END*/

/*
 * В данном примере я создал массиов обьектов, для того что показать работу
 * рекурсивной функции именно с таким форматом данных.
 * В нашей CMS мы будем строить именно таким образом данные.
 *
 * */
function getCategories($categories) {
    if($categories) { // проверка лишней не бывает
        echo "<ul>";
        foreach ($categories as $category) {
           if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
               echo "<li>$category->name </li>";
               if($category->subcategories) {
                   // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                   getCategories($category->subcategories); // передаем в функцию уже массив обьектов покатегорий
               }
           }
        }
        echo "</ul>";
    }
}

getCategories($categories);

?>