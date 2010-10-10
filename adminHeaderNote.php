<?php
/*
Plugin Name: Admin Header Note
Plugin URI: http://computerdemon.com/
Description: A simple plugin that adds a note with a link to the dashboard.
Version: 0.2
Author: Sean Camden
Author URI: http://computerdemon.com
License: GPL
*/
// Runs when plugin is activated
register_activation_hook(__FILE__,'admin_header_note_install'); 
// Runs on plugin deactivation
register_deactivation_hook( __FILE__, 'admin_header_note_remove' );
// Creates new database field
function admin_header_note_install() {
  add_option("admin_header_note_data", 'Defaultx', '', 'yes');
}
// Deletes the database field 
function admin_header_note_remove() {
  delete_option('admin_header_note_data');
}
/*
wp_tiny_mce( false , // true makes the editor "teeny"
  array(
    "editor_selector" => "admin_header_note_data"
  )
);
*/
if ( is_admin() ){
  /* Call the html code */
  add_action('admin_menu', 'admin_header_note_admin_menu');
  function admin_header_note_admin_menu() {
    add_options_page('Admin Header Note', 'Admin Header Note', 'administrator', 'adminHeaderNote', 'admin_header_note_html_page');
  }
}
function admin_header_note_html_page() {
?>
<div>
<h2>Admin Header Note Options</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table width="510">
<tr valign="top">
<th width="92" scope="row">Enter Text</th>
<td width="406">
<textarea class="admin_header_note_data" name="admin_header_note_data" id="admin_header_note_data">
<?php echo get_option('admin_header_note_data'); ?>
</textarea>
</td>
</tr>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_header_note_data" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
?>
