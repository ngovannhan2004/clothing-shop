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
    ],


// Menu list
    [
        'name' => 'Menus ',
        'icon' => 'fas fa-folder',
        'value' => 'menus',
        "children" => [
            [
                'name' => 'List Menu ',
                'value' => 'index',
                'icon' => 'fas fa-list',
                'route' => 'admin.menus.index'

            ],
            [
                'name' => 'Create Menu',
                'value' => 'create',
                'icon' => 'fas fa-plus',
                'route' => 'admin.menus.create'

            ]

        ]
    ],
    [
        'name' => 'Users ',
        'icon' => 'fas fa-folder',
        'value' => 'users',
        "children" => [
            [
                'name' => 'List User',
                'value' => 'index',
                'icon' => 'fas fa-list',
                'route' => 'admin.users.index'
            ],
            [
                'name' => 'Create User',
                'value' => 'create',
                'icon' => 'fas fa-plus',
                'route' => 'admin.users.create'
            ]
        ]
    ]
];
