<?php
/*
Plugin Name: Admin Header Note
Plugin URI: http://wagonlips.com/files/plugins/adminHeaderNote/
Description: This plugin simply places a small link or message at the top of the admin header.
Author: Sean Camden
Version: 0.1
Author URI: http://www.wagonlips.com
*/

// Echo the string.
function adminHeaderNote() {
    $adminHeaderNote_message = get_option('adminHeaderNote_message');
    $adminHeaderNote_link = get_option('adminHeaderNote_link');
    echo "<p id='adminNote'><span><a href='$adminHeaderNote_link'>$adminHeaderNote_message</a></span></p>";
}

// Fire the previous function when the footer loads.
add_action('admin_footer', 'adminHeaderNote');

// Position and style the output just so.
function adminHeaderNote_css() {
    $adminHeaderNote_X = get_option('adminHeaderNote_X');
    $adminHeaderNote_Y = get_option('adminHeaderNote_Y');
    $adminHeaderNote_color = get_option('adminHeaderNote_color');
    echo "
        <style type='text/css'>
            #adminNote {
                position: absolute;
                top:$adminHeaderNote_Y;
                right:$adminHeaderNote_X;
                color: #d54e21;
                font: 12px Tahoma, Verdana, sans-serif;
                color:$adminHeaderNote_color;
                padding: 3px 4px;
                display: block;
                letter-spacing: normal;
                border-width: 1px;
                border-style: solid;
                -moz-border-radius: 3px;
                -khtml-border-radius: 3px;
                -webkit-border-radius: 3px;
                border-radius: 3px;
            }
            #adminNote a:hover, #adminNote a {
                color:$adminHeaderNote_color;
            }
        </style>
    ";
}

// Add the CSS to the head.
add_action('admin_head', 'adminHeaderNote_css');

// Create an admin page that will allow configuration of the note.
add_action('admin_menu', 'adminHeaderNote_setup_menu' );

function adminHeaderNote_setup_menu() {
    add_options_page('Admin Header Note Options', 'Admin Header Note', 9, __FILE__, 'adminHeaderNote_setup_options');
}

// Here lies the markup for the form that goes on the admin page. When written to conform to Wordpress Coding Standards, 
// as suggested here: http://codex.wordpress.org/Creating_Options_Pages the values, upon hitting submit, vanish from 
// the form fields on the admin page, though they remain in the database.
// Without actually knowing why it makes the values persistent, since it improves usability, this format remains for now.
function adminHeaderNote_setup_options() {
    echo '
        <div class="wrap">
        <h2>Admin Header Note</h2>
        <form method="post" action="options.php">
        '.wp_nonce_field('update-options').'
        <table class="form-table">
        <tr valign="top">
        <th colspan="2" scope="row">Admin Header Note simply places a small note at the top of Dashboard pages with an optional link.</th>
        </tr>
        <tr>
        <td>Distance from right <br />(250px or 25em or like that):</td>
        <td><input type="text" name="adminHeaderNote_X" value="'.get_option('adminHeaderNote_X').'" /></td>
        </tr>
        <tr>
        <td>Distance from top <br />(5px or 1em or like that):</td>
        <td><input type="text" name="adminHeaderNote_Y" value="'.get_option('adminHeaderNote_Y').'" /></td>
        </tr>
        <tr>
        <td>The message (keep it short)</td>
        <td><input type="text" name="adminHeaderNote_message" value="'.get_option('adminHeaderNote_message').'" /></td>
        </tr>
        <tr>
        <td>The link (if there is one)</td>
        <td><input type="text" name="adminHeaderNote_link" value="'.get_option('adminHeaderNote_link').'" /></td>
        </tr>
        <tr>
        <td>The color of the note.</td>
        <td><input type="text" name="adminHeaderNote_color" value="'.get_option('adminHeaderNote_color').'" /></td>
        </tr>
        </table>
        </div>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="adminHeaderNote_X,adminHeaderNote_Y,adminHeaderNote_message,adminHeaderNote_link,adminHeaderNote_color" />
        <p class="submit">
        <input type="submit" name="Submit" value="Save Changes" />
        </p>
        </form>
        </div>
    ';
}

?>
