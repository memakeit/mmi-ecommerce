<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Order items model.
 *
 * @package     MMI Ecommerce
 * @author      Me Make It
 * @copyright   (c) 2009 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Model_MMI_Order_Items extends Jelly_Model
{
    protected static $_table_name = 'mmi_order_items';
    public static function initialize(Jelly_Meta $meta)
    {
        $meta
            ->table(self::$_table_name)
            ->primary_key('id')
            ->foreign_key('id')
            ->fields(array
            (
    			'id' => new Field_Primary,
                'order_id' => new Field_Integer(array
                (
                    'rules' => array
                    (
                        'not_empty' => NULL,
                        'range' => array(0, 4294967295),
                    ),
                )),
                'product_id' => new Field_Integer(array
                (
                    'rules' => array
                    (
                        'not_empty' => NULL,
                        'range' => array(0, 4294967295),
                    ),
                )),
                'qty' => new Field_Integer(array
                (
                    'default' => 1,
                    'rules' => array('range' => array(0, 4294967295)),
                )),
                'price' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'shipping' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'handling' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'discount' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'attributes' => new Field_Serialized,
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
} // End Model_MMI_Order_Items