<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Orders model.
 *
 * @package     MMI Ecommerce
 * @author      Me Make It
 * @copyright   (c) 2009 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Model_MMI_Orders extends Jelly_Model
{
    protected static $_table_name = 'mmi_orders';
    public static function initialize(Jelly_Meta $meta)
    {
        $meta
            ->table(self::$_table_name)
            ->primary_key('id')
            ->foreign_key('id')
            ->fields(array
            (
    			'id' => new Field_Primary,
                'invoice_id' => new Field_String(array
                (
                    'rules' => array
                    (
                        'max_length' => array(255),
                        'not_empty' => NULL,
                    ),
                    'unique' => TRUE,
                )),
                'status' => new Field_Enum(array
                (
                    'choices' => array
                    (
                        'cart'  => 'cart',
                        'order' => 'order',
                    ),
                    'default' => 'cart',
                )),
                'customer_email' => new Field_Email(array
                (
                    'default' => '',
                    'rules' => array('max_length' => array(255)),
                )),
                'discount_code' => new Field_String(array
                (
                    'default' => '',
                    'rules' => array('max_length' => array(32)),
                )),
                'item_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'shipping_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'handling_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'tax_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'discount_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'order_total' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'attributes' => new Field_Serialized,
                'txn_type' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'txn_id' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'payment_processor' => new Field_Enum(array
                (
                    'choices' => array
                    (
                        'google' => 'google',
                        'paypal' => 'paypal',
                    ),
                    'default' => 'paypal',
                )),
                'payment_type' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'payment_date' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
                'payment_status' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'payment_status_details' => new Field_Serialized,
                'payment_payer_status' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'payment_gross' => new Field_Float(array
                (
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'payment_fees' => new Field_Float(array
                (
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'payment_notes' => new Field_Text(array
                (
                    'rules' => array('max_length' => array(65535)),
                )),
                'date_ordered' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
                'date_emailed' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
                'date_created' => new Field_Timestamp(array
                (
                    'auto_now_create' => TRUE,
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
                'date_updated' => new Field_Timestamp(array
                (
                    'auto_now_create' => TRUE,
                    'auto_now_update' => TRUE,
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
            )
    	);
	}

    public static function select_by_id($ids, $as_array = TRUE, $array_key = NULL, $limit = NULL)
    {
        $where_parms = array();
        if (MMI_Util::is_set($ids))
        {
            $where_parms['id'] = $ids;
        }
        $query_parms = array('limit' => $limit, 'where_parms' => $where_parms);
        return MMI_Jelly::select(self::$_table_name, $as_array, $array_key, $query_parms);
    }
} // End Model_MMI_Orders