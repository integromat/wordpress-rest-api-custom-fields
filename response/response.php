<?php defined( 'ABSPATH' ) or die( 'No direct access allowed' );

add_action('rest_api_init', function () {
	$objectTypes = ['post', 'comment', 'user', 'term'];

	foreach ($objectTypes as $objectType) {
		$objectTypeMetaItems = get_option('integromat_api_options_' . $objectType);

		if (!empty($objectTypeMetaItems)) {
			foreach ($objectTypeMetaItems as $metaItemFull => $val) {
				$metaItem = str_replace(IMAPIE_FIELD_PREFIX, '', $metaItemFull);

				register_rest_field(
					$objectType,
					$metaItem,
					[
						'get_callback' => function ($object, $field_name, $request) use ($objectType) {
							return get_metadata($objectType, $object['id'], $field_name, true);
						}
					]
				);
			}
		}
	}
});