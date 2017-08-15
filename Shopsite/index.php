<?php require_once 'html/functions.php' ?>
<?php  $cart = getCart($products) ?>
<?php  $cart2 = getWish($products) ?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Мой магазин</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/product.css">


</head>
<body>

    <div class="row">
        <div class="bg-info col-lg-12">
            <?php viewMenu($pages) ?>
           <div class = 'list'>
                    <div id = 'wish'>
                        <a href="?r=wishlist">
                        <img src="files/images/wish.png" width="40">
                        <p>В избранное </p> 
                    </div>
                    <div id = 'basket'>
                        <a href="?r=cart">
                        <img src="files/images/basket1.png" width="40">
                        <p>Ваша корзина </p> <input class = 'bask' type="namber" name="basketnum" value = "<?php echo $cart->total_amount;?>" size="1*10"> 
                        товаров
                        на сумму <?php echo $cart->total_price;?> грн.
                        </a>
                    </div>
               
            </div>
        </div>
    </div>


    <div class="row">
        <div class="container">
            <div class="col-lg-4 panel panel-default">
                <h2 class="panel-heading">Sidebar</h2>
                <div class="">
                    <?php
                        $categories_tree = makeTree($categories);
                        viewCategories($categories_tree);
                    ?>
                </div>
            </div>
            <div class="col-lg-8 panel panel-default">
                <h2 class="panel-heading">Content</h2>

                <div> <?php require_once 'html/content.php' ?></div>
            </div>
            <div class="row col-lg-12">
            <hr>
                <div class="panel-footer">
                    <h2 class="panel-heading">Footer</h2>
                    <?php echo $data2; ?>
                    <br>
                    <a href=""> <?php echo $url2;  ?></a>
                </div>
            </div>
        </div>
    </div>




</body>
</html>