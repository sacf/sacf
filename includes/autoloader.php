<?php
/**
 * Autoload class files
 *
 * @package sacf/utils
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf;

spl_autoload_register('sacf\sacf_autoloader');

/**
 * autoload a sacf class
 *
 * @param sacf\class $class
 * @return void
 */
function sacf_autoloader($class) { ///< autoload a sacf class
	$class = ltrim($class, '\\');

	// bail if namespace doesn't match
	if (strpos($class, __NAMESPACE__) !== 0) {
		return;
	}

	// remove main namespace and force lowerspace string
	$class = strtolower(str_replace(__NAMESPACE__, '', $class));

	if (strpos($class, '\fclayout') === 0) {
		// load sacf flex content modules
		$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		// $path = str_replace('/module/', paths()['modules'], $path) . '.php';
		$path = str_replace('/fclayout/', settings::paths()['layouts'], $path) . '.php';
		// $path = str_replace('/module/', settings::paths['modules'], $path) . '.php';
	} else {
		// @todo load plugins from theme folder first
		// load sacf core classes
		$path = __DIR__ . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	}
	require_once $path;
}
