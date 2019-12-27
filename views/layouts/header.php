<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/template/libs/slick.css" />
    <link rel="stylesheet" href="/template/libs/slick-theme.css" />
    <link rel="stylesheet" href="/template/libs/magnific-popup.css" />
    <link rel="stylesheet" href="/template/libs/jquery.formstyler.theme.css" />
    <link rel="stylesheet" href="/template/libs/jquery.formstyler.css" />
    <link rel="stylesheet" href="/template/css/main.css" />

    <link rel="stylesheet" href="/template/css/home.css" />

<!--    стили для страницы с фильтрами-->
    <link rel="stylesheet" href="/template/css/view.css" />

<!--    стили для страницы одного товара-->
    <link rel="stylesheet" href="/template/css/product-details.css" />


    <title>Главная</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap&amp;subset=cyrillic" />
    <!--link(rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css")-->
    <!--link(rel="stylesheet" href="libs/all.css")-->
</head>

<body>
<nav class="nav">
    <div class="nav-container container">
        <div class="nav-logo logo"><span class="logo__text logo__text--special">ex</span><span class="logo__text">plore</span></div><a class="nav__burger burger"><span class="burger__line"></span></a>
        <ul class="nav-menu menu">
            <li class="menu__item"><a class="menu__link" href="/">Home</a></li>
            <?php foreach ($navCategories as $category):?>
                <li class="menu__item">
                    <a class="menu__link<?php if($categoryId == $category['cat_id']) echo '--active';?>" href="/category/<?php echo $category['cat_id'] ?>"><?php echo $category['category_name'] ?></a>
                </li>
            <?php endforeach;?>
            <li class="menu__item"><a class="menu__link" href="/blog/">Blog</a></li>
        </ul>
        <div class="nav-cart cart" data-count="3">
            <img src="/template/images/nav/header_cart.png" alt="cart" title="Cart" />
            <div class="cart__mini-cart"></div>
        </div>
        <div class="nav-login login">
            <div class="login__inner"><select class="login__select">
                    <option value="my_account">My Account</option>
                    <option value="registration">Registration</option>
                    <option value="quit">Quit</option>
                </select>
                <div class="login__arrow"></div>
            </div>
        </div>
    </div>
</nav>
