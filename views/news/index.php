<?php include( ROOT . '/views/layouts/header.php' );
?>
<main>
    <div class="container">
        <section class="news-block">
            <ul class="news-block__list">
                <?php foreach ( $newsList as $news ) : ?>
                     <?php if ($news['visible'] != 3){;?>
                    <li class="news-block__item">
                        <div class="news-block__img">
                            <a href="<?php echo $news['id']; ?>">
                                <img src="<?php echo News::getImage($news['id']); ?>" alt="image"></a></div>
                        <div class="news-block__content">
                            <a class="news-block__link" href="<?php echo $news['id']; ?>">
                                <h3 class="news-block__title"><?php echo $news['title']; ?></h3>
                            </a>
                            <p><?php echo $news['short_content']; ?></p>
                            <div class="news-block__info">
                                <div class="news-block__author">Автор: <?php echo $news['author_name'];?></div>
                                <time  datetime="<?php echo $news['date'];?>"><?php echo $news['date'];?></time>
                            </div>
                        </div>
                    </li>
                    <?php };?>
                <?php endforeach; ?>
            </ul>
        </section>

    </div>
</main>


<?php include( ROOT . '/views/layouts/footer.php' ); ?>
