<?php defined('SYSPATH') or die('No direct script access.');
/**
 * PayPal test controller.
 *
 * @package		MMI Ecommerce
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_Test_Ecommerce_PayPal extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test PayPal functionality.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dump(PHP_INT_MAX, 'PHP_INT_MAX');
	}
} // End Controller_Test_Ecommerce_PayPal
