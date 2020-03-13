<?php include( ROOT . '/views/layouts/header.php' );
?>
<main>
    <div class="container">
        <section class="news-block">
            <ul class="news-block__list">
                <?php foreach ( $newsList

                    as $news ) : ?>
                <li class="news-block__item">
                    <a href="<?php echo $news['id']; ?>">
                        <img src="<?php echo News::getImage($news['id']); ?>" alt="image">
                        <h3><?php echo $news['title']; ?></h3>
                        <p><?php echo $news['short_content']; ?></p>
                        <p><?php echo $news['author_name']; ?></p>
                    </a>
                </li>
            </ul>
            <?php endforeach; ?>
        </section>

    </div>
</main>


<?php include( ROOT . '/views/layouts/footer.php' ); ?>
