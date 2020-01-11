<?php
return [
    'product/([0-9]+)'                => 'product/view/$1',
    'products'                        => 'product/list', //actionList в ProductController
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)'               => 'catalog/category/$1',
    'catalog'                         => 'catalog/index',
    'cart/checkout'                   => 'cart/checkout',
    'cart/delete/([0-9]+)'            => 'cart/delete/$1',
    'cart/deleteAjax/([0-9]+)'        => 'cart/deleteAjax/$1',
    'cart/clear'                      => 'cart/clear',
    'cart/add/([0-9]+)'               => 'cart/add/$1',
    'cart/addAjax/([0-9]+)'           => 'cart/addAjax/$1',
    'cart'                            => 'cart/index',
    'news/([0-9]+)'                   => 'news/view/$1',
    'news'                            => 'news/index',   // actionIndex в NewsController
    'user/register'                   => 'user/register',
    'user/login'                      => 'user/login',
    'user/logout'                     => 'user/logout',
    'cabinet/edit'                    => 'cabinet/edit',
    'cabinet'                         => 'cabinet/index',
    'contacts'                        => 'site/contact',
    'popular/([0-9]+)'               => 'ajax/post/$1',


    '' => 'site/index',   //actionIndex в SiteController
];