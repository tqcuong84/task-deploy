<?php

return [
    [
        "title" => "Dashboard",
        "route" => 'admin.dashboard',
        "icon" => "fa fa-dashboard"
    ],
    [
        "title" => "Sản phẩm",
        "route" => "product.index",
        "icon" => "fa fa-cube",
        "childs" => [
            [
                "title" => "Danh sách",
                "route" => "product.index"
            ],
            [
                "title" => "Thêm mới",
                "route" => "product.create"
            ]
        ]
    ]
];