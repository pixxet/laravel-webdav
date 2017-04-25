# laravel-webdav

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require iclass/laravel-webdav
```

## Usage

Register the service provider in your app.php config file:

``` php
// config/app.php

'providers' => [
    ...
    Iclass\Webdav\WebdavServiceProvider::class
    ...
];
```

Create a webdav filesystem disk:

``` php
// config/filesystems.php

'disks' => [
	...
	'webdav' => [
	    'driver'   => 'webdav',
	    'baseUri'  => 'https://mywebdavstorage.com',
	    'userName' => 'pascalbaljetmedia',
	    'password' => 'supersecretpassword,
	    'curl_options' => [
	    ]
	],
	...
];
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [iClass][link-author]
- [Pascal Baljet][link-upstream-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pbmedia/laravel-webdav.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pbmedia/laravel-webdav.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/iclass/laravel-webdav
[link-downloads]: https://packagist.org/packages/iclass/laravel-webdav
[link-author]: https://github.com/pascalbaljet
[link-upstream-author]: https://github.com/pascalbaljet
[link-contributors]: ../../contributors
