<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Discounts model.
 *
 * @package     MMI Ecommerce
 * @author      Me Make It
 * @copyright   (c) 2009 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Model_MMI_Discounts extends Jelly_Model
{
    protected static $_table_name = 'mmi_discounts';
    public static function initialize(Jelly_Meta $meta)
    {
        $meta
            ->table(self::$_table_name)
            ->primary_key('id')
            ->foreign_key('id')
            ->fields(array
            (
    			'id' => new Field_Primary,
                'active' => new Field_Boolean(array
                (
                    'default' => 0,
                    'rules' => array('range' => array(0, 1)),
                )),
                'code' => new Field_String(array
                (
                    'rules' => array
                    (
                        'max_length' => array(32),
                        'not_empty' => NULL,
                    ),
                    'unique' => TRUE,
                )),
                'name' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'description' => new Field_String(array
                (
                    'rules' => array('max_length' => array(65535)),
                )),
                'logic' => new Field_String(array
                (
                    'default' => 'order',
                    'rules' => array('max_length' => array(32)),
                )),
                'amount' => new Field_Float(array
                (
                    'default' => 0.00,
                    'places' => 2,
                    'rules' => array('range' => array(0, 999999)),
                )),
                'type' => new Field_Enum(array
                (
                    'choices' => array
                    (
                        'dollar'    =>'dollar',
                        'percent'   => 'percent',
                    ),
                    'default' => 'dollar',
                )),
                'start_date' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
                )),
                'end_date' => new Field_Timestamp(array
                (
                    'pretty_format' => 'Y-m-d G:i:s',
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
} // End Model_MMI_Discounts