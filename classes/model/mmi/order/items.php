<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Order items model.
 *
 * @package		MMI Ecommerce
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Model_MMI_Order_Items extends Jelly_Model
{
	/**
	 * @var string the table name
	 */
	protected static $_table_name = 'mmi_order_items';

	/**
	 * Initialize the model settings.
	 *
	 * @param	Jelly_Meta	meta data for the model
	 * @return	void
	 */
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
				'attributes' => new Field_Serialized(array
				(
					'null' => TRUE,
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

	/**
	 * Select one or more rows from the database by id.
	 *
	 * @param	mixed	one or more id's
	 * @param	boolean	return the data as an array?
	 * @param	integer	the maximum number of results
	 * @return	mixed
	 */
	public static function select_by_id($id, $as_array = TRUE, $limit = NULL)
	{
		$where_parms = array();
		if (MMI_Util::is_set($id))
		{
			$where_parms['id'] = $id;
		}
		$query_parms = array('limit' => $limit, 'where_parms' => $where_parms);
		return MMI_Jelly::select(self::$_table_name, $as_array, $query_parms);
	}
} // End Model_MMI_Order_Items
