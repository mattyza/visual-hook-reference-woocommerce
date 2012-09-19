<?php
/*
Plugin Name: Visual Hook Reference - WooCommerce
Plugin URI: http://woothemes.com/
Description: Add support for WooCommerce hooks to the Visual Hook Reference plugin.
Version: 1.0.0
Author: WooThemes
Author URI: http://woothemes.com/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
/*  Copyright 2012  WooThemes  (email : info@woothemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

    if ( ! defined( 'ABSPATH' ) ) exit;
    
    $visual_hook_reference_woocommerce = new Visual_Hook_Reference_WooCommerce();

    add_action( 'visual_hook_reference_init_hooks', array( $visual_hook_reference_woocommerce, 'init_hooks' ), 10, 1 );

    class Visual_Hook_Reference_WooCommerce {
        private $hooks = array(
                    'woocommerce_init', 
                    'woocommerce_loaded', 
                    'woocommerce_before_shop_loop', 
                    'woocommerce_before_shop_loop_products', 
                    'woocommerce_before_shop_loop_item', 
                    'woocommerce_before_shop_loop_item_title', 
                    'woocommerce_after_shop_loop_item_title', 
                    'woocommerce_after_shop_loop_item', 
                    'woocommerce_after_shop_loop', 
                    'woocommerce_before_subcategory', 
                    'woocommerce_before_subcategory_title', 
                    'woocommerce_after_subcategory_title', 
                    'woocommerce_after_subcategory', 
                    'woocommerce_before_main_content', 
                    'woocommerce_after_main_content', 
                    'woocommerce_sidebar', 
                    'woocommerce_checkout_update_order_review', 
                    'woocommerce_checkout_order_review', 
                    'woocommerce_before_template_part', 
                    'woocommerce_after_template_part', 
                    'woocommerce_product_thumbnails', 
                    'woocommerce_share', 
                    'woocommerce_product_tabs', 
                    'woocommerce_product_tab_panels', 
                    'woocommerce_before_add_to_cart_button', 
                    'woocommerce_after_add_to_cart_button', 
                    'woocommerce_before_add_to_cart_form', 
                    'woocommerce_after_add_to_cart_form', 
                    'woocommerce_order_items_table', 
                    'woocommerce_view_order', 
                    'woocommerce_before_customer_login_form', 
                    'woocommerce_after_customer_login_form', 
                    'woocommerce_before_my_account', 
                    'woocommerce_after_my_account', 
                    'woocommerce_email_header', 
                    'woocommerce_email_before_order_table', 
                    'woocommerce_email_after_order_table', 
                    'woocommerce_email_footer', 
                    'woocommerce_cart_has_errors', 
                    'woocommerce_before_checkout_billing_form', 
                    'woocommerce_after_checkout_billing_form', 
                    'woocommerce_before_checkout_registration_form', 
                    'woocommerce_after_checkout_registration_form', 
                    'woocommerce_before_checkout_form', 
                    'woocommerce_checkout_billing', 
                    'woocommerce_checkout_shipping', 
                    'woocommerce_checkout_order_review', 
                    'woocommerce_after_checkout_form', 
                    'woocommerce_before_checkout_shipping_form', 
                    'woocommerce_after_checkout_shipping_form', 
                    'woocommerce_before_order_notes', 
                    'woocommerce_after_order_notes', 
                    'woocommerce_review_order_before_shipping', 
                    'woocommerce_review_order_after_shipping', 
                    'woocommerce_before_order_total', 
                    'woocommerce_after_order_total', 
                    'woocommerce_cart_contents_review_order', 
                    'woocommerce_review_order_before_submit', 
                    'woocommerce_review_order_after_submit', 
                    'woocommerce_thankyou', 
                    'woocommerce_before_cart_table', 
                    'woocommerce_before_cart_contents', 
                    'woocommerce_cart_contents', 
                    'woocommerce_after_cart_contents', 
                    'woocommerce_after_cart_table', 
                    'woocommerce_cart_collaterals', 
                    'woocommerce_cart_is_empty', 
                    'woocommerce_before_shipping_calculator', 
                    'woocommerce_after_shipping_calculator', 
                    'woocommerce_before_cart_totals', 
                    'woocommerce_after_cart_totals', 
                    'woocommerce_check_cart_items', 
                    'woocommerce_customer_save_address', 
                    'woocommerce_customer_change_password', 
                    'woocommerce_view_order', 
                    'before_woocommerce_pay', 
                    'after_woocommerce_pay', 
                    'woocommerce_cart_updated', 
                    'woocommerce_cart_emptied', 
                    'woocommerce_add_to_cart', 
                    'woocommerce_before_cart_item_quantity_zero', 
                    'woocommerce_after_cart_item_quantity_update', 
                    'woocommerce_before_calculate_totals', 
                    'woocommerce_calculate_totals', 
                    'woocommerce_before_checkout_process', 
                    'woocommerce_checkout_process', 
                    'woocommerce_after_checkout_validation', 
                    'woocommerce_register_post', 
                    'woocommerce_created_customer', 
                    'woocommerce_check_new_order_items', 
                    'woocommerce_resume_order', 
                    'woocommerce_new_order', 
                    'woocommerce_checkout_update_user_meta', 
                    'woocommerce_checkout_update_order_meta', 
                    'woocommerce_checkout_order_processed', 
                    'woocommerce_email', 
                    'woocommerce_new_customer_note', 
                    'woocommerce_payment_complete', 
                    'woocommerce_reduce_order_stock', 
                    'woocommerce_product_on_backorder', 
                    'woocommerce_no_stock', 
                    'woocommerce_low_stock', 
                    'woocommerce_order_item_meta', 
                    'woocommerce_integrations_init'
                    );

        /**
         * Register the hooks within Visual Hook Reference.
         * @since  1.0.0
         * @param  object $vhr Visual Hook Reference object.
         * @return  void
         */
        public function init_hooks ( $vhr ) {
            if ( is_array( $this->hooks ) && ( 0 < count( $this->hooks ) ) ) {

                // Hook up the admin-only hooks, if we're in the admin.
                if ( is_admin() ) { $this->hooks = array_merge( $this->hooks, $this->get_admin_hooks() ); }

                foreach ( $this->hooks as $k => $v ) {
                    $vhr->add_hook( $v );
                }
            }

            // Add a few extra hooks for reference.
            if ( isset( $_GET['wc-api'] ) ) {
                $api = strtolower( esc_attr( $_GET['wc-api'] ) );
                $vhr->add_hook( 'woocommerce_api_' . $api );
            }
        } // End init_hooks()

        /**
         * Return an array of hooks that execute only in the admin.
         * @since  1.0.0
         * @return array Array of admin-only hooks.
         */
        private function get_admin_hooks () {
            return array(
                        'woocommerce_right_now_shop_content_table_end', 
                        'woocommerce_right_now_orders_table_end', 
                        'media_upload_file', 
                        'woocommerce_admin_css', 
                        'woocommerce_reports_tabs', 
                        'woocommerce_update_options', 
                        'woocommerce_settings_saved', 
                        'woocommerce_settings_tabs', 
                        'woocommerce_coupon_options', 
                        'woocommerce_admin_order_data_after_shipping_address', 
                        'woocommerce_admin_order_item_headers', 
                        'woocommerce_admin_order_item_values', 
                        'woocommerce_order_actions', 
                        'woocommerce_admin_order_totals_after_shipping', 
                        'woocommerce_restore_order_stock', 
                        'woocommerce_product_after_variable_attributes', 
                        'woocommerce_product_after_variable_attributes_js', 
                        'woocommerce_product_write_panel_tabs', 
                        'woocommerce_product_options_sku', 
                        'woocommerce_product_options_pricing', 
                        'woocommerce_product_options_dimensions', 
                        'woocommerce_product_options_downloads', 
                        'woocommerce_product_options_general_product_data', 
                        'woocommerce_product_options_tax', 
                        'woocommerce_product_options_stock', 
                        'woocommerce_product_options_stock_fields', 
                        'woocommerce_product_options_related', 
                        'woocommerce_product_options_grouping', 
                        'woocommerce_product_write_panels', 
                        'woocommerce_product_options_product_type', 
                        'post_comment_status_meta_box'
                        );
        } // End get_admin_hooks()
    } // End Class
?>