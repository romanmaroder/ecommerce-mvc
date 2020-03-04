<?php foreach ($ajaxProducts as $product) : ?>
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




