<?php

namespace IntegromatAPI;

Class MetaObject
{

	/**
	 * Gets all metadata related to the object type
	 * @param $table
	 * @return array
	 */
	public function getMetaItems($table)
	{
		global $wpdb;
		$query = "
			SELECT DISTINCT(meta_key) 
			FROM $table
			ORDER BY meta_key
		";
		$meta_keys = $wpdb->get_col($query);
		return $meta_keys;
	}

}

