<?php defined('SYSPATH') or die('No direct script access.');
/**
 * PayPal transactions model.
 *
 * @package		MMI Ecommerce
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Model_MMI_Transactions_PayPal extends Jelly_Model
{
	/**
	 * @var string the table name
	 */
	protected static $_table_name = 'mmi_transactions_paypal';

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
				'verified' => new Field_Boolean(array
				(
					'default' => 0,
					'rules' => array('range' => array(0, 1)),
				)),
				'is_test' => new Field_Boolean(array
				(
					'default' => 0,
					'rules' => array('range' => array(0, 1)),
				)),
				'txn_id' => new Field_String(array
				(
					'rules' => array
					(
						'max_length' => array(255),
						'not_empty' => NULL,
					),
				)),
				'txn_source' => new Field_Enum(array
				(
					'choices' => array
					(
						'IPN' => 'IPN',
						'PDT' => 'PDT',
					),
				)),
				'txn_type' => new Field_String(array
				(
					'null' => TRUE,
					'rules' => array('max_length' => array(255)),
				)),
				'txn_parent' => new Field_String(array
				(
					'null' => TRUE,
					'rules' => array('max_length' => array(255)),
				)),
				'txn_date' => new Field_Timestamp(array
				(
					'null' => TRUE,
					'pretty_format' => 'Y-m-d G:i:s',
				)),
				'txn_attributes' => new Field_Serialized(array
				(
					'null' => TRUE,
				)),
				'date_created' => new Field_Timestamp(array
				(
					'auto_now_create' => TRUE,
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
} // End Model_MMI_Transactions_PayPal
