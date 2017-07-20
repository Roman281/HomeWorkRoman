<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml111.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Сайт главная страница</title>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/product.css"/>
<? include_once "file/products.php"; ?>
<? include_once "file/menu.php"; ?>

</head>
<body>
	<div>
	<div class="header">
	<div id = "logo"><h3>Logo</h3></div>
    <? if($menu):?>
    <ul class="clearfix">
        <? foreach ($menu as $menu) {
            if($menu->visible) {
                echo "<li class='menu_link'><a href=".$menu->name.">$menu->name</a></li>";
            } else { // этого быть не должно
                echo "<li class='menu_link'><a class='red' href=".$menu->url.">$menu->name</a></li>";
            }
        }
        ?>
    </ul>
    <? endif ?>
    <a href="index.php"> главная страница</a>
<a href="delivery.php"> Доставка</a>

</div>
		
	</div>
	<hr>
	<div id = "main_content">
		<div id = "left">
			<h2>sidebar</h2>
			<ul>
				<li><a href="">категории товаров</a></li>
			</ul>
		</div>
		
		<div id = "center">
			<h2>Вывод товаров</h2>
			<div class="container">
			    
			</div>

		</div>
		
		
		</div>
		  	 <hr>      				
			<div id="wrap">
				<div id="main" class="clearfix"></div>
			<div id="footer">
				<h3> футер сайта</h3>
			</div>
		</div>

</body>
</html>