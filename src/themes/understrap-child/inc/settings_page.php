<?php
/**
 * Settings page
 */

function understrap_settings_page() {
	function hide_settings_page($query) {
		if ( !is_admin() && !is_main_query() ) {
			return;
		}
		global $typenow;
		if ($typenow === "page") {
			// Replace "site-settings" with the slug of your site settings page.
			$settings_page = get_page_by_path("options-page",NULL,"page")->ID;
			$query->set( 'post__not_in', array($settings_page) );
		}
		return;

	}
	add_action('pre_get_posts', 'hide_settings_page');


// Add settings to the menu
	function add_site_settings_to_menu(){
		add_menu_page(
			'Settings page',
			'Settings page',
			'manage_options',
			'post.php?post='.get_page_by_path("settings-page",NULL,"page")->ID.'&action=edit',
			'',
			'dashicons-hammer',
			// Set the page ID that need to hide
			6);
	}
	add_action( 'admin_menu', 'add_site_settings_to_menu' );

	/**
	 * Disable the content editor
	 */
	function disable_content_editor()
	{
		if (isset($_GET['post'])) {
			$post_ID = $_GET['post'];
		} else if (isset($_POST['post_ID'])) {
			$post_ID = $_POST['post_ID'];
		}

		if (!isset($post_ID) || empty($post_ID)) {
			return;
		}

		/*
		 * Disable the content editor pages with ID 96
		 */
		$disabled_IDs = array(6);
		if (in_array($post_ID, $disabled_IDs)) {
			remove_post_type_support('page', 'editor');
		}
	}

	add_action('admin_init', 'disable_content_editor');
}

add_action('init', 'understrap_settings_page');