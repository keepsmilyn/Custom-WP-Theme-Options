<?
// add the admin options page
add_action('admin_menu', 'theme_page_add');
function theme_page_add() {
	add_submenu_page( 'themes.php', 'Theme Options', 'Theme Options', 				'manage_options',  'themeoptions', 	'theme_options_page');
	//add_submenu_page('themes.php', $page_title,	 $menu_title (on sidebar), 		$capability, 		$menu_slug, 	$function); 
}




//SET NEW THEME OPTIONS (SETUP IN DATABASE)
if (get_option('wrdtempsite_theme_options')) {
	$theme_options = get_option('wrdtempsite_theme_options');
}else{ 
	add_option('wrdtempsite_theme_options', 
		array(
		'sidebar2_on' => true,
		'footer_text' => 'Designed by <a href="http://www.whiteriverdesign.com" target="_blank">WRD</a>',
		'color' => '#000000',
		'logo' => ''
		)
	);
	$theme_options = get_option('wrdtempsite_theme_options');
};


// display the admin options page
function theme_options_page(){
	global $theme_options; //global variable comes from outside function. 	
	
	if($_POST['submit']) {
		//get values from form on submit
		if($_POST['sidebar_checkbox']) {
			$checkbox_post_value = true;
		}else{
			$checkbox_post_value = false;
		}
		$new_values = array(
			'footer_text' => htmlentities(stripslashes($_POST['footer_text'])),
			'sidebar2_on' => $checkbox_post_value,
			'color' => $_POST['color'],
			'logo' => ''
		);
		update_option('wrdtempsite_theme_options', $new_values);
		
		$theme_options = $new_values;
	}

	//Output page layout / content / form
	echo '<div class="wrap">';
	echo '<h2>Theme Options</h2>';
	?>
    <form action="themes.php?page=themeoptions" method="post">
        
        <table class="form-table">
            <tr>
                <th scope="row">Footer text</th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span>Footer text</span></legend>
                    <p>
                    <textarea name="footer_text" rows="2" id="footer_text" class="large-text code"><?php echo html_entity_decode($theme_options['footer_text']);?></textarea>
                    </p>
                    </fieldset>
                </td>
            </tr>  
			<tr>
                <th scope="row">Sidebar 2 On</th>
                <td>
                    <fieldset><legend class="screen-reader-text"><span>Sidebar 2 On</span></legend>
                    
                    <?php if ($theme_options['sidebar2_on']) {
						$checkbox_text = ' checked="checked"';	
					} 
					?>
                    
                    <p>
                    <input name="sidebar_checkbox" id="sidebar_checkbox" value="on" type="checkbox" <?php echo $checkbox_text; ?> />
                    </p>
                    </fieldset>
                </td>
            </tr>   
            
            <tr>
            <th scope="row">Upload Logo</th>
            <td>
            <input type="text" id="logo_url" name="theme_options[logo]" value="<?php echo esc_url( $theme_options['logo'] ); ?>" />
        <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wptuts' ); ?>" />
        <span class="description"><?php _e('Upload an image for the banner.', 'wptuts' ); ?></span>
                <?php // Add Logo uploader
				add_settings_field('wptuts_setting_logo',  __( 'Logo', 'wptuts' ), 'wptuts_setting_logo', 'wptuts', 'wptuts_settings_header');
				?>
                
                <br /><br />
                
<?php $logo_img = ot_get_option( 'omc_logo_image'); ?>
<img src="<?php echo $logo_img; ?>" alt="logo" />                
                
            </td>
            </tr>            
            
                  
            <tr>
	            <th scope="row">Colors</th>
            	<td>
                <p><small><span style="color: #666;">Type in color hex code (ie: #CCCCCC, #000000) or click on box to select from color picker. Click text box again to close it.</span></small></p>
                <p> Link color: <input type="text" id="color" name="color" value="<?php if($theme_options['color'] == ""){ echo $value['color'];}else{ echo $theme_options['color'];}; ?>" size="10" />
    			<div id="ilctabscolorpicker"></div>
    			</p>
    
				<script type="text/javascript">
                 
                  jQuery(document).ready(function() {
                    jQuery('#ilctabscolorpicker').hide();
                    jQuery('#ilctabscolorpicker').farbtastic("#color");
                    jQuery("#color").click(function(){jQuery('#ilctabscolorpicker').slideToggle()});
                  });
                 
                </script>
                </td>
            </tr>
		</table>        

        <input type="submit" value="Update Theme Options" name="submit" class="button button-primary"  />
    
    </form>	
	<?php 
	echo '</div>';
}





function wptuts_setting_logo() {
    $wptuts_options = get_option( 'wrdtempsite_theme_options' );
    ?>
        <input type="text" id="logo_url" name="theme_wptuts_options[logo]" value="<?php echo esc_url( $wptuts_options['logo'] ); ?>" />
        <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wptuts' ); ?>" />
        <span class="description"><?php _e('Upload an image for the banner.', 'wptuts' ); ?></span>
    <?php
}


//reorder Themes sub-menu in admin
add_filter( 'custom_menu_order', 'wpse_73006_submenu_order' );
function wpse_73006_submenu_order( $menu_ord ){
    global $submenu;
    // Enable the next line to inspect the $submenu values
    //echo '<pre>'.print_r($submenu,true).'</pre>';
    $arr = array();
    $arr[] = $submenu['themes.php'][5];
	$arr[] = $submenu['themes.php'][11];	
    $arr[] = $submenu['themes.php'][6];
	$arr[] = $submenu['themes.php'][7];
	$arr[] = $submenu['themes.php'][10];	
	$arr[] = $submenu['themes.php'][12];		
    $submenu['themes.php'] = $arr;
    return $menu_ord;
}