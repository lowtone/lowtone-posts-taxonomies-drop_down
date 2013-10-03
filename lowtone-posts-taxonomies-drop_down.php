<?php
/*
 * Plugin Name: Drop-down Menus for Default Post Taxonomies
 * Plugin URI: http://wordpress.lowtone.nl/plugins/posts-taxonomies-drop_down/
 * Description: Use Chosen to select tags and categories.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */
/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2013, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\plugins\lowtone\posts\taxonomies\drop_down
 */

namespace lowtone\posts\taxonomies\drop_down {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$__i = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\wp\\taxonomies\\meta_boxes\\drop_down"),
			Package::INIT_MERGED_PATH => __NAMESPACE__,
			Package::INIT_SUCCESS => function() {

				add_action("init", function() {
					global $wp_taxonomies;

					if (isset($wp_taxonomies["category"]))
						$wp_taxonomies["category"]->meta_box = apply_filters("category_meta_box", "dropdown_multiple");

					if (isset($wp_taxonomies["post_tag"]))
						$wp_taxonomies["post_tag"]->meta_box = apply_filters("post_tag_meta_box", "dropdown_multiple");
						
				});
				
			}
		));

}