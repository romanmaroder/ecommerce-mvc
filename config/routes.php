<?php
    return [
        //Товар
        'product/([0-9]+)'                => 'product/view/$1',
        'products'                        => 'product/list', //actionList в ProductController
        //    Категории
        'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
        'category/([0-9]+)'               => 'catalog/category/$1',
        //    Каталог
        'catalog'                         => 'catalog/index',
        'cart/checkout'                   => 'cart/checkout',
        //    Корзина
        'cart/delete/([0-9]+)'            => 'cart/delete/$1',
        'cart/deleteAjax/([0-9]+)'        => 'cart/deleteAjax/$1',
        'cart/clear'                      => 'cart/clear',
        'cart/add/([0-9]+)'               => 'cart/add/$1',
        'cart/addAjax/([0-9]+)'           => 'cart/addAjax/$1',
        'cart'                            => 'cart/index',
        //    Новости
        'news/([0-9]+)'                   => 'news/view/$1',
        'news'                            => 'news/index',   // actionIndex в NewsController
        //    Пользователь
        'user/register'                   => 'user/register',
        'user/login'                      => 'user/login',
        'user/logout'                     => 'user/logout',
        'cabinet/edit'                    => 'cabinet/edit',
        'cabinet'                         => 'cabinet/index',
        //    О нас
        'contacts'                        => 'site/contact',
        //        Управление товарами
        'admin/product/create'            => 'adminProduct/create',
        'admin/product/update/([0-9]+)'   => 'adminProduct/update/$1',
        'admin/product/delete/([0-9]+)'   => 'adminProduct/delete/$1',
        'admin/product'                   => 'adminProduct/index',
        //Управление категориями
        'admin/category/create'           => 'adminCategory/create',
        'admin/category/update/([0-9]+)'  => 'adminCategory/update/$1',
        'admin/category/delete/([0-9]+)'  => 'adminCategory/delete/$1',
        'admin/category'                  => 'adminCategory/index',
        //        Управление заказами
        'admin/order/update/([0-9]+)'=>'adminOrder/update/$1',
        'admin/order/delete/([0-9]+)'=>'adminOrder/delete/$1',
        'admin/order/view/([0-9]+)'=>'adminOrder/view/$1',
        'admin/order'=>'adminOrder/index',
        //    Админпанель
        'admin'                           => 'admin/index',
        //        Главная страница
        'site/ajax/([0-9]+)'              => 'site/ajax/$1', // actionAjax в SiteController
        'index.php'                       => 'site/index',
        ''                                => 'site/index',   //actionIndex в SiteController
    ];