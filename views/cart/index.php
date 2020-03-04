<?php require_once (ROOT . '/views/layouts/header.php') ?>


    <main class="content">
        <section class="cart-block">
            <div class="container">
                <?php if ($productsInCart): ?>
					<h1 class="cart-block__title title" data-js-empty="data-js-empty">Basket</h1>
                    <ul class="cart-block__inner cart-inner" data-js-goods-list="data-js-goods-list">
                        <li class="cart-inner__head cart-head">
                            <div class="cart-head__item">ITEM</div>
                            <div class="cart-head__item">NAME AND DISCRIPTION</div>
                            <div class="cart-head__item">PRICE</div>
                            <div class="cart-head__item">QUANTITY</div>
                            <div class="cart-head__item">TOTAL</div>
                        </li>
                        <hr/>
                        <?php foreach ($products as $product): ?>
                            <li class="cart-inner__goods goods" >
								<a href="/cart/delete/<?php echo $product['id'];?>" class="goods__close card__close--btn" data-id="<?php echo $product['id'];?>">X</a>
                                <div class="goods__item goods__item--img">
                                    <img src="<?php echo Product::getImage($product['id']); ?>"/>
                                </div>
                                <div class="goods__item goods__item--desc desc-inner">
                                    <div class="desc-inner__title"><?php echo $product['name'] ;?></div>
                                    <div class="desc-inner__option">Color :<?php echo $product['color'] ;?></div>
                                    <div class="desc-inner__option">Size :<?php echo $product['size'] ;?></div>
                                    <div class="desc-inner__price desc-inner__price--visible">Price : $<?php echo $product['price'] ;?></div>
                                    <div class="desc-inner__count desc-inner__count--visible">Count : <?php echo $productsInCart[$product['id']] ;?></div>
                                    <div class="desc-inner__total desc-inner__total--visible">Total : $<?php echo $productsInCart[$product['id']] * $product['price'];?></div>
                                </div>
                                <div class="goods__item goods__item--price">$<?php echo $product['price'] ;?></div>
                                <div class="goods__item goods__item--count"><?php echo $productsInCart[$product['id']] ;?></div>
                                <div class="goods__item goods__item--total">$<?php echo $productsInCart[$product['id']] * $product['price'];?></div>
                            </li>
                            <hr/>
                        <?php endforeach; ?>
                    </ul>
                    <div class="cart-block__btn">
                        <a href="/cart/clear" class="btn btn__clear" data-js-goods-clear="data-js-goods-clear">Clear</a>
                        <div class="btn btn__total" data-js-goods-total="data-js-goods-total">SUBTOTAL : $<?php echo $totalPrice; ?></div>
                    </div>
					<a href="/cart/checkout" class="cart-block__center btn btn__cart btn__cart--checkout" >Checkout</a>
                <?php else:; ?>
				<h1 class="cart-block__title title" data-js-empty="data-js-empty">Your Basket is empty</h1>
			<?php endif;?>
				<a class="cart-block__center btn btn__cart" href="/">Continue shopping</a>
            </div>
        </section>
    </main>


<?php require_once (ROOT . '/views/layouts/footer.php'); ?>