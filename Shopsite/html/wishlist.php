<?php if(!empty($cart2->items)) :?>
    <?php //$clean = clean($cart) ?>
    <div class="row text-center text-primary">
        <div class="col-lg-2">Фото</div>
        <div class="col-lg-4">Наименование</div>
    </div>
    <?php foreach ($cart2->items as $item) :?>
        <div class="row">
            <div class="col-lg-2">
                <img src="files/images/product.jpg" width="75px">
            </div>
            <div class="col-lg-4"><?php echo $item->name?></div>
        </div>
    <?php endforeach;?>
            
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>