<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Test_Ecommerce extends Controller
{
    public $debug = TRUE;

    public function action_index()
    {
        MMI_Debug::dump(PHP_INT_MAX, 'PHP_INT_MAX');
    }
} // End Controller_Test_Ecommerce