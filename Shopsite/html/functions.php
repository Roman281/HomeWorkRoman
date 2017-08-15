<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors',true);
error_reporting(E_ALL);

require_once 'data/menu.php';
require_once 'data/categories.php';
require_once 'data/products.php';



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
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

 function timeVisit($time) {
        if(isset($_COOKIE["data"])) {
            $data = date('Y-F-d,  H:i:s');
            setcookie("data", $data  );
        } else {
            setcookie("data", date('Y-F-d,  H:i:s') );
        }
       return $time;
       //echo "Время  последнего посещения:".$data;
       }
        $data2 = isset($_COOKIE["data"])?$_COOKIE['data']:'data';
        timeVisit($data2);
        //timeVisit($time);
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
   
function lastUrl($url) {
        if(isset($_COOKIE["url"])) {
            $url = $_SERVER['HTTP_REFERER'];
            setcookie("url", $_SERVER['HTTP_REFERER']);
        } else {
            setcookie("url", $_SERVER['HTTP_REFERER']);
        }
           return $url;
              // $url = $_SERVER['HTTP_REFERER'];
             // echo "Последний посещенный сайт:".$url;
       }
       $url2 = isset($_COOKIE["url"])?$_COOKIE['url']:'url';
        
       lastUrl($url2);
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


     
//Добавление/обновление товара в корзине
    if(isset($_GET['amount']) && isset($_GET['id'])) {
        $cart = array();
        $product_id = trim(strip_tags($_GET['id']));
        $amount = trim(strip_tags($_GET['amount']));
            if(isset($_COOKIE['cart'])) {
                $cart = unserialize($_COOKIE['cart']);
            }
        $cart[$product_id] = $amount;

        setcookie('cart',serialize($cart),time()+(3600*24*30),'/');
        $path = '?r=product&id='.$_GET['id'];
        header("Location: $path");
    }
    /*print_r(unserialize($_COOKIE['cart']));*/
    //достаем товары из корзины
    function getCart($products) {
        $cart_products = array();
        $total_amount = 0;
        $total_price = 0;
        $cart = new stdClass();
        if(isset($_COOKIE['cart'])) {
            $ids = unserialize($_COOKIE['cart']);
            foreach ($ids as $id=>$amount) {
                $cart_products[$id] = getProduct($products, $id);
                $cart_products[$id]->amount = $amount;
                $total_price += $cart_products[$id]->variant->price*$amount;
                $total_amount += $amount;
            }
            $cart->items = $cart_products;
        }
        $cart->total_price = $total_price;
        $cart->total_amount = $total_amount;
        return $cart;
    }
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(isset($_GET['amount']) && isset($_GET['id'])) {
        $cart2 = array();
        $product_id = trim(strip_tags($_GET['id']));
        $amount = trim(strip_tags($_GET['amount']));
            if(isset($_COOKIE['wishlist'])) {
                $cart2 = unserialize($_COOKIE['wishlist']);
            }
        $cart2[$product_id] = $amount;

        setcookie('wishlist',serialize($cart2),time()+(3600*24*30),'/');
        $path = '?r=product&id='.$_GET['id'];
        header("Location: $path");
    }

   function getWish($products) {
        $cart_products2 = array();
        $total_amount2 = 0;
        $cart2 = new stdClass();
        if(isset($_COOKIE['wishlist'])) {
            $ids2 = unserialize($_COOKIE['wishlist']);
            foreach ($ids2 as $id=>$amount) {
                $cart_products2[$id] = getProduct($products, $id);
                $cart_products2[$id]->amount = $amount;
                 $total_amount2 += $amount;
            }
            $cart2->items = $cart_products2;
            //print_r($cart2);
        }
        return $cart2;
    }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
     /*Очистить корзину*/

function clean($clean) {
   if(isset($cart)) { 
        $cart = array();
   if(isset($_COOKIE['cart'])) {
               $cart = unserialize($_COOKIE['cart']);
                 setcookie('cart',serialize($cart),time()-(3600*24*30),'/');
        }
    }
        return $clean;

       
       // $path = '?r=product&id='.$_GET['id'];
       header("Location: $path");
}
