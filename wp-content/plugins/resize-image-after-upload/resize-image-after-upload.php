<?php
/*
Plugin Name: Resize Image After Upload
Plugin URI: http://www.jepsonrae.com 
Description: This plugin resizes uploaded images to a given width after uploading, discarding the original uploaded file in the process.
Author: Jepson+Rae
Version: 1.0
Author URI: http://www.jepsonrae.com



Copyright (C) 2008 A. Huizinga (original Resize at Upload plugin)
Copyright (C) 2012 Jepson+Rae



Includes hints and code by:
	Huiz.net (www.huiz.net)
  Jacob Wyke (www.redvodkajelly.com)
  Paolo Tresso / Pixline (http://pixline.net)  



This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

$version = get_option('jr_resizeupload_version');
if ($version == '') {
  add_option('jr_resizeupload_version','1.0','Version of the plugin Resize After Image Upload','yes');
  add_option('jr_resizeupload_width','1000','Resize image to this width','yes');
  add_option('jr_resizeupload_resize_yesno','yes','Resize image if yes (set to no instead of unloading the plugin)','yes');
} // if

  
/* actions */
add_action( 'admin_menu', 'jr_uploadresize_options_page' ); // add option page
if (get_option('jr_resizeupload_resize_yesno') == 'yes') {
  add_action('wp_handle_upload', 'jr_uploadresize_resize'); // apply our modifications
} // if

  
/* add option page */
function jr_uploadresize_options_page(){
  if(function_exists('add_options_page')){
    add_options_page('Resize Image After Upload','Resize Image Upload','manage_options','resize-after-upload','jr_uploadresize_options');
  } // if
} // function


/* the real option page */
function jr_uploadresize_options(){
  if (isset($_POST['jr_options_update'])) {
    $maxwidth = trim(mysql_real_escape_string($_POST['maxwidth']));
    $yesno = $_POST['yesno'];
    
    // if input is empty or not an integer, use previous setting
    if ($maxwidth == '' OR ctype_digit(strval($maxwidth)) == FALSE) {
      $maxwidth = get_option('jr_resizeupload_width');
    } // if
    
    update_option('jr_resizeupload_width',$maxwidth);
    
    if ($yesno == 'yes') {
      update_option('jr_resizeupload_resize_yesno','yes');
    } // if
    else {
      update_option('jr_resizeupload_resize_yesno','no');
    } // else

    echo('<div id="message" class="updated fade"><p><strong>Your option are saved.</strong></p></div>');
  } // if



  // get options and show settings form
  $maxwidth = get_option('jr_resizeupload_width');
  $yesno = get_option('jr_resizeupload_resize_yesno');
  

  echo('<div class="wrap">');
  echo('<form method="post" accept-charset="utf-8">');
    
  echo('<h2>Resize Image After Upload Options</h2>');
  echo('<p>This plugin resizes uploaded images to a given width after uploading, discarding the original uploaded file in the process.
   You can set the max width, and images (JPEG, PNG or GIF) will be resized automatically after they are uploaded.</p>');

  echo('<p>Your file will be resized, there will not be a copy or backup with the original size.</p>');
  
  echo('<p>Set the option \'Resize\' to no if you don\'t want to resize, this way you shouldn\'t deactivate the plugin 
   in case you don\'t want to resize for a while.</p>');

  echo('<h3>Settings</h3>
    <table class="form-table">
  
    <tr>
    <td>Resize:&nbsp;</td>
    <td>
    <select name="yesno" id="yesno">  
    <option value="no" label="no"'); if ($yesno == 'no') echo(' selected=selected'); echo('>no</option>
    <option value="yes" label="yes"'); if ($yesno == 'yes') echo(' selected=selected'); echo('>yes</option>
    </select>
    </td>
    </tr>
  
    <tr>
    <td>Max width:&nbsp;</td>
    <td>
    <input type="text" name="maxwidth" size="10" id="maxwidth" value="'.$maxwidth.'" /><br />
    <small>Enter a valid max width in pixels (e.g. 500).</small>
    </td>
    </tr>
    
    </table>');  
  
  echo('<p class="submit">
  <input type="hidden" name="action" value="update" />
  <input type="submit" name="jr_options_update" value="Update Options &raquo;" />
  </p>
  </form>');

  echo('</div>');
}



/* This function will apply changes to the uploaded file */
function jr_uploadresize_resize($array){ 
  // $array contains file, url, type
  if ($array['type'] == 'image/jpeg' OR $array['type'] == 'image/gif' OR $array['type'] == 'image/png') {
    // there is a file to handle, so include the class and get the variables
    require_once('class.resize.php');
    $maxwidth = get_option('jr_resizeupload_width');
    $objResize = new RVJ_ImageResize($array['file'], $array['file'], 'W', $maxwidth);
  } // if
  return $array;
} // function

?>