# Displore Themes

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Quality Score][ico-code-quality]][link-code-quality]

Basic Themes for Laravel.

## Install

### Via [Displore Core][link-displore-core]

``` bash
$ php artisan displore:install themes
```
This does everything for you, from the Composer requirement to the addition of Laravel service providers.

### Via Composer

``` bash
$ composer require displore/themes
```
This requires the addition of the Themes service provider and Theme facade alias to config/app.php     
`Displore\Themes\ThemesServiceProvider::class,`
and
`Displore\Themes\Facades\Theme::class,`

## Usage

You can turn the theming service off in the configuration.

Theme folders can be created and deleted through commands (disabled on production):
```bash
$ php artisan displore:theme create mytheme
```
```bash
$ php artisan displore:theme delete mytheme
```

A Theme facade is available and usable as follows:
```php
Theme::set('mytheme')->register();
Theme::get();
Theme::setDefault();
Theme::getDefault();
Theme::asset('js/app.js');
```

## Change log

Please see [changelog](changelog.md) for more information what has changed recently.

## Testing

The package comes with unit tests.
In a Laravel application, with [Laravel Packager](https://github.com/Jeroen-G/laravel-packager):
``` bash
$ php artisan packager:git *Displore Github url*
$ php artisan packager:tests Displore Themes
$ phpunit
```

## Contributing

Please see [contributing](contributing.md) for details.

## Credits

- [JeroenG][link-author]
- [All Contributors][link-contributors]

## License

The EUPL License. Please see the [License File](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/displore/themes.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/displore/themes.svg?style=flat-square

[link-displore-core]: https://github.com/displore/core

[link-packagist]: https://packagist.org/packages/displore/themes
[link-code-quality]: https://scrutinizer-ci.com/g/displore/themes
[link-author]: https://github.com/Jeroen-G
[link-contributors]: ../../contributors
