<?php
/*header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors',true);
error_reporting(E_ALL);*/

require_once 'data/menu.php';
require_once 'data/categories.php';
require_once 'data/products.php';

 function timeVisit($time) {
        if(isset($_COOKIE["data"])) {
            $data = date('Y-F-d,  H:i:s');
            setcookie("data", $data  );
        } else {
            setcookie("data", date('Y-F-d,  H:i:s') );
        }
       
       echo "Время  последнего посещения:".$data;
       }
        $data2 = isset($_COOKIE["data"])?$_COOKIE['data']:'data';
        timeVisit($data2);
        //timeVisit($time);
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
   
function lastUrl($time) {
        if(isset($_COOKIE["url"])) {
            $url = $_SERVER['HTTP_REFERER'];
            setcookie("url", $_SERVER['HTTP_REFERER']);
        } else {
            setcookie("url", $_SERVER['HTTP_REFERER']);
        }
               $url=$_SERVER['HTTP_REFERER'];
              echo "Последний посещенный сайт:".$url;
       }
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


       function basket () {
//Добавление/обновление товара в корзине
    if(isset($_GET) && $_GET['amount']) {
        $product_id = strip_tags(trim($_GET['product_id']));
        $amount = strip_tags(trim($_GET['amount']));
        $cart = array();
        if($_COOKIE['cart']) {
            $cart = unserialize($_COOKIE['cart']);
            $cart[$product_id] = $amount;
            setcookie('cart',serialize($cart),time()+3600,'/');
        } else {
            $cart[$product_id] = $amount;
            setcookie('cart',serialize($cart),time()+3600,'/');
        }
    }
    print_r(unserialize($_COOKIE['cart']));
    //достаем товары из корзины

    $cart_products = unserialize($_COOKIE['cart']);

    foreach ($cart_products as $id => $amount) {
        $products_cart[$id] = getProduct($products,$id);
        $products_cart[$id]->amount = $amount;
        }
    }

/*Построение дерева категорий*/
function makeTree($categories,$parent_id=0) {
    $results=array();
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id==$parent_id) {
                if ($category->id!=$parent_id) {
                    $subcategories = makeTree($categories,$category->id);
                    if(!empty($subcategories))
                        $category->subcategories = $subcategories ;
                }
                $results[]=$category;
                unset($category);
            }
        }
    }
    return $results;
}

/*Вывод дерева категорий*/
function viewCategories($categories) {
    if($categories) { // проверка лишней не бывает
        echo "<ul>";
        foreach ($categories as $category) {
            if($category->visible) { //важная проверка, которая позволит выводит только включенные категории на сайте
                echo
                "<li>
                    <a href='?r=categories&id=".$category->id."'>$category->name</a>
                </li>";
                if(isset($category->subcategories)) {
                    // проверяем есть ли подкатегории и вызываем заново функцию для вывода
                    viewCategories($category->subcategories); // передаем в функцию уже массив обьектов покатегорий
                }
            }
        }
        echo "</ul>";
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function viewMenu($pages) {
    if($pages) {
        echo '<ul class="nav navbar-nav">';
        foreach ($pages as $page) {
            if ($page->visible && $page->menu_id == 1) {
                if($page->url == '') {
                    echo "<li class='nav-link'><a href='".$_SERVER['SCRIPT_NAME']."'>$page->name</a></li>";
                } else {
                    echo "<li class='nav-link'><a href='?r=pages&id=".$page->id."'>$page->name</a></li>";
                }

            }
        }
        echo '</ul>';
    }
}
function getPage($pages,$page_id) {
    if($page_id) {
        return $pages[$page_id];
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getProduct($products,$id) {
    if($id) {
        return $products[$id];
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function getProducts($products) {
    if($products) {
        return $products;
    }
}
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function viewProduct($products) {
    if(isset($_GET['r'])) {
   $r = $_GET['r'];
   return $r;
    }

}
