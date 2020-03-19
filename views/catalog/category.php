<?php include( ROOT . '/views/layouts/header.php' );
    /** @var CatalogController $subcategories */
    /** @var CatalogController $categoryProducts */
    /** @var Pagination $pagination */
?>
    <main class="content">
        <div class="container">
            <div class="wrapper">
                <!--Вертикальная панель фильтров-->
                <aside class="aside-filter">
                    <div class="aside-filter__accordeon">
                        <div class="accordeon">
                            <div class="accordeon-head" data-accordeon-head="data-accordeon-head">Категории</div>
                            <div class="accordeon-body" data-accordeon-body="data-accordeon-body">
                                <ul class="accordeon-body__list">

                                    <?php foreach ($subcategories as $subcategory) : ?>
                                        <li class="accordeon-body__item">
                                            <a class="accordeon-body__link"

                                               href="<?php foreach ($navCategories as $category): ?>
<?php if ($categoryId == $category['cat_id']) echo $category['cat_id'];
                                               endforeach; ?>/subcategory/<?php echo $subcategory['sub_id']; ?>">
                                                <?php echo $subcategory['sub_name']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!--						<div class="accordeon">
                                                    <div class="accordeon-head" data-accordeon-head="data-accordeon-head">COLORS</div>
                                                    <div class="accordeon-body" data-accordeon-body="data-accordeon-body">
                                                        <form class="accordeon-body__form">
                                                            <div class="accordeon-body__block accordeon-body__block--marg"><input
                                                                        class="accordeon-body__radio" type="radio" name="color"
                                                                        id="blue" /><label for="blue"></label><input
                                                                        class="accordeon-body__radio" type="radio" name="color"
                                                                        id="yellow" /><label for="yellow"></label><input
                                                                        class="accordeon-body__radio" type="radio" name="color"
                                                                        id="green" /><label for="green"></label></div>
                                                            <div class="accordeon-body__block"><input class="accordeon-body__radio" type="radio"
                                                                                                      name="color" id="red" /><label
                                                                        for="red"></label><input class="accordeon-body__radio" type="radio"
                                                                                                 name="color" id="sky" /><label
                                                                        for="sky"></label><input class="accordeon-body__radio" type="radio"
                                                                                                 name="color" id="dark" /><label
                                                                        for="dark"></label></div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="accordeon">
                                                    <div class="accordeon-head" data-accordeon-head="data-accordeon-head">SIZES</div>
                                                    <div class="accordeon-body" data-accordeon-body="data-accordeon-body">
                                                        <form class="accordeon-body__form">
                                                            <div class="accordeon-body__block"><input class="accordeon-body__checkbox"
                                                                                                      type="checkbox" name="size"
                                                                                                      id="sizeXL" /><label
                                                                        class="accordeon-body__label" for="sizeXL">XL</label><input
                                                                        class="accordeon-body__checkbox" type="checkbox" name="size"
                                                                        id="sizeSL" /><label class="accordeon-body__label"
                                                                                             for="sizeSL">SL</label><input
                                                                        class="accordeon-body__checkbox" type="checkbox" name="size"
                                                                        id="sizeML" /><label class="accordeon-body__label"
                                                                                             for="sizeML">M</label>
                                                            </div>
                                                            <div class="accordeon-body__block"><input class="accordeon-body__checkbox"
                                                                                                      type="checkbox" name="size"
                                                                                                      id="sizeL" /><label
                                                                        class="accordeon-body__label" for="sizeL">L</label><input
                                                                        class="accordeon-body__checkbox" type="checkbox" name="size"
                                                                        id="sizeXXL" /><label class="accordeon-body__label"
                                                                                              for="sizeXXL">XXL</label><input
                                                                        class="accordeon-body__checkbox" type="checkbox" name="size"
                                                                        id="sizeM" /><label class="accordeon-body__label" for="sizeM">M</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="accordeon">
                                                    <div class="accordeon-head" data-accordeon-head="data-accordeon-head">PRICE RANGE</div>
                                                    <div class="accordeon-body" data-accordeon-body="data-accordeon-body">
                                                        <div class="range__slider" id="slider-range"><span
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"><label
                                                                        class="range__label" for="amount"></label><input class="range__input"
                                                                                                                         type="text" id="amount"
                                                                                                                         readonly="readonly" /></span><span
                                                                    class="ui-slider-handle ui-corner-all ui-state-default"><label
                                                                        class="range__label" for="amount1"></label><input class="range__input"
                                                                                                                          type="text"
                                                                                                                          id="amount1"
                                                                                                                          readonly="readonly" /></span>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </aside>
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
                                <div class="top-filter__title">Sort by</div>
                                <div class="top-filter__title top-filter__title--mobile">Categories</div>
                                <div class="top-filter__form top-filter__form--mobile"><select
                                            class="form-filter__select">
                                        <option value="Name">T-shirt</option>
                                        <option value="Shirt">Shirt</option>
                                        <option value="Shoes">Shoes</option>
                                        <option value="Bags">Bags</option>
                                        <option value="Jacket">Jacket</option>
                                        <option value="Sunglass">Sunglass</option>
                                        <option value="Cap">Cap</option>
                                        <option value="Belt">Belt</option>
                                        <option value="Jeans">Jeans</option>
                                        <option value="Shoes">Shoes</option>
                                    </select></div>
                                <div class="top-filter__form"><select
                                            class="form-filter__select form-filter__select--name-size" data-name="name">
                                        <option value="Name">Name</option>
                                        <option value="Size">Size</option>
                                    </select></div>
                            </div>
                            <div class="top-filter__content">
                                <div class="top-filter__title">Show items</div>
                                <div class="top-filter__title top-filter__title--mobile">Price</div>
                                <div class="top-filter__form form-filter"><select
                                            class="form-filter__select form-filter__select--item" data-item="item">
                                        <option value="Items">49 items</option>
                                        <option value="Items">29 items</option>
                                    </select></div>
                                <div class="top-filter__form top-filter__form--mobile"><select
                                            class="form-filter__select">
                                        <option value="max">100 - 0</option>
                                        <option value="min">0 -100</option>
                                    </select></div>
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
                                        В корзину </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="pagination">
                        <?php echo $pagination->get(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include( ROOT . '/views/layouts/footer.php' ); ?>