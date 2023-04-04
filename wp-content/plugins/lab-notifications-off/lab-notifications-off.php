<?php
/*
Plugin Name: Lab - Notifications Off
Version: 1.8
Plugin URI: https://1wd.tv/
Description: Removes GravityForms & WooThemes Registration Notices From Admin Dashboard
Author: 1wd.tv
Author URI: https://1wd.tv/
License: GPLv2 or later
Last Updated: 04/12/2016
*/
/* Remove Gravity Forms Register Notices */
?>
<?php 
function lab_remove_gravity_register() {
if (class_exists('GFForms')) {
  ?>
  <style>
  /* Hides the notice message on plugins list */
  tr[data-slug*="gravity-forms"] + tr.plugin-update-tr {
  display: none;
}
	/* Hides the image on the gf_edit_forms page */
  body.toplevel_page_gf_edit_forms #wpbody-content div a img, 
  body.forms_page_gf_update #wpbody-content div a img, 
  body.forms_page_gf_entries #wpbody-content div a img,
  body.forms_page_gf_new_form #wpbody-content div a img, 
  body.forms_page_gf_export #wpbody-content div a img,
  body.forms_page_gf_addons #wpbody-content div a img,
  body.forms_page_gf_help #wpbody-content div a img {display:none!important;}

  body.toplevel_page_gf_edit_forms #wpbody-content div,
  body.forms_page_gf_update #wpbody-content div,
  body.forms_page_gf_entries #wpbody-content div,
  body.forms_page_gf_new_form #wpbody-content div,
  body.forms_page_gf_export #wpbody-content div,
  body.forms_page_gf_addons #wpbody-content div,
  body.forms_page_gf_help #wpbody-content div {border-bottom:0!important;}
  </style>
 <?php
  }
}
add_action('admin_enqueue_scripts', 'lab_remove_gravity_register');

function lab_remove_gf_update_menu() {
	// Removes updates submenu from Admin Sidebar
    remove_submenu_page( 'gf_edit_forms', 'gf_update' ); 
}
add_action( 'admin_menu', 'lab_remove_gf_update_menu', 9999 );

/* Remove WooThemes Register Notice */
add_action('init', 'lab_remove_woo_register');
function lab_remove_woo_register() {
if(function_exists('woothemes_updater_notice')) {  
 remove_action( 'admin_notices', 'woothemes_updater_notice' );
  }
}