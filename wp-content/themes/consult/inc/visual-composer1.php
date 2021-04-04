<?php
// Legacy Update
function Consult_visual_composer_legacy_update() {
    if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.3.5', '<' ) ) {
        do_action( 'vc_before_init' );
    }
}
add_action( 'admin_init', 'Consult_visual_composer_legacy_update' );

/* Set Visual Composer */
// Removes tabs such as the "Design Options" from the Visual Composer Settings & page and disables automatic updates.
function Consult_visual_composer_set_as_theme() {
    vc_set_as_theme( true );
}
add_action( 'vc_before_init', 'Consult_visual_composer_set_as_theme' );
// Remove Default Shortcodes
if ( ! function_exists( 'Consult_visual_composer_remove_default_shortcodes' ) ) {
    function Consult_visual_composer_remove_default_shortcodes() {
        //vc_remove_element( 'vc_column_text' );
        //vc_remove_element( 'vc_separator' );
        //vc_remove_element( 'vc_text_separator' );
        //vc_remove_element( 'vc_message' );
        //vc_remove_element( 'vc_facebook' );
        //vc_remove_element( 'vc_tweetmeme' );
        //vc_remove_element( 'vc_googleplus' );
        vc_remove_element( 'vc_pinterest' );
        vc_remove_element( 'vc_toggle' );
        //vc_remove_element( 'vc_single_image' );
      //  vc_remove_element( 'vc_gallery' );
        vc_remove_element( 'vc_images_carousel' );
        vc_remove_element( 'vc_tabs' );
        vc_remove_element( 'vc_tour' );
        vc_remove_element( 'vc_accordion' );
        vc_remove_element( 'vc_posts_grid' );
        vc_remove_element( 'vc_carousel' );
        vc_remove_element( 'vc_posts_slider' );
        vc_remove_element( 'vc_widget_sidebar' );
        vc_remove_element( 'vc_button' );
        vc_remove_element( 'vc_cta_button' );
        //vc_remove_element( 'vc_video' );
        //vc_remove_element( 'vc_gmaps' );
        //vc_remove_element( 'vc_raw_html' );
        vc_remove_element( 'vc_raw_js' );
        vc_remove_element( 'vc_flickr' );
        //vc_remove_element( 'vc_progress_bar' );
        //vc_remove_element( 'vc_pie' );
       // vc_remove_element( 'contact-form-7' );
       // vc_remove_element( 'rev_slider_vc' );
       // vc_remove_element( 'rev_slider' );
        vc_remove_element( 'vc_wp_search' );
        vc_remove_element( 'vc_wp_meta' );
        vc_remove_element( 'vc_wp_recentcomments' );
        vc_remove_element( 'vc_wp_calendar' );
        vc_remove_element( 'vc_wp_pages' );
        vc_remove_element( 'vc_wp_tagcloud' );
        vc_remove_element( 'vc_wp_custommenu' );
        //vc_remove_element( 'vc_wp_text' );
        vc_remove_element( 'vc_wp_posts' );
        vc_remove_element( 'vc_wp_links' );
        vc_remove_element( 'vc_wp_categories' );
        vc_remove_element( 'vc_wp_archives' );
        vc_remove_element( 'vc_wp_rss' );
        vc_remove_element( 'vc_button2' );
        vc_remove_element( 'vc_cta_button2' );
        //vc_remove_element( 'vc_custom_heading' );
        //vc_remove_element( 'vc_empty_space' );
        //vc_remove_element( 'vc_icon' );
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element( 'vc_tta_tour' );
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element( 'vc_tta_pageable' );
        //vc_remove_element( 'vc_btn' );
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_basic_grid' );
        //vc_remove_element( 'vc_media_grid' );
        vc_remove_element( 'vc_masonry_grid' );
        vc_remove_element( 'vc_acf' );
        //vc_remove_element( 'vc_masonry_media_grid' );
    }
    add_action( 'vc_before_init', 'Consult_visual_composer_remove_default_shortcodes' );
}
// Remove Default Templates
if ( ! function_exists( 'Consult_visual_composer_remove_default_templates' ) ) {
    function Consult_visual_composer_remove_default_templates( $data ) {
        return array();
    }
    add_filter( 'vc_load_default_templates', 'Consult_visual_composer_remove_default_templates' );
}
// Remove Meta Boxes
if ( ! function_exists( 'Consult_visual_composer_remove_meta_boxes' ) ) {
    function Consult_visual_composer_remove_meta_boxes() {
        if ( is_admin() ) {
            foreach ( get_post_types() as $post_type ) {
                remove_meta_box( 'vc_teaser',  $post_type, 'side' );
            }
        }
    }
    add_action( 'do_meta_boxes', 'Consult_visual_composer_remove_meta_boxes' );
}
// Disable Frontend Editor
if ( function_exists( 'vc_disable_frontend' ) ) {
    vc_disable_frontend();
}
// Map Shortcodes
if ( ! function_exists( 'Consult_visual_composer_map_shortcodes' ) ) {
    function Consult_visual_composer_map_shortcodes() {
        $animations = array(
            'Select' => '',
            'bounce' => 'bounce',
            'bounceIn'     => 'bounceIn',
            'flash'     => 'flash',
            'pulse'     => 'pulse',
            'rubberBand'     => 'rubberBand',
            'shake'     => 'shake',
            'swing'     => 'swing',
            'tada'     => 'tada',
            'wobble'     => 'wobble',
            'jello'     => 'jello',
            'fadeIn'     => 'fadeIn',
            'fadeInDown'     => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'     => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'     => 'fadeInRight',
            'fadeInRightBig'     => 'fadeInRightBig',
            'fadeInUp'     => 'fadeInUp',
            'fadeInUpBig'     => 'fadeInUpBig',
            'fadeOut'     => 'fadeOut',
            'fadeOutDown'     => 'fadeOutDown',
            'fadeOutDownBig'     => 'fadeOutDownBig',
            'fadeOutLeft'     => 'fadeOutLeft',
            'fadeOutLeftBig'     => 'fadeOutLeftBig',
            'fadeOutRight'     => 'fadeOutRight',
            'fadeOutRightBig'     => 'fadeOutRightBig',
            'fadeOutUp'     => 'fadeOutUp',
            'fadeOutUpBig'     => 'fadeOutUpBig',
            'slideInUp'     => 'slideInUp',
            'slideInDown'     => 'slideInDown',
            'slideInLeft'     => 'slideInLeft',
            'slideInRight'     => 'slideInRight',
            'zoomIn'     => 'zoomIn',
            'zoomInDown'     => 'zoomInDown',
            'zoomInLeft'     => 'zoomInLeft',
            'zoomInRight'     => 'zoomInRight',
            'zoomInUp'     => 'zoomInUp',
        );
        // Container
        vc_map(
            array(
                'base'            => 'container',
                'name'            => esc_html__( 'Container', 'Consult1' ),
                'weight'          => 1,
                'class'           => 'container',
                'icon'            => 'Consult_vc_container',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Include a container in your content', 'Consult1' ),
                'as_parent'       => array( 'only' => 'vc_gmaps,theme_title_border,featured_box,blog_posts,theme_button,services_box,testimonials,featured_room,theme_title,rooms,image_carousel,galleries,vc_column_text,vc_separator,vc_text_separator,vc_message,vc_facebook,vc_tweetmeme,vc_googleplus,vc_single_image,vc_video,vc_raw_html,vc_progress_bar,vc_pie,contact-form-7,vc_wp_text,vc_custom_heading,vc_empty_space,vc_icon,vc_btn,vc_media_grid,vc_masonry_media_grid,vc_row'),
                'content_element' => true,
                'js_view'         => 'VcColumnView',
                'params'          => array(
                    array(
                        'param_name'  => 'class',
                        'heading'     => esc_html__( 'Class', 'Consult1' ),
                        'description' => esc_html__( '(Optional) Enter a unique class/classes.', 'Consult1' ),
                        'type'        => 'textfield'
                    )
                )
            )
        );
        // Galleries
        vc_map(
            array(
                'base'            => 'galleries',
                'name'            => esc_html__( 'Galleries', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_porfolio',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add galleries to your content.', 'Consult1' ),
                'params'          => array(
                    // Gallery Columns
                    array(
                        'param_name'  => 'columns',
                        'heading'     => esc_html__( 'Gallery Columns', 'Consult1' ),
                        'description' => esc_html__( 'Set gallery columns.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '3 Columns' => 3,
                            '4 Columns'     => 4
                        ),
                        'admin_label' => true
                    ),
                    // Space
                    array(
                        'param_name'  => 'space',
                        'heading'     => esc_html__( 'Add Space', 'Consult1' ),
                        'description' => esc_html__( 'Add space among gallery items.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'No' => 'no',
                            'Yes'     => 'yes'
                        ),
                        'admin_label' => true
                    ),
                    // Gallery Type
                    array(
                        'param_name'  => 'gallery_type',
                        'heading'     => esc_html__( 'Gallery Type ID', 'Consult1' ),
                        'description' => esc_html__( 'Enter type ID separating by single comma else all will be displayed.', 'Consult1' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Number Of Posts To display
                    array(
                        'param_name'  => 'number_of_posts',
                        'heading'     => esc_html__( 'Number Of Images To Display', 'Consult1' ),
                        'description' => esc_html__( 'Number of gallery items to display.', 'Consult1' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'Consult1' ),
                        'description' => esc_html__( 'Display order for gallery items.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    )
                )
            )
        );
        // Image Carousel
        vc_map(
            array(
                'base'            => 'image_carousel',
                'name'            => esc_html__( 'Image Carousel', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_img_carousel',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add image carousel to your content.', 'Consult1' ),
                'params'          => array(
                    // Carousel Images
                    array(
                        'param_name'  => 'images',
                        'heading'     => esc_html__( 'Select Images', 'Consult1' ),
                        'description' => esc_html__( 'Choose or upload images for carousel.', 'Consult1' ),
                        'type'        => 'attach_images',
                        'holder' => 'h3'
                    ),
                )
            )
        );
        // Rooms
        vc_map(
            array(
                'base'            => 'rooms',
                'name'            => esc_html__( 'Rooms', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_rooms',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add rooms to your content.', 'Consult1' ),
                'params'          => array(
                    // Rooms Layout
                    array(
                        'param_name'  => 'rooms_layout',
                        'heading'     => esc_html__( 'Rooms Layout', 'Consult1' ),
                        'description' => esc_html__( 'Select rooms layout.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '2 Columns' => '2-columns',
                            '3 Columns'     => '3-columns',
                            '4 Columns Simple'     => '4-columns',
                            'Left, Right View'     => 'left-right',
                            'Masonry'     => 'masonry'
                        ),
                        'admin_label' => true
                    ),
                    // Room Type
                    array(
                        'param_name'  => 'room_type',
                        'heading'     => esc_html__( 'Room Type IDs', 'Consult1' ),
                        'description' => esc_html__( 'Enter type ID separating by single comma else all will be displayed.', 'Consult1' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Number Of Rooms To display
                    array(
                        'param_name'  => 'number_of_rooms',
                        'heading'     => esc_html__( 'Number Of Rooms To Display', 'Consult1' ),
                        'description' => esc_html__( 'Number of rooms to display.', 'Consult1' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'Consult1' ),
                        'description' => esc_html__( 'Display order for rooms.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    ),
                    // Hide Pagination
                    array(
                        'param_name'  => 'hide_pagination',
                        'heading'     => esc_html__( 'Hide Pagination', 'Consult1' ),
                        'description' => esc_html__( 'You can hide rooms pagination.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Yes' => 'yes',
                            'No'     => 'no'
                        ),
                        'admin_label' => true
                    )
                )
            )
        );
        // Theme Title
        vc_map(
            array(
                'base'            => 'theme_title',
                'name'            => esc_html__( 'Simple Title', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_simple_title',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add simple title to your content.', 'Consult1' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'Consult1' ),
                        'description' => esc_html__( 'Input heading text.', 'Consult1' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'Consult1' ),
                        'description' => esc_html__( 'Set your title block text alignment.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'Consult1' ),
                        'description' => esc_html__( 'Choose heading style.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'color-white',
                            'Dark'     => 'color-dark'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Title With Bottom Borders
        vc_map(
            array(
                'base'            => 'theme_title_border',
                'name'            => esc_html__( 'Title With Bottom Borders', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_heading_border',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add title with bottom borders to your content.', 'Consult1' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'Consult1' ),
                        'description' => esc_html__( 'Input heading text.', 'Consult1' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'Consult1' ),
                        'description' => esc_html__( 'Set your title block text alignment.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'Consult1' ),
                        'description' => esc_html__( 'Choose heading style.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'color-white',
                            'Dark'     => 'dark'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Featured Room
        vc_map(
            array(
                'base'            => 'featured_room',
                'name'            => esc_html__( 'Featured Room', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_featured_room',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add single featured room to your content.', 'Consult1' ),
                'params'          => array(
                    // Featured Room
                    array(
                        'param_name'  => 'room_id',
                        'heading'     => esc_html__( 'Room ID', 'Consult1' ),
                        'description' => esc_html__( 'You can pick room ID (post) from top browser bar by editing room.', 'Consult1' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    )
                )
            )
        );
        // Client Testimonials
        vc_map(
            array(
                'base'            => 'testimonials',
                'name'            => esc_html__( 'Client Testimonials', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_testimonials',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add testimonials to your content.', 'Consult1' ),
                'params'          => array(
                    // Number Of Testimonials
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Testimonials', 'Consult1' ),
                        'description' => esc_html__( 'Only numeric values, default is 3.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'Consult1' ),
                        'description' => esc_html__( 'Set testimonials display order.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Group Slug
                    array(
                        'param_name'  => 'grp_slug',
                        'heading'     => esc_html__( 'Group Slug', 'Consult1' ),
                        'description' => esc_html__( 'Enter group slug or leave empty for all.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'Consult1' ),
                        'description' => esc_html__( 'Choose testimonials style.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'color-white',
                            'Dark'     => 'dark'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Services Boxes
        vc_map(
            array(
                'base'            => 'services_box',
                'name'            => esc_html__( 'Services Boxes', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_services',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add service boxes with icon, heading & text. ', 'Consult1' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'Consult1' ),
                        'description' => esc_html__( 'Heading for the service.', 'Consult1' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Enter service description.', 'Consult1' ),
                        'description' => esc_html__( 'Enter large description about service.', 'Consult1' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),
                    // Icon
                    array(
                        'param_name'  => 'icon',
                        'heading'     => esc_html__( 'Icon Class', 'Consult1' ),
                        'description' => esc_html__( 'Enter icon class, choose from: http://fontawesome.io/icons/', 'Consult1' ),
                        'type'        => 'textfield',
                        'type'=>'icon',
                        "admin_label"	=> true
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_align',
                        'heading'     => esc_html__( 'Text Alignment', 'Consult1' ),
                        'description' => esc_html__( 'Set text alignment.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Theme Button/Link
        vc_map(
            array(
                'base'            => 'theme_button',
                'name'            => esc_html__( 'Theme Button/Link', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_button',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add simple button/link to your content.', 'Consult1' ),
                'params'          => array(
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'Consult1' ),
                        'description' => esc_html__( 'Input button text.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'Consult1' ),
                        'description' => esc_html__( 'Input button link.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Target
                    array(
                        'param_name'  => 'target',
                        'heading'     => esc_html__( 'Target', 'Consult1' ),
                        'description' => esc_html__( 'Choose link target.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Blank' => '_blank',
                            'Parent' => '_parent',
                            'Self' => '_self',
                            'Top'     => '_top'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Blog Posts
        vc_map(
            array(
                'base'            => 'blog_posts',
                'name'            => esc_html__( 'Blog Posts', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_blog',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Use to insert blog posts to your content.', 'Consult1' ),
                'params'          => array(
                    // Number Of Posts
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Posts', 'Consult1' ),
                        'description' => esc_html__( 'Only numeric values, default is 3.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'Consult1' ),
                        'description' => esc_html__( 'Set posts display order.', 'Consult1' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Category Slug
                    array(
                        'param_name'  => 'cat_slug',
                        'heading'     => esc_html__( 'Category Slug', 'Consult1' ),
                        'description' => esc_html__( 'Enter category slug or leave empty for all.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Featured Box
        vc_map(
            array(
                'base'            => 'featured_box',
                'name'            => esc_html__( 'Featured Box', 'Consult1' ),
                'class'           => '',
                'icon'            => 'Consult_vc_box',
                'category'        => esc_html__( 'Consult WP', 'Consult1' ),
                'description'     => esc_html__( 'Add feature boxed to your content.', 'Consult1' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'Consult1' ),
                        'description' => esc_html__( 'Input heading text.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Small Description
                    array(
                        'param_name'  => 'small_description',
                        'heading'     => esc_html__( 'Small Description', 'Consult1' ),
                        'description' => esc_html__( 'Input small description text.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'Consult1' ),
                        'description' => esc_html__( 'Input button text.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'Consult1' ),
                        'description' => esc_html__( 'Input button link.', 'Consult1' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )

                )
            )
        );
    }
    add_action( 'vc_before_init', 'Consult_visual_composer_map_shortcodes' );
    // Extend container class (parents).
    if(class_exists('WPBakeryShortCodesContainer')){
        class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer { }

    }
    // Extend shortcode class (children).
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_Galleries extends WPBakeryShortCode { }
        class WPBakeryShortCode_Image_carousel extends WPBakeryShortCode { }
        class WPBakeryShortCode_Rooms extends WPBakeryShortCode { }
        class WPBakeryShortCode_Theme_title extends WPBakeryShortCode { }
        class WPBakeryShortCode_Featured_room extends WPBakeryShortCode { }
        class WPBakeryShortCode_Testimonials extends WPBakeryShortCode { }
        class WPBakeryShortCode_Services_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Theme_button extends WPBakeryShortCode { }
        class WPBakeryShortCode_Blog_posts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Featured_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Theme_title_border extends WPBakeryShortCode { }
    }

}

// Update Existing Elements
if ( ! function_exists( 'Consult_visual_composer_update_existing_shortcodes' ) ) {
    function Consult_visual_composer_update_existing_shortcodes() {
    }
    add_action( 'admin_init', 'Consult_visual_composer_update_existing_shortcodes' );
}
// Incremental ID Counter for Templates
if ( ! function_exists( 'Consult_visual_composer_templates_id_increment' ) ) {
    function Consult_visual_composer_templates_id_increment() {
        static $count = 0; $count++;
        return $count;
    }
}