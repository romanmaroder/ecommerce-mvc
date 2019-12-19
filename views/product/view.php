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
                    <div class="slider-for__item"><img src="/template/images/products/bag_big.png" /></div>
                    <div class="slider-for__item"><img src="/template/images/products/bag_big.png" /></div>
                    <div class="slider-for__item"><img src="/template/images/products/bag_big.png" /></div>
                    <div class="slider-for__item"><img src="/template/images/products/bag_big.png" /></div>
                </div>
                <div class="slider slider-nav">
                    <div class="slider-nav__item"><img src="/template/images/products/bag_wooman.png" /></div>
                    <div class="slider-nav__item"><img src="/template/images/products/bag_wooman.png" /></div>
                    <div class="slider-nav__item"><img src="/template/images/products/bag_wooman.png" /></div>
                    <div class="slider-nav__item"><img src="/template/images/products/bag_wooman.png" /></div>
                </div>
                <div class="product__content">
                    <div class="product__title">Bag of ruposhi</div>
                    <div class="product__price">$28</div>
                    <div class="product__text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</div>
                    <form class="product__form form-details">
                        <div class="form-details__block"><select class="form-details__select elem-select">
                                <option value="colors">Colors</option>
                            </select><select class="form-details__select elem-select">
                                <option value="Sizes">Sizes</option>
                            </select></div><button class="btn btn__form-details">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include (ROOT .'/views/layouts/footer.php');