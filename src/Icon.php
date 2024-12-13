<?php

namespace PHPHeroIcons;

use SVG\SVG;

class Icon {
	/**
	 * Validates if current icon should be returned if property is set
	 * to `true`, otherwise `false` means print it directly.
	 *
	 * @since 1.0.0
     *
	 * @var bool $return Whether to return the icon or print it if false.
	 */
	protected bool $return = false;

	/**
	 * Set up the properties that will be used to render the icons.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon The icon to render.
	 * @param array $attributes Attributes to attach to SVG HTML.
	 * @param string $type The type of icon to render (solid or outline).
	 */
	public function __construct(
        public string $icon = '',
        public array $attributes = array(),
        public string $type = 'solid',
    ) {}

	/**
	 * Render the specified icon when the user `echo` the instance;
	 *
	 * For example:
     *
     * ```php
	 * echo new Icon('check-circle', ['width' => 60]);
     * ```
	 *
	 * @since 1.0.0
	 *
	 * @return string The rendered icon or void if validations fails.
	 */
	public function __toString(): string {
		return $this->return();
	}

	/**
	 * Render the specified icon.
	 *
	 * You can pass some attributes, see `get_allow_attributes()` method to see
	 * which attributes are available to set to SVG HTML.
	 *
	 * This method can print directly to the HTML or return it if $return
	 * property is set to `true`.
     *
     * This behavior happens when you call the `return()` method.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon The icon to render.
	 * @param array  $attributes Attributes to attach to SVG HTML.
	 * @param string $type The type of icon to render (solid or outline).
	 * @return string|void The rendered icon or void if validations fails.
	 */
	public function render(
        string $icon = '',
        array $attributes = array(),
        string $type = 'solid',
    ) {
		$this->setup_properties($icon, $attributes, $type);

		if (empty($this->icon)) {
			return;
		}

		$only_types = array( 'outline', 'solid' );

		if (!in_array($this->type, $only_types, true)) {
			return;
		}

		$file = __DIR__ . '/../resources/svg/heroicons/' . $this->type . '/' . $this->icon . '.svg';

		if (!file_exists($file) || !is_readable($file)) {
			return;
		}

		$svg = SVG::fromFile($file);
		$doc = $svg->getDocument();

		$allow_attributes = $this->get_allow_attributes();

		foreach ($this->attributes as $attribute => $value) {
			if (!in_array($attribute, $allow_attributes, true)) {
				continue;
			}

			$doc->setAttribute($attribute, $value);
		}

		$icon_string = $svg->toXMLString(false);

		if (!$this->return) {
			echo $icon_string;
			return;
		}

		return $icon_string;
	}

	/**
	 * Return the specified icon.
	 *
	 * The icon will be returned from the `render()` method so you can
	 * print or manipulate the generated SVG HTML in your code.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon The icon to render.
	 * @param array $attributes Attributes to attach to SVG HTML.
	 * @param string $type The type of icon to render (solid or outline).
	 * @return string|null The rendered icon or void if validations fails.
	 */
	public function return(
        string $icon = '',
        array $attributes = array(),
        string $type = 'solid',
    ): ?string {
		$this->return = true;
		return $this->render($icon, $attributes, $type);
	}

	/**
	 * Get the allowed attributes that will be attached to SVG HTML.
	 * Avoid unnecessary and invalid attributes.
	 *
	 * @since 1.0.0
	 *
	 * @return array The allowed attribute to attach to SVG HTML.
	 */
	protected function get_allow_attributes(): array {
		return array( 'width', 'height', 'class', 'id' );
	}

	/**
	 * Set up the icon, attributes and type properties.
	 *
	 * With this method we can handle attributes from class constructor
	 * and methods like `render()` and `return()`, even the `heroicon()` helper.
	 *
	 * So if the user sets multiple icons from `render()` method it will override
	 * the properties that were set by the class constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon The icon to render.
	 * @param array $attributes Attributes to attach to SVG HTML.
	 * @param string $type The type of icon to render (solid or outline).
	 */
	protected function setup_properties(string $icon, array $attributes, string $type): void {
        $this->icon = $icon ?: $this->icon;
        $this->attributes = $attributes ?: $this->attributes;
        $this->type = $type !== 'solid' ? $type : $this->type;
	}
}
