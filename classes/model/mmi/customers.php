<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Customers model.
 *
 * @package     MMI Ecommerce
 * @author      Me Make It
 * @copyright   (c) 2009 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Model_MMI_Customers extends Jelly_Model
{
    protected static $_table_name = 'mmi_customers';
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
                    'default' => 1,
                    'rules' => array('range' => array(0, 1)),
                )),
                'email' => new Field_Email(array
                (
                    'rules' => array('max_length' => array(255)),
                    'unique' => TRUE,
                )),
                'first_name' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'last_name' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'business_name' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_street_1' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_street_2' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_city' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_state' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_postal_code' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
                )),
                'address_country' => new Field_String(array
                (
                    'rules' => array('max_length' => array(255)),
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
} // End Model_MMI_Customers