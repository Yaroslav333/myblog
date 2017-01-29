<?php

return array(
    'adminmanager/update/([0-9]+)' => 'adminManager/update/$1',
    'adminmanager/delete/([0-9]+)' => 'adminManager/delete/$1',
    'adminmanager/create' => 'adminManager/create',

    'adminmanager' => 'adminManager/index',

    'admincategory/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admincategory/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admincategory/create' => 'adminCategory/create',
    'admincategory' => 'adminCategory/index',

    'control/create' => 'control/create',
    'control/post/update/([0-9]+)' => 'control/update/$1',
    'control/post/delete/([0-9]+)' => 'control/delete/$1',
    'control'=>'control/index',
    'admin'=> 'admin/index',

    'user/login'=> 'user/login',
    'user/logout' => 'user/logout',
    'post/([0-9]+)' => 'post/view/$1',





    'cabinet'=> 'cabinet/index',
    'category/([0-9]+)/page-([0-9]+)' => 'category/index/$1/$2',
    'category/([0-9]+)' => 'category/index/$1',
    'page-([0-9]+)' => 'post/index/$1',
    '' => 'post/index',









);