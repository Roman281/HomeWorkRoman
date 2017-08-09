<?php require_once 'html/functions.php' ?>
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
            <div id = 'basket'>
                <a href="">
                <img src="files/images/basket1.png" width="40">
                <p>Ваша корзина </p> <input class = 'bask' type="namber" name="basketnum" size="1*10">товаров
                </a>
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

                <div> <?php $r = viewProduct( $_GET['products']) ?></div>
            </div>
            <div class="row col-lg-12">
                <div class="panel-footer">
                    <h2 class="panel-heading">Footer</h2>
                    <?php timeVisit($data2) ?>
                    <a href=""> <?php lastUrl ($url)  ?></a>
                </div>
            </div>
        </div>
    </div>




</body>
</html>