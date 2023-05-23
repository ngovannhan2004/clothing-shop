<?php
return [
    [
        "name" => 'Categories',
        "icon" => 'fas fa-folder',
        "value" => 'categories',
        "children" => [
            [
                'name' => 'List Category',
                'value' => 'index',
                'icon' => 'fas fa-list',
                'route' => 'admin.categories.index'

            ],
            [
                'name' => 'Create Category',
                'value' => 'create',
                'icon' => 'fas fa-plus',
                'route' => 'admin.categories.create'
            ],

        ]
    ],
    //product

    [
        "name" => 'Products',
        "icon" => 'fas fa-folder',
        "value" => 'products',
        "children" => [
            [
                'name' => 'List Product',
                'value' => 'index',
                'icon' => 'fas fa-list',
                'route' => 'admin.products.index'

            ],
            [
                'name' => 'Create Product',
                'value' => 'create',
                'icon' => 'fas fa-plus',
                'route' => 'admin.products.create'
            ]
        ]
    ]

];
