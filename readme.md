--
      {
            "name": "davejamesmiller/laravel-breadcrumbs",
            "version": "4.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/davejamesmiller/laravel-breadcrumbs.git",
                "reference": "368d7b3a2cd21fe2e648756e5d01d3fe4fbe98e1"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/davejamesmiller/laravel-breadcrumbs/zipball/368d7b3a2cd21fe2e648756e5d01d3fe4fbe98e1",
                "reference": "368d7b3a2cd21fe2e648756e5d01d3fe4fbe98e1",
                "shasum": ""
            },
            "require": {
                "illuminate/support": "5.5.*",
                "illuminate/view": "5.5.*",
                "php": ">=7.0.0"
            },
            "require-dev": {
                "laravel/framework": "5.5.*",
                "orchestra/testbench": "3.5.*",
                "phpunit/phpunit": "6.*",
                "satooshi/php-coveralls": "1.0.*"
            },
            "type": "library",
            "extra": {
                "laravel": {
                    "providers": [
                        "DaveJamesMiller\\Breadcrumbs\\BreadcrumbsServiceProvider"
                    ],
                    "aliases": {
                        "Breadcrumbs": "DaveJamesMiller\\Breadcrumbs\\Facades\\Breadcrumbs"
                    }
                }
            },
            "autoload": {
                "psr-4": {
                    "DaveJamesMiller\\Breadcrumbs\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT License"
            ],
            "authors": [
                {
                    "name": "Dave James Miller",
                    "email": "dave@davejamesmiller.com",
                    "homepage": "https://davejamesmiller.com/"
                }
            ],
            "description": "A simple Laravel-style way to create breadcrumbs.",
            "homepage": "https://github.com/davejamesmiller/laravel-breadcrumbs",
            "keywords": [
                "laravel"
            ],
            "abandoned": true,
            "time": "2017-09-14T08:23:50+00:00"
        },