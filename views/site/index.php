<?php include (ROOT.'/views/layouts/header.php');
/** @var TYPE_NAME $categories */
?>


<header class="header">
    <div class="container">
        <h1 class="header__title">Winter Collection</h1>
        <div class="header__subtitle">Buy stylish products in our shop!</div>
        <a class="header-button" href="/catalog/">
            <div class="header-button__text">SHOP NOW</div>
            <div class="header-button__arrow">
                <img src="/template/images/header/arrow_right.png" alt="arrow" title="shop now" />
            </div>
        </a>
    </div>
</header>
<main class="content">
    <section class="featured">
        <div class="container">
            <div class="featured__title title">Featured Items</div>
            <div class="featured__subtitle subtitle">Let’s see featured items!</div>
            <div class="featured__slider">
                <div class="slider responsive">
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/bag.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/clock.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/bag_wooman.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/bag.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/clock.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card">
                            <div class="card__img"><img src="/template/images/future/bag_wooman.jpg" alt="Vaber Jinish Very Stylish" title="Vaber Jinish Very Stylish" /></div>
                            <div class="card__content">
                                <div class="card__title">Vaber Jinish Very Stylish</div>
                                <div class="card__rating"><img src="/template/images/future/star.png" alt="images/future/star.png" title="images/future/star.png" /></div>
                                <div class="card__price">$255</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products">
        <div class="container">
            <div class="products__title title">Products Collections</div>
            <div class="products__subtitle subtitle">Check out popular products in our shop!</div>
            <div class="products__filter filter">
                <ul class="filter__list">
                    <?php foreach ($categories as $categoryItem) :?>
                    <li class="filter__item">
                        <a class="filter__link" href="#" data-href="/category/<?php echo $categoryItem['cat_id'];?>">
                            <?php echo $categoryItem['category_name'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <ul class="products__content">
                <?php foreach ($latestProducts as $product ) :?>
                <li class="card card--bg" data-id="<?php echo $product['id'];?>">
                    <a class="card__link card__add-btn" href="#" data-id="<?php echo $product['id'];?>">Add to card</a>
                    <div class="card__add"></div>
                    <div class="card__img">
                        <img src="<?php echo $product['image'];?>" alt="<?php echo $product['name'];?>" title="<?php echo $product['name'];?>" />
                    </div>
                    <div class="card__content">
                        <div class="card__title"><?php echo $product['name'];?></div>
                        <div class="card__subtitle"><?php echo $product['description'];?></div>
                        <div class="card__price">$<?php echo $product['price'];?></div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <div class="products__button-block"><button class="products__btn btn__product">MORE</button></div>
        </div>
    </section>
    <section class="subscribe content">
        <div class="container">
            <div class="subscribe__title title">Subscribe To Our Newsletter</div>
            <div class="subscribe__subtitle subtitle">Only our latest news to send your email addre</div>
            <form class="subscribe__form form"><input class="form__input" type="email" placeholder="Enter your email address" name="email" /><button class="form__button btn__form-subscribe">Subscribe</button></form>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="news__title title">Latest New’s</div>
            <div class="news__subtitle subtitle">Read latests new’s in our blog</div>
            <div class="news__content">
                <div class="news__column news__column--one">
                    <article class="article-news">
                        <div class="article-news__img"><img src="/template/images/news/indus.jpg" alt="news" title="news" /></div>
                        <div class="article-news__content">
                            <div class="article-news__title article-news__title--big">Top kamla of this year!</div>
                            <div class="article-news__text">Ashole uni kamla noy uni VONDU & uni dami pc use kore so unar digayn o dami. Typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop</div><a class="article-news__btn">READ MORE</a>
                        </div>
                    </article>
                </div>
                <div class="news__column">
                    <article class="article-news">
                        <div class="article-news__img"><img src="/template/images/news/glass_man.jpg" alt="news" title="news" /></div>
                        <div class="article-news__content">
                            <div class="article-news__title">Specialize in Mobile and Web UI/UX!</div>
                            <div class="article-news__text">Kotha sotto blv it or not, is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text. ever. since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        </div>
                    </article>
                    <article class="article-news">
                        <div class="article-news__img"><img src="/template/images/news/cap.jpg" alt="news" title="news" /></div>
                        <div class="article-news__content">
                            <div class="article-news__title">Best photo of this month!</div>
                            <div class="article-news__text">Kotha sotto blv it or not, is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text. ever. since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include(ROOT .'/views/layouts/footer.php');