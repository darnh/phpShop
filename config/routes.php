<?php

    return array(
        // Product
        'product/([0-9]+)'=>'product/view/$1', //actionView в ProductController
        // Catalog
        'catalog'=>'catalog/index', // actionIndex в CatalogController
        //Category
        'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2', //actionCategory в CatalogController
        'category/([0-9]+)'=>'catalog/category/$1', //actionCategory в CatalogController
        // Cart
        'cart/checkout' => 'cart/checkout', // actionAdd в CartController
        'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
        'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
        'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
        'cart' => 'cart/index', // actionIndex в CartController
        // User
        'user/register'=>'user/register',
        'user/login'=> 'user/login',
        'user/logout'=>'user/logout',
        'cabinet/edit'=>'cabinet/edit',
        'cabinet'=>'cabinet/index',
        // Management product:
        'admin/product/create'=>'adminProduct/create',
        'admin/product/update/([0-9]+)'=>'adminProduct/update/$1',
        'admin/product/delete/([0-9]+)'=>'adminProduct/delete/$1',
        'admin/product'=>'adminProduct/index',
        // Management category
        'admin/category/create'=>'adminCategory/create',
        'admin/category/update/([0-9]+)'=>'adminCategory/update/$1',
        'admin/category/delete/([0-9]+)'=>'adminCategory/delete/$1',
        'admin/category'=>'adminCategory/index',
        // Management order
        'admin/order/update/([0-9]+)'=>'adminOrder/update/$1',
        'admin/order/delete/([0-9]+)'=>'adminOrder/delete/$1',
        'admin/order/view/([0-9]+)'=>'adminOrder/view/$1',
        'admin/order'=>'adminOrder/index',
        // Admin panel:
        'admin'=>'admin/index',
        // About site
        'contact'=>'site/contact',
        'about'=>'site/about',
        // Home page
        ''=>'site/index', //actionIndex в SiteController
    );
