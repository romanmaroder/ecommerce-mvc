<?php include (ROOT.'/views/layouts/header.php');
    /** @var NewsController $newsItem */
?>
<main>
    <div class="container">
        <section class="news-one">
            <h1 class="news-one__title"><?php echo $newsItem['title'];?></h1>
            <div class="news-one__content">
                <div class="news-one__img">
                    <img src="<?php echo News::getImage( $newsItem['id']);?>" alt="">
                </div>
                <div class="news-one__text"><?php echo $newsItem['content'];?></div>
                <div class="news-one__info">
                    <div class="news-one__author">Автор: <?php echo $newsItem['author_name'];?></div>
                    <time  datetime="<?php echo $newsItem['date'];?>"><?php echo $newsItem['date'];?></time>
                    <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="news-one-btn">Назад</a>
                </div>

            </div>
        </section>

    </div>
</main>

<?php include (ROOT .'/views/layouts/footer.php');?>

