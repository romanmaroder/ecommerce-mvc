<?php
    declare( strict_types=1 );
    return [
        //Товар
        'product/([0-9]+)'                                     => 'product/view/$1',
        'products'                                             => 'product/list', //actionList в ProductController


        // Категория товаров:
        // actionCategory в CatalogController
        'category/([0-9]+)/subcategory/([0-9]+)/page-([0-9]+)' => 'catalog/subcategory/$1/$2/$3',
        'category/([0-9]+)/subcategory/([0-9]+)'               => 'catalog/subcategory/$1/$2',
        'category/([0-9]+)/page-([0-9]+)'                      => 'catalog/category/$1/$2',


        // actionSubcategory в CatalogController
        'category/([0-9]+)'                                    => 'catalog/category/$1',
        //    Каталог
        'catalog'                                              => 'catalog/index',

        //    Корзина
        'cart/checkout'                                        => 'cart/checkout',
        'cart/delete/([0-9]+)'                                 => 'cart/delete/$1',
        'cart/deleteAjax/([0-9]+)'                             => 'cart/deleteAjax/$1',
        'cart/clear'                                           => 'cart/clear',
        'cart/add/([0-9]+)'                                    => 'cart/add/$1',
        'cart/addAjax/([0-9]+)'                                => 'cart/addAjax/$1',
        'cart'                                                 => 'cart/index',

        //    Пользователь
        'user/register'                                        => 'user/register',
        'user/login'                                           => 'user/login',
        'user/logout'                                          => 'user/logout',
        'cabinet/edit'                                         => 'cabinet/edit',
        'cabinet/history'                                      => 'cabinet/history',
        'cabinet/view/([0-9]+)'                                => 'cabinet/view/$1',
        'cabinet'                                              => 'cabinet/index',
        //    О нас
        'contacts'                                             => 'site/contact',

        // Управление новостями
        'admin/news/create'                                    => 'adminNews/create',
        'admin/news/update/([0-9]+)'                           => 'adminNews/update/$1',
        'admin/news/delete/([0-9]+)'                           => 'adminNews/delete/$1',
        'admin/news'                                           => 'adminNews/index',
        // actionIndex в AdminNewsController
        // actionIndex в AdminNewsController

        //        Управление товарами
        'admin/product/create'                                 => 'adminProduct/create',
        'admin/product/update/([0-9]+)'                        => 'adminProduct/update/$1',
        'admin/product/delete/([0-9]+)'                        => 'adminProduct/delete/$1',
        'admin/product'                                        => 'adminProduct/index',
        //Управление категориями
        'admin/subcategory/create'                             => 'adminSubCategory/create',
        'admin/subcategory/update/([0-9]+)'                    => 'adminSubCategory/update/$1',
        'admin/subcategory/delete/([0-9]+)'                    => 'adminSubCategory/delete/$1',
        'admin/subcategory'                                    => 'adminSubCategory/index',
        //        Управление заказами
        'admin/order/update/([0-9]+)'                          => 'adminOrder/update/$1',
        'admin/order/delete/([0-9]+)'                          => 'adminOrder/delete/$1',
        'admin/order/view/([0-9]+)'                            => 'adminOrder/view/$1',
        'admin/order'                                          => 'adminOrder/index',

        //    Админпанель
        'admin'                                                => 'admin/index',

        //    Новости
        'news/([0-9]+)'                                        => 'news/view/$1',
        'news'                                                 => 'news/index',   // actionIndex в NewsController
        //        Главная страница
        'site/ajax/([0-9]+)'                                   => 'site/ajax/$1', // actionAjax в SiteController
        'index.php'                                            => 'site/index',
        ''                                                     => 'site/index',   //actionIndex в SiteController
    ];


