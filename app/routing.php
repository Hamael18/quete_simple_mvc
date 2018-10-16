<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method
        ['add','/items/add',['GET','POST']],
        ['edit','/items/edit/{id}',['GET','POST']],
        ['delete','/items/delete/{id}',['GET','POST']],
    ],
    'Category' => [ // Controller
        ['index', '/categories', 'GET'], // action, url, HTTP method
        ['show', '/category/{id}', 'GET'], // action, url, HTTP method
        ['add','/categories/add',['GET','POST']],
        ['edit','/categories/edit/{id}',['GET','POST']],
        ['delete','/categories/delete/{id}',['GET','POST']],
    ],
];