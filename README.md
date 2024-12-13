# PHP Heroicons

A package to render [Heroicons](https://github.com/tailwindlabs/heroicons) in your PHP application.

Preview the icons at [heroicons.com](https://heroicons.com), developed by [Steve Schoger](https://twitter.com/steveschoger) and [Adam Wathan](https://twitter.com/adamwathan).

If you want to render Heroicons in your Laravel Blade views, use [Blade Heroicons](https://github.com/blade-ui-kit/blade-heroicons) package.

## Installation

### Composer

```shell
composer require roelmagdaleno/php-heroicons
```

## Usage

You can render a Heroicon using multiple ways:

### Helper

Return the SVG by using the `heroicon()` helper function:

```php
$text = heroicon('check-circle', ['width' => 60]);
echo "<p>My icon is: $text</p>";
```

Print the SVG directly:

```php
echo heroicon('check-circle', ['width' => 60]);
```

### Constructor

Instantiate an `Icon` class with parameters and print it directly:

```php
use PHPHeroIcons\Icon;

echo new Icon('check-circle', ['width' => 60]);
```

Instantiate an `Icon` class with parameters and call the `render()` method.

```php
use PHPHeroIcons\Icon;

$icon = new Icon('academic-cap', ['width' => 60]);
$icon->render();
```

Instantiate an `Icon` class with parameters and call the `return()` method.

```php
use PHPHeroIcons\Icon;

$icon = new Icon('academic-cap', ['width' => 60]);
$text = $icon->return();

echo "<p>My icon is: $text</p>";
```

### Render Method

If you want to render multiples icons and only use one `Icon` instance:

```php
use PHPHeroIcons\Icon;

$icon = new Icon();

$icon->render('check-circle', ['width' => 60]);
$icon->render('academic-cap', ['width' => 60]);
$icon->render('library', ['width' => 60]);
```

### Return Method

If you want to return multiples icons and only use one `Icon` instance:

```php
use PHPHeroIcons\Icon;

$icon = new Icon();

$first  = $icon->return('check-circle', ['width' => 60]);
$second = $icon->return('academic-cap', ['width' => 60]);
$third  = $icon->return('library', ['width' => 60]);

echo "My first icon is: $first then use the $second and $third";
```

## Parameters

The `Icon` constructor, `heroicon()`, `render()` and `return()` methods accepts these attributes in this order:

- $icon
- $attributes
- $type

Example:

```php
heroicon($icon, $attributes, $type);
```

The `$icon` accepts any [Heroicon](https://heroicons.com) slug and if you insert an icon that doesn't exist it won't return anything.

For `$attributes` (optional) you can pass only these attributes as array key/value format:

- `width`
- `height`
- `class`
- `id`

If you pass an attribute that is not listed previously it won't be attached to the SVG HTML.

And last, but not least, you can specify the Heroicon `$type`:

- `solid`
- `outline`

By default the icons will be printed in `solid` type.

Example:

```php
heroicon(
    'library',
    [
        'width'  => 60,
        'height' => 60,
        'class'  => 'my-custom-css-class',
        'id'     => 'my-custom-id',
    ]
); // Print solid icon with multiple attributes.

heroicon(
    'check-circle',
    [
        'width'  => 60,
        'height' => 60,
        'class'  => 'my-custom-css-class',
        'id'     => 'my-custom-id',
    ],
    'outline'
); // Print outline icon with multiple attributes.
```

## Examples

For more usage examples visit the `examples/index.php` file or visit the [PHPSandbox.io](https://phpsandbox.io/e/x/8qt7v?layout=EditorPreview&iframeId=z2x1jnoxen&theme=dark&defaultPath=%2F&showExplorer=no#index.php) to play with the code.
