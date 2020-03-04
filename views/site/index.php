<?php include(ROOT . '/views/layouts/header.php');
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
	<main class="content home">
		<section class="featured">
			<div class="container">
				<div class="featured__title title">Featured Items</div>
				<div class="featured__subtitle subtitle">Let’s see featured items!</div>
				<div class="featured__slider">
					<div class="slider responsive">
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/bag.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
									<div class="card__price">$255</div>
								</div>
							</div>
						</div>
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/clock.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
									<div class="card__price">$255</div>
								</div>
							</div>
						</div>
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/bag_wooman.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
									<div class="card__price">$255</div>
								</div>
							</div>
						</div>
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/bag.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
									<div class="card__price">$255</div>
								</div>
							</div>
						</div>
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/clock.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
									<div class="card__price">$255</div>
								</div>
							</div>
						</div>
						<div class="slider__item">
							<div class="card">
								<div class="card__img"><img src="/template/images/future/bag_wooman.jpg"
															alt="Vaber Jinish Very Stylish"
															title="Vaber Jinish Very Stylish" /></div>
								<div class="card__content">
									<div class="card__title">Vaber Jinish Very Stylish</div>
									<div class="card__rating"><img src="/template/images/future/star.png"
																   alt="images/future/star.png"
																   title="images/future/star.png" /></div>
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
                        <?php foreach ($categories as $categoryItem) : ?>
							<li class="filter__item">
								<a class="filter__link <?php if ($categoryId == $categoryItem['cat_id']) echo ' filter__link--active'; ?>"
								   href="/popular/<?php echo $categoryItem['cat_id']; ?>"
								   data-cat_id="<?php echo $categoryItem['cat_id']; ?>">
                                    <?php echo $categoryItem['category_name']; ?></a>
							</li>
                        <?php endforeach; ?>
					</ul>
				</div>

				<ul class="products__content" data-count="<? /*php echo $total;*/ ?>">
                    <?php foreach ($productsByCategory as $product) : ?>
						<li class="card card--bg" data-id="<?php echo $product['id']; ?>">
							<a class="card__link card__add-btn" href="/cart/add/<?php echo $product['id']; ?>"
							   data-id="<?php echo $product['id']; ?>">Add to card</a>
							<div class="card__add"></div>
							<div class="card__img">
								<img src="<?php echo Product::getImage($product['id']); ?>" alt="<?php echo $product['name']; ?>"
									 title="<?php echo $product['name']; ?>" />
							</div>
							<div class="card__content">
								<div class="card__title"><?php echo $product['name']; ?></div>
								<div class="card__subtitle"><?php echo $product['description']; ?></div>
								<div class="card__price">$<?php echo $product['price']; ?></div>
							</div>
						</li>
                    <?php endforeach; ?>
				</ul>

				<!--				<div class="products__button-block">-->
				<!--                    --><?php //echo $pagination->get();?>
				<!---->
				<!--					<button class="products__btn btn__product" data-cat_id="" data-page="1">MORE</button>-->
				<!--				</div>-->
			</div>
		</section>
		<section class="subscribe content">
			<div class="container">
				<div class="subscribe__title title">Subscribe To Our Newsletter</div>
				<div class="subscribe__subtitle subtitle">Only our latest news to send your email addre</div>
                <?php if (isset($errors) && is_array($errors)): ?>
					<ul class="form-block__errors errors">
                        <?php foreach ($errors as $error): ?>
							<li class="errors__item">-<?php echo $error; ?></li>
                        <?php endforeach; ?>
					</ul>
                <?php endif; ?>
				<form class="subscribe__form " method="POST">
					<input class="form__input" type="text" placeholder="Enter your email address" name="emailSubscribe" />
					<input class="form__button btn__form-subscribe" type="submit" value="Subscribe">
				</form>
			</div>
		</section>
		<section class="news">
			<div class="container">
				<div class="news__title title">Latest New’s</div>
				<div class="news__subtitle subtitle">Read latests new’s in our blog</div>
				<div class="news__content">
                    <?php foreach ($newsList as $news): ?>
						<article class="article-news">
							<div class="article-news__img" style="background : url(<?php echo $news['preview']; ?>)">
							</div>
							<div class="article-news__content">
								<div class="article-news__title article-news__title--big"><?php echo $news['title']; ?></div>
								<div class="article-news__text"><?php echo $news['short_content']; ?>
								</div>
                                <?php if ($news['type'] == 1): ?>
									<?php echo'<a class="article-news__btn">READ MORE</a>';?>
                                <?php endif; ?>
							</div>
						</article>
                    <?php endforeach; ?>
				</div>
			</div>
		</section>
	</main>

<?php include(ROOT . '/views/layouts/footer.php');