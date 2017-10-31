<?php

return [
    "profile" => [
        "background" => "https://wrappixel.com/demos/admin-templates/material-pro/assets/images/background/user-info.jpg",
        "photo" => "https://wrappixel.com/demos/admin-templates/material-pro/assets/images/users/profile.png",
        "name" => "Matthew Doe",
        /* Menu must be along side with name */
        "menu" => [
            [
                "label" => '<i class="ti-user"></i> My Profile',
                "url" => ["/"]
            ],
            [
                "label" => '<i class="ti-wallet"></i> My Balance',
                "url" => ["/"]
            ],
            [
                "label" => '<i class="ti-email"></i> Inbox',
                "url" => ["/"]
            ],
            [ "divider" ],
            [
                "label" => '<i class="ti-settings"></i> Account Setting',
                "url" => ["/"]
            ],
            [ "divider" ],
            [
                "label" => '<i class="fa fa-power-off"></i> Logout',
                "url" => ["/"]
            ],
        ]
    ],
    "menu" => [],
    "footer" => [
        "menu" => [
            [
                "label" => '<i class="ti-settings"></i>',
                "url" => ["site/url"]
            ],
            [
                "label" => '<i class="mdi mdi-gmail"></i>',
                "url" => ["site/url"]
            ],
            [
                "label" => '<i class="mdi mdi-power"></i>',
                "url" => ["site/url"]
            ],
        ]
    ],
];
