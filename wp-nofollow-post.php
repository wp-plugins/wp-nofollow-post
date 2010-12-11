<?php
/*
Plugin Name: WP Nofollow Post
Plugin URI: http://www.niceplugins.com/
Description: Add nofollow attribute to all external links on posts / pafes. Exception can be added on several domains.
Author: Xrvel
Version: 1.0.0
Author URI: http://www.xrvel.com/
*/

/*  Copyright 2010 niceplugins.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    For a copy of the GNU General Public License, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function xrvel_nfp_options() {
	if (!current_user_can('manage_options')) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	$opt = (string)get_option('xrvel_nfp_options');
	if ($opt == '') {
		$opt = array(
			'enabled' => true,
			'enable_on' => 1,
			'exclude' => 'google.com,yahoo.com'
		);
	}
	echo '<div class="wrap">';
	?>
	<h2>WP Nofollow Post Options</h2>
	<form name="form1" method="post" action="">
	WP Nofollow Post status :
	<select name="xstatus">
	<option value="1">Enabled</option>
	<option value="0"<?php if ($opt['enabled'] != 0) : ?> selected="selected"<?php endif; ?>>Disabled</option><br />
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
	</p>
	</form>
	<div style="margin-top:1em">
		Plugin by <a href="http://www.niceplugins.com" target="_blank">NicePlugins.com</a>
	</div>
	<?php
	echo '</div>';
}

function xrvel_nfp_add_pages() {
	add_options_page('WP Nofollow Post', 'WP Nofollow Post', 'manage_options', 'np-wp-nofollow-post', 'xrvel_nfp_options');
}

add_action('admin_menu', 'xrvel_nfp_add_pages');
?>