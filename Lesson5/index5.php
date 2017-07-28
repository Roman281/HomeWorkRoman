<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml111.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>My site shop</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link href="css1/structure.css" rel="stylesheet" type="text/css" media="all">
	<link href="css1/products.css" rel="stylesheet" type="text/css" media="all">


	<? include_once "file/products.php"; ?>
	<? include_once "file/menu.php"; ?>
	<!--[if IE 6]>
	<link href="default_ie6.css" rel="stylesheet" type="text/css" />
	<![endif]-->
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
		<!--<a href="index.php"> главная страница</a>
		<a href="delivery.php"> Доставка</a>-->
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
			    <div class="inner">
			        <? if($products) :?>
			            <ul class="clearfix">
			                <? foreach ($products as $product) :?>
			                    <? if($product->visible):?>
			                    <li class="product_item">
			                        <span class="date"><? echo date('m.d.y',strtotime($product->created));?></span>
			                        <div class="image">
				                       			<a> <?  foreach($product->images as $value){} echo $value->filename; ?></a>
			                        </div>
					                        <div class="product_name">
					                             <a href="<? echo $product->url ?>"><? echo $product->name;?></a>
					                        </div>
					                        <div>
					                           <?  $prod = ( $product->variants );  foreach ($prod as  $value) {
					                            echo round($value->price, 2);}?> грн.
					                        </div>
			                        <div class="sku">
			                        Артикул:
			                        <? foreach($product->variants as $value) {echo $value->sku;} ?>
			                        </div>
			                        	<select class = "select" name="drop_down" size="1">
			                             	<a href="<? echo $product->url ?>">
				                             <option >
				                             <? foreach($product->variants as $k =>$value) {echo $product->name."-";
				                             	echo round($value->price, 2);} ?> грн.
			                             	</a>
				                             </option>
			                            </select>
			                    </li>
			                    <? endif; ?>
			                <? endforeach; ?>
			            </ul>
			        <? endif; ?>
			    </div>
			</div>

			</div>
		
		
		</div>
		  	     				
	<div id="wrap">
		<div id="main" class="clearfix"></div>
	</div>
	<hr>
		<footer id="footer">  
			<p> Site footer</p>
		</footer>
</body>
</html>
