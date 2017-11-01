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
    "menu" => [
        "items" => [
            [ "label" => "Personal" ],
            [
                "label" => "Dashboard",
                "icon" => "<i class=\"mdi mdi-gauge\"></i>",
                "items" => [
                    [
                        "label" => "Dashboard 1",
                        "url" => ["site/index"],
                    ],
                    [
                        "label" => "Dashboard 2",
                        "url" => ["site/index1"],
                    ],
                    [
                        "label" => "Dashboard 3",
                        "url" => ["site/index1"],
                    ],
                ]
            ],
            [
                "label" => "App",
                "icon" => "<i class=\"mdi mdi-bullseye\"></i>",
                "items" => [
                    [
                        "label" => "App 1",
                        "url" => ["site/index2"],
                    ],
                    [
                        "label" => "App 2",
                        "url" => ["site/index1"],
                    ],
                    [
                        "label" => "App 3",
                        "url" => ["site/index1"],
                    ],
                ]
            ],
            [ "divider" ],
            [ "label" => "Form and Other" ],
            [
                "label" => "Form",
                "icon" => "<i class=\"mdi mdi-gauge\"></i>",
                "items" => [
                    [
                        "label" => "Form 1",
                        "url" => ["site/index4"],
                    ],
                    [
                        "label" => "Form 2",
                        "url" => ["site/index1"],
                    ],
                    [
                        "label" => "Form 3",
                        "url" => ["site/index1"],
                    ],
                ]
            ],
            [
                "label" => "Other",
                "icon" => "<i class=\"mdi mdi-bullseye\"></i>",
                "items" => [
                    [
                        "label" => "Other 1",
                        "url" => ["site/index2"],
                    ],
                    [
                        "label" => "Other 2",
                        "url" => ["site/index1"],
                    ],
                    [
                        "label" => "Other 3",
                        "url" => ["site/index1"],
                    ],
                ]
            ],
        ]
    ],
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
