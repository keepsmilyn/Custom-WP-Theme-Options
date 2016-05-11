<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options');

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'style_settings',
        'title'       => 'Style Settings'
      ),
      array(
        'id'          => 'hot_buttons',
        'title'       => 'Hot Buttons'
      ),
      array(
        'id'          => 'social_media',
        'title'       => 'Social Media'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo_image',
        'label'       => 'Logo Image',
        'desc'        => 'Upload a logo image here by pressing on the plus button. 
<br /><br />
<b>DEVELOPER NOTE:</b> After uploading, users are required to press the "Send to OptionTree" button in order to populate the input with the URI of that media. There is one caveat of this feature. If you import the theme options and have uploaded media on one site the old URI will not reflect the URI of your new site. You will have to re-upload or FTP any media to your new server and change the URIs if necessary.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'designed_by',
        'label'       => 'Website Designed By Information',
        'desc'        => 'Enter the designed by text here for copyright of the website design. This will appear in the footer of every page.',
        'std'         => 'Designed by <a href="http://www.whiteriverdesign.com" target="_blank">WRD</a>',
        'type'        => 'textarea',
        'section'     => 'general',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'omc_favicon',
        'label'       => 'Favicon',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'outer_background',
        'label'       => 'Outer Background Image / Colour',
        'desc'        => 'The Background option type is for adding background styles to your theme either dynamically via the CSS option type below or manually with <code>ot_get_option()</code>. The Background option type has filters that allow you to remove fields or change the defaults. For example, you can filter <code>ot_recognized_background_fields</code> to remove unwanted fields from all Background options or an individual one. You can also filter <code>ot_recognized_background_repeat</code>, <code>ot_recognized_background_attachment</code>, <code>ot_recognized_background_position</code>, and <code>ot_type_background_size_choices</code>. These filters allow you to fine tune the select lists for your specific needs.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'inner_background',
        'label'       => 'Inner Background Image / Colour',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'primary_colour',
        'label'       => 'Primary Colour',
        'desc'        => 'Used on the header &amp; footer bar, navigation drop down and mobile menu.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'secondary_colour',
        'label'       => 'Secondary Colour',
        'desc'        => 'This is the secondary colour used throughout the website for areas such as H2, secondary colour on mobile menu.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'global_links',
        'label'       => 'Global Links - Active / Visited, etc (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'global_links_hover',
        'label'       => 'Global Links - Hover (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'desktop_navigation_links',
        'label'       => 'Desktop Navigation Links',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'desktop_navigation_links_hover',
        'label'       => 'Desktop Navigation Links - Hover',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'desktop_dropdown_arrow',
        'label'       => 'Desktop Dropdown Arrow',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_1',
        'label'       => 'Heading 1 (colour &amp; styles)',
        'desc'        => 'Assign colour &amp; styles to the heading 1 / H1 tag.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_2',
        'label'       => 'Heading 2 (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_3',
        'label'       => 'Heading 3 (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_4',
        'label'       => 'Heading 4 (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_5',
        'label'       => 'Heading 5 (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_6',
        'label'       => 'Heading 6 (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'paragraphs',
        'label'       => 'Paragraphs (colour &amp; styles)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_text',
        'label'       => 'Footer Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'style_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'demo_css',
        'label'       => 'CSS',
        'desc'        => '<p>The CSS option type is a textarea that when used properly can add dynamic CSS to your theme from within OptionTree. Unfortunately, due server limitations you will need to create a file named <code>dynamic.css</code> at the root level of your theme and change permissions using <code>chmod</code> so the server can write to the file. I have had the most success setting this single file to <code>0777</code> but feel free to play around with permissions until everything is working. A good starting point is <code>0666</code>. When the server can save to the file, CSS will automatically be updated when you save your Theme Options.</p><p>This example assumes you have an option with the ID of <code>demo_background</code>. Which means this option will automatically insert the value of <code>demo_background</code> into the <code>dynamic.css</code> when the Theme Options are saved.</p>',
        'std'         => 'body {
   {{outer_background}}
}
#PageWrapper {
   {{inner_background}}
}
h1 {
 {{heading_1}};
}
h2 {
 {{heading_2}};
}
h3 {
 {{heading_3}};
}
h4 {
 {{heading_4}};
}
h5 {
 {{heading_5}};
}
h6 {
 {{heading_6}};
}
body, div, p {
 {{paragraphs}};
}

