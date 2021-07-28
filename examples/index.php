<?php

require_once '../vendor/autoload.php';

use PHPHeroIcons\Icon;

$icon = new Icon();

echo '<h2>Solid Icons</h2>';

$icon->render('check-circle', ['width' => 60]);
$icon->render('academic-cap', ['width' => 60]);
$icon->render('library', [
	'width'  => 60,
	'height' => 60,
	'class'  => 'my-custom-css-class',
	'id'     => 'my-custom-id',
]);

echo '<br>';
echo '<h2>Outline Icons</h2>';

$icon->render('check-circle', ['width' => 60], 'outline');
$icon->render('academic-cap', ['width' => 60], 'outline');
$icon->render('library', ['width' => 60], 'outline');

echo '<br>';
echo '<h2>Render using helper function</h2>';

echo heroicon('check-circle', ['width' => 60]);
echo heroicon('academic-cap', ['width' => 60]);
echo heroicon('library', ['width' => 60]);

echo '<br>';
echo '<h2>Render icon from constructor</h2>';

echo new Icon('check-circle', ['width' => 60]);

$new_icon = new Icon('academic-cap', ['width' => 60]);
$new_icon->render();

$new_icon_two = new Icon('library', ['width' => 60]);
echo $new_icon_two->return();

echo '<br>';
echo '<h2>Render icon from return method</h2>';

$icon = new Icon();

$first  = $icon->return('check-circle', ['width' => 60]);
$second = $icon->return('academic-cap', ['width' => 60]);
$third  = $icon->return('library', ['width' => 60]);

echo "My first icon is: $first then use the $second and $third";
