<?php
return array(
    'product/([0-9]+)' => 'product/view/$1',

    'news/([0-9]+)' => 'news/view/$1',

    'news' => 'news/index', // actionIndex в NewsController
    'products' => 'product/list', //actionList в ProductController
    '' => 'site/index', //actionIndex в SiteController
);