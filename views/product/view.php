<?php include (ROOT.'/views/layouts/header.php') ?>
<!-- bread crumbs-->
<div class="breadcrumbs content">
    <div class="container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="home.html">home /</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="women.html"> women /</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="product detail.html"> product detail</a></li>
        </ul>
    </div>
</div>
<main class="content">
    <section class="product">
        <div class="container">
            <div class="product__inner">
                <div class="slider slider-for">
                    <div class="slider-for__item"><img src="<?php echo $product['image_big'];?>" /></div>
                    <div class="slider-for__item"><img src="<?php echo $product['image_big_2'];?>" /></div>
                    <div class="slider-for__item"><img src="<?php echo $product['image_big_3'];?>" /></div>
                    <div class="slider-for__item"><img src="<?php echo $product['image_big'];?>" /></div>
                </div>
                <div class="slider slider-nav">
                    <div class="slider-nav__item"><img src="<?php echo $product['image'];?>" /></div>
                    <div class="slider-nav__item"><img src="<?php echo $product['image_2'];?>" /></div>
                    <div class="slider-nav__item"><img src="<?php echo $product['image_3'];?>" /></div>
                    <div class="slider-nav__item"><img src="<?php echo $product['image'];?>" /></div>
                </div>
                <div class="product__content">
                    <div class="product__title"><?php echo $product['name'];?></div>
                    <div class="product__price">$<?php echo $product['price'];?></div>
                    <div class="product__text"><?php echo $product['content'];?></div>
                    <form class="product__form form-details">
                        <div class="form-details__block">
                            <select class="form-details__select elem-select">
                                <option value="" hidden>Color</option>
                                <option value="colors"><?php echo $product['color'];?></option>
                            </select>
                            <select class="form-details__select elem-select">
                                <option value="" hidden>Sizes</option>
                                <option value="Sizes"><?php echo $product['size'];?></option>
                            </select>
                        </div><button class="btn btn__form-details">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include (ROOT .'/views/layouts/footer.php');