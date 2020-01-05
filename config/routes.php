<?php
return [
    'product/([0-9]+)'                => 'product/view/$1',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)'               => 'catalog/category/$1',
    'catalog'                         => 'catalog/index',
    'news/([0-9]+)'                   => 'news/view/$1',
    'news'                            => 'news/index',   // actionIndex в NewsController
//    'products'                        => 'product/list', //actionList в ProductController
    'user/register'                   => 'user/register',
    'user/login'                      => 'user/login',
    'user/logout'                      => 'user/logout',
    'cabinet'                         => 'cabinet/index',
    ''                                => 'site/index',   //actionIndex в SiteController
];