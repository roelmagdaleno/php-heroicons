<?php

use PHPHeroIcons\Icon;

if (!function_exists('heroicon')) {
	/**
	 * Helper function that wraps the "return()" icon functionality.
	 *
	 * It will only return the SVG HTML but if you want to echo the SVG
	 * you just have to "echo" the content, for example:
	 *
	 * echo heroicon('check-circle');
	 *
	 * @since  1.0.0
	 *
	 * @see    Icon::return()
	 *
	 * @param  string $icon       The icon to render.
	 * @param  array  $attributes Attributes to attach to SVG HTML.
	 * @param  string $type       The type of icon to render (solid or outline).
	 *
	 * @return string|void        The rendered icon or void if validations fails.
	 */
	function heroicon(string $icon = '', array $attributes = array(), string $type = 'solid') {
		$instance = new Icon();
		return $instance->return($icon, $attributes, $type);
	}
}
