<?php defined( 'ABSPATH' ) or die( 'No direct access allowed' );


add_action('rest_api_init', function () {
	$objectTypes = ['post', 'comment', 'user', 'term'];

	foreach ($objectTypes as $objectType) {
		$objectTypeMetaItems = get_option('integromat_api_options_' . $objectType);

		if (!empty($objectTypeMetaItems)) {
			foreach ($objectTypeMetaItems as $metaItemFull => $val) {
				$metaItem = str_replace(IMAPIE_FIELD_PREFIX, '', $metaItemFull);

				$args = array(
					'type'         => 'string',
					'description'  => 'A meta key associated with a string meta value.',
					'single'       => true,
					'show_in_rest' => true,
				);
				register_meta($objectType, $metaItem, $args);
			}
		}
	}
});

