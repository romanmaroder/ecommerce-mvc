<?php include( ROOT . '/views/layouts/header.php' );
    /** @var CatalogController $subcategories */
    /** @var CatalogController $categoryProducts */
    /** @var Pagination $pagination */
?>
    <main class="content">
        <div class="container">
            <div class="wrapper">
                <!--Вертикальная панель фильтров-->

                <div class="wrapper__content">
                    <form class="top-filter">
                        <div class="top-filter__col col-view">
                            <div class="top-filter__title">View as</div>
                            <div class="top-filter__content">
                                <div class="top-filter__icon top-filter__icon--list">
                                    <?php echo file_get_contents('./template/images/icon/list_icon.svg'); ?>
                                </div>
                                <div class="top-filter__icon top-filter__icon--grid">
                                    <?php echo file_get_contents('./template/images/icon/grid_icon.svg'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="top-filter__col col-sort">
                            <div class="top-filter__content">
                                <span>Все товары</span>
                            </div>
                        </div>
                        <div class="top-filter__col col-search">
                            <div class="top-filter__content">
                                <div class="top-filter__form form-filter"><input class="form-filter__input" type="text"
                                                                                 placeholder="Search by items"/>
                                    <div class="form-filter__icon"><img src="/template/images/filter/search_icon.png"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="view-grid">
                        <?php foreach ($categoryProducts as $product) : ?>
                            <li class="card card--bg card__grid" data-id="<?php echo $product['id']; ?>">
                                <a class="card__link card__add-btn" href="/cart/add/<?php echo $product['id']; ?>"
                                   data-id="<?php echo $product['id']; ?>">В корзину</a>
                                <div class="card__add"></div>
                                <div class="card__img card__img--grid"><img
                                            src="<?php echo Product::getImage($product['id']); ?>"
                                            alt="<?php echo $product['name']; ?>"
                                            title="<?php echo $product['name']; ?>"/>
                                </div>
                                <div class="card__content">
                                    <div class="card__title"><?php echo $product['name']; ?></div>
                                    <div class="card__subtitle"><?php echo $product['description']; ?></div>
                                    <div class="card__price">$<?php echo $product['price']; ?></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        <?php foreach ($categoryProducts as $product) : ?>
                            <li class="card card__list" data-id="<?php echo $product['id']; ?>">
                                <div class="card__img card__img--list">
                                    <img src="<?php echo Product::getImage($product['id']); ?>"
                                         alt="<?php echo $product['name']; ?>"
                                         title="<?php echo $product['name']; ?>"/>
                                </div>
                                <div class="card__content card__content--list">
                                    <a class="card__title"
                                       href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                    <div class="card__subtitle"><?php echo $product['description']; ?></div>
                                    <div class="card__price card__price--list">$<?php echo $product['price']; ?></div>
                                    <div class="card__text"><?php echo $product['content']; ?></div>
                                    <a href="/cart/add/<?php echo $product['id']; ?>"
                                       class="btn btn__card card__add-btn"
                                       data-id="<?php echo $product['id']; ?>">
                                        В корзину</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="pagination">
                        <?/*php echo $pagination->get(); */?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include( ROOT . '/views/layouts/footer.php' ); ?>