.cycloneslider-template-standard {
    margin-bottom: 0px !important;   
}

#Footer-DesignedBy, #Footer-DesignedBy a, #Footer-DesignedBy p, #Footer-Copyright, #Footer-Copyright a{ 
  {{footer_text}};   
}

/* Improve readability when focused and hovered in all browsers: h5bp.com/h */

a { {{global_links}}; }
a:visited { {{global_links}}; }
a:hover { {{global_links_hover}}; }

#DesktopNav a, #DesktopNav a:visited {
    {{desktop_navigation_links}};
}
#DesktopNav a:hover {
    {{desktop_navigation_links_hover}};
}
#DesktopNav .current-menu-item a {
    color:  {{primary_colour}};
}
/*  - SUB-MENU DROP DOWN BG COLOR */
#DesktopNav li ul li, #DesktopNav li ul li a {
    background-color: {{primary_colour}};
}
#DesktopNav li ul li a:hover {
    background-color: {{primary_colour}};
    color:  {{secondary_colour}};
}
#DesktopNav .menu-item-has-children {
    {{desktop_dropdown_arrow}};
}
/*  - MOBILE NAV BAR BG COLOR */
#mobile-nav ul li {
  background:{{primary_colour}};  
}
button.opened {
  background-color:{{primary_colour}};   
}
button.closed {
  background-color:{{primary_colour}};   
}
#toggle.opened {
  background-color:{{primary_colour}};   
}
#toggle.closed {
  background-color:{{primary_colour}};   
}
#mobile-nav .sub-menu {
    background:  {{secondary_colour}};
}
#mobile-nav .sub-menu li a {
    color:{{primary_colour}};   
}
#mobile-nav li:hover {
  background: {{secondary_colour}};
}
#mobile-nav .current-menu-item {
  background: {{secondary_colour}};
}
/*  - FOOTER BG COLOR */
#FooterWrapper {
  background:{{primary_colour}};
}
/*  - HEADERBAR BG COLOR */
#Headerbar {
  background:{{primary_colour}};
}',
        'type'        => 'css',
        'section'     => 'style_settings',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_hot_buttons',
        'label'       => 'Display Hot Buttons',
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_1_over',
        'label'       => 'Hot Button 1 - Overlay',
        'desc'        => 'This is the first hot button overlay image. This image will appear prior to hovering. If there is no "overlay" image used then the hot button will default to the main hot button image provided below.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_1',
        'label'       => 'Hot Button 1',
        'desc'        => 'This is the first hot button. The image which appears after hovering over it.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_1_url',
        'label'       => 'Hot Button 1 - Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_2_over',
        'label'       => 'Hot Button 2 - Overlay',
        'desc'        => 'This is the section hot button overlay image. This image will appear prior to hovering. If there is no "overlay" image used then the hot button will default to the main hot button image provided below.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_2',
        'label'       => 'Hot Button 2',
        'desc'        => 'This is the second hot button. The image which appears after hovering over it.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_2_url',
        'label'       => 'Hot Button 2 - Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_3_over',
        'label'       => 'Hot Button 3 - Overlay',
        'desc'        => 'This is the third hot button overlay image. This image will appear prior to hovering. If there is no "overlay" image used then the hot button will default to the main hot button image provided below.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_3',
        'label'       => 'Hot Button 3',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hot_button_3_url',
        'label'       => 'Hot Button 3 - Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'hot_buttons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_links',
        'label'       => 'Social Links',
        'desc'        => 'The Social Links option type utilizes a drag &amp; drop interface to create a list of social links. There are a few filters that make extending this option type easy. You can set the ot_type_social_links_load_defaults filter to false and turn off loading default values. Use the ot_type_social_links_defaults filter to change the default values that are loaded. To filter the settings array use the ot_social_links_settings filter.',
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}