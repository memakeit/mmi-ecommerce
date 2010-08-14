<?php defined('SYSPATH') or die('No direct script access.');

// Test routes
if (Kohana::$environment !== Kohana::PRODUCTION)
{
	Route::set('mmi/ecommerce/test', 'mmi/ecommerce/test/<controller>(/<action>)', array('controller' => '.+'))
	->defaults(array
	(
		'directory' => 'mmi/ecommerce/test',
	));
}
