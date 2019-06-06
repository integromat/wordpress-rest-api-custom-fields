<?php defined('ABSPATH') or die('No direct access allowed');


/**
 * Display options page as sub-item of Settings menu
 */
add_action ('admin_menu', function () {
	add_options_page(
		'Rest API Custom Fields',
		'Rest API Custom Fields',
		'manage_options',
		IMAPIE_MENUITEM_IDENTIFIER,
		'integromat_api_options_page_html'
	);
});


/**
 * Render the options page HTML
 */
function integromat_api_options_page_html()
{
	if (!current_user_can('manage_options')) {
		return;
	}
	settings_errors('integromat_api_messages');
	?>

	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<div id="imapie_tabs" class="imapie_settings_container">
		<ul>
			<li><a href="#tabs-1">Posts</a></li>
			<li><a href="#tabs-2">Comments</a></li>
			<li><a href="#tabs-3">Users</a></li>
			<li><a href="#tabs-4">Terms</a></li>
		</ul>

		<div id="tabs-1">
			<form action="options.php" method="post" id="impaie_form_post">
				<?php
				settings_fields('integromat_api_post');
				do_settings_sections('integromat_api_post');
				submit_button('Save Settings');
				?>
			</form>
		</div>

		<div id="tabs-2">
			<form action="options.php" method="post" id="impaie_form_comment">
				<?php
				settings_fields('integromat_api_comment');
				do_settings_sections('integromat_api_comment');
				submit_button('Save Settings');
				?>
			</form>
		</div>

		<div id="tabs-3">
			<form action="options.php" method="post" id="impaie_form_user">
				<?php
				settings_fields('integromat_api_user');
				do_settings_sections('integromat_api_user');
				submit_button('Save Settings');
				?>
			</form>
		</div>

		<div id="tabs-4">
			<form action="options.php" method="post" id="impaie_form_term">
				<input type="hidden" name="object_type" value="term">
				<?php
				settings_fields('integromat_api_term');
				do_settings_sections('integromat_api_term');
				submit_button('Save Settings');
				?>
			</form>
		</div>
	</div>
	<?php
}

