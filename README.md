# PHP Heroicons

A package to render [Heroicons](https://github.com/tailwindlabs/heroicons) in your PHP application.

Preview the icons at [heroicons.com](https://heroicons.com), developed by [Steve Schoger](https://twitter.com/steveschoger) and [Adam Wathan](https://twitter.com/adamwathan).

## Installation

### Composer (recommended)

```shell
composer require roelmagdaleno/php-heroicons
```

### Manual

[Download](https://github.com/roelmagdaleno/php-heroicons/zipball/master) this repo, or the [latest release](https://github.com/roelmagdaleno/php-heroicons/releases), and put it somewhere in your project. Then do:

```php
require_once __DIR__ . '/vendor/autoload.php';
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

For more usage examples visit the `examples/index.php` file.
