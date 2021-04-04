<?php
/*
 * Theme shortcodes
 */
// Content filter used ONLY on custom theme shortcodes to remove
add_filter("the_content", "the_content_filter");
function the_content_filter($content) {
    // array of custom shortcodes requiring the fix
    $block = join("|",array(
        "pricing_table",
    ));
// opening tag
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
    return $rep;
}
// Container Shortcode
function container_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['class'])){
        $class = $atts['class'];
    } else {
        $class = '';
    }
    $out = '';
    $out .= '<div class="container '.$class.'">';
    $out .= do_shortcode($content);
    $out .= '</div>';
    return $out;
}
add_shortcode('container', 'container_shortcode');
// Galleries Shortcode
function galleries_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['columns'])){
        $columns = $atts['columns'];
    } else {
        $columns = 3;
    }
    if(!empty($atts['gallery_type'])){
        $gallery_type = $atts['gallery_type'];
    } else {
        $gallery_type = '';
    }
    if(!empty($atts['number_of_posts'])){
        $number_of_posts = $atts['number_of_posts'];
    } else {
        $number_of_posts = 6;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    $data_space = 0;
    if(!empty($atts['space'])){
        $space = $atts['space'];
        if($space == 'yes'){
            $data_space = 25;
        }
    } else {
        $space = '';
    }
    $out = '';

    if(!empty($gallery_type)){
        $ex_gallery_type = explode(",",$gallery_type);
        $categories = get_terms( 'galleries-types', array(
            'orderby'    => 'count',
            'hide_empty' => 1,
            'include'    => $ex_gallery_type
        ) );
    }else{
        $categories = get_terms( 'galleries-types', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
    }
    // Loop Arguments
    $term_array = array();
    foreach($categories as $cat) {
        $term_array[] = $cat->slug;
    }
    $galleries = array(
        'post_type' => 'galleries',
        'posts_per_page' => $number_of_posts,
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'galleries-types',
                'field'    => 'slug',
                'terms'    => $term_array,
            ),
        ),
    );
    $galleries_loop = new WP_Query($galleries);
    $out .= '<div class="portfolioContainer" data-columns="'.$columns.'" data-space="'.$data_space.'">';
    while ( $galleries_loop->have_posts() ) : $galleries_loop->the_post();
        $out .= '<div class="port-item cbp-item">';
        $out .= '<div class="inner cbp-caption">';
        $out .= '<div class="cbp-caption-defaultWrap">';
        $gallery_image = regal_wp_get_field('gallery_image');
        if(!empty($gallery_image)){
            $out .= '<img src="'.esc_url($gallery_image).'" alt="'.get_the_title().'" />';
        }
        $out .= '</div>';
        $out .= '<div class="inset-overlay">';
        $out .= '<a href="'.esc_url($gallery_image).'" class="cbp-lightbox" data-title="'.get_the_title().'">&nbsp;</a>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
    endwhile;
    $out .= '</div>';
    wp_reset_postdata();
    return $out;
}
add_shortcode('galleries', 'galleries_shortcode');
// Image Carousel Shortcode
function image_carousel_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['images'])){
        $images = $atts['images'];
    } else {
        $images = '';
    } $ex_images = explode(',',$images);
    $rand = rand(9,999);
    $out = '';
    $out .= '<div id="carousel-example-generic-'.$rand.'" class="carousel slide gallery-slider" data-ride="carousel">';
    $out .= '<div class="carousel-inner" role="listbox">';
    $i = 1;
    foreach($ex_images as $img_id){
        $image_info = wp_get_attachment_image_src( $img_id, 'full' );
        $class = '';
        if($i == 1){
            $class = ' active';
        }
        $out .= '<div class="item'.$class.'">';
        $out .= '<img src="'.$image_info[0].'" alt="">';
        $out .= '</div>';
        $i++;
    }
    $out .= '</div>';
    $out .= '<div class="control-holder">';
    $out .= '<a class="left" href="#carousel-example-generic-'.$rand.'" data-slide="prev">'.esc_html__('Previous Slide','regal-wp').'</a>';
    $out .= '<a class="right" href="#carousel-example-generic-'.$rand.'" data-slide="next">'.esc_html__('Next Slide','regal-wp').'</a>';
    $out .= '</div>';
    $out .= '<ol class="carousel-indicators">';
    $y = 0;
    foreach($ex_images as $img_id){
        $cl = '';
        if($y == 0){
            $cl = 'class="active"';
        }
        $out .= '<li data-target="#carousel-example-generic-'.$rand.'" data-slide-to="'.$y.'" '.$cl.'></li>';
        $y++;
    }
    $out .= '</ol>';
    $out .= '</div>';
    return $out;
}
add_shortcode('image_carousel', 'image_carousel_shortcode');
// Rooms Shortcode
function rooms_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['rooms_layout'])){
        $rooms_layout = $atts['rooms_layout'];
    } else {
        $rooms_layout = '2-columns';
    }
    if(!empty($atts['room_type'])){
        $room_type = $atts['room_type'];
    } else {
        $room_type = '';
    }
    if(!empty($atts['number_of_rooms'])){
        $number_of_rooms = $atts['number_of_rooms'];
    } else {
        $number_of_rooms = 6;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['hide_pagination'])){
        $hide_pagination = $atts['hide_pagination'];
    } else {
        $hide_pagination = 'no';
    }
    $out = '';
    if(!empty($room_type)){
        $ex_room_type = explode(",",$room_type);
        $categories = get_terms( 'rooms-types', array(
            'orderby'    => 'count',
            'hide_empty' => 1,
            'include'    => $ex_room_type
        ) );
    }else{
        $categories = get_terms( 'rooms-types', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
    }
    // Loop Arguments
    $term_array = array();
    foreach($categories as $cat) {
        $term_array[] = $cat->slug;
    }
    global $paged;
    $rooms = array(
        'post_type' => 'rooms',
        'paged' => $paged,
        'posts_per_page' => $number_of_rooms,
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'rooms-types',
                'field'    => 'slug',
                'terms'    => $term_array,
            ),
        ),
    );
    $rooms_loop = new WP_Query($rooms);
    if($rooms_layout == 'masonry' && $hide_pagination == 'no'){
        $space = ' margin-bottom-50';
    } else {
        $space = '';
    }
    if($rooms_layout == 'masonry'){
        $class = 'class="portfolioContainer '.$space.'" data-columns="3" data-space="0"';
    } else {
        $class = '';
    }
    $out .= '<div '.$class.'>';
    $count = 1;
    while ( $rooms_loop->have_posts() ) : $rooms_loop->the_post();
        $room_price = regal_wp_get_field('room_price');
        $currency_symbol = regal_wp_get_field('currency_symbol');
        $reservation_period = regal_wp_get_field('reservation_period');
        if($rooms_layout == '2-columns'){
            $out .= '<div class="col-sm-6">';
            $out .= '<div class="room-post">';
            if(has_post_thumbnail()){
                $out .= '<a href="'.get_the_permalink().'">';
                $out .= '<img src="'.regal_wp_get_feature_image_url(get_the_ID()).'" alt="'.get_the_title().'" />';
                $out .= '</a>';
            }
            $out .= '<div class="inner">';
            $out .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a> </h4>';
            $out .= get_the_excerpt();
            $out .= '<div class="meta-data">';
            $out .= '<p class="mp-bold">';
            $out .= $currency_symbol.$room_price;
            if(!empty($reservation_period)){
                $out .= '/'.$reservation_period;
            }
            $out .= '</p>';
            $out .= '<a href="'.get_the_permalink().'" class="btn hvr-shutter-out-horizontal pull-right">'.esc_html__('VIEW MORE','regal-wp').'</a>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            if($count % 2 == 0){
                $out .='<div class="clearfix clear"></div>';
            }
        } elseif($rooms_layout == '3-columns'){
            $out .= '<div class="col-sm-4">';
            $out .= '<div class="room-post">';
            if(has_post_thumbnail()){
                $out .= '<a href="'.get_the_permalink().'">';
                $out .= '<img src="'.regal_wp_get_feature_image_url(get_the_ID()).'" alt="'.get_the_title().'" />';
                $out .= '</a>';
            }
            $out .= '<div class="inner">';
            $out .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a> </h4>';
            $out .= get_the_excerpt();
            $out .= '<div class="meta-data">';
            $out .= '<p class="mp-bold">';
            $out .= $currency_symbol.$room_price;
            if(!empty($reservation_period)){
                $out .= '/'.$reservation_period;
            }
            $out .= '</p>';
            $out .= '<a href="'.get_the_permalink().'" class="btn hvr-shutter-out-horizontal pull-right">'.esc_html__('VIEW MORE','regal-wp').'</a>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            if($count % 3 == 0){
                $out .='<div class="clearfix clear"></div>';
            }
        } elseif($rooms_layout == '4-columns'){
            $out .= '<div class="col-md-3">';
            $out .= '<div class="room-post">';
            if(has_post_thumbnail()){
                $out .= '<a href="'.get_the_permalink().'">';
                $out .= '<img src="'.regal_wp_get_feature_image_url(get_the_ID()).'" alt="'.get_the_title().'" />';
                $out .= '</a>';
            }
            $out .= '<div class="inner text-center">';
            $out .= '<h4 class="margin-bottom-10"><a href="'.get_the_permalink().'">'.get_the_title().'</a> </h4>';
            $out .= '<p class="mp-bold color-dark font-16">';
            $out .= $currency_symbol.$room_price;
            if(!empty($reservation_period)){
                $out .= '/'.$reservation_period;
            }
            $out .= '</p>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            if($count % 4 == 0){
                $out .='<div class="clearfix clear"></div>';
            }
        } elseif($rooms_layout == 'left-right'){
            $starting_from_string = regal_wp_get_field('starting_from_string');
            $book_now_string = regal_wp_get_field('book_now_string');
            $services_included_string = regal_wp_get_field('services_included_string');
            if($count % 2 != 0 && has_post_thumbnail()){
                $out .= '<div class="col-md-7">';
                $out .= get_the_post_thumbnail();
                $out .= '</div>';
            }
            $out .= '<div class="col-md-5">';
            $out .= '<div class="rooms-details">';
            $out .= '<h3 class="margin-top-0">'.get_the_title().'</h3>';
            $out .= '<p>'.get_the_excerpt().'</p>';
            $out .= '<p class="font-18 mp-bold">';
            if(!empty($starting_from_string)){
                $out .= $starting_from_string.': ';
            }
            $out .= $currency_symbol.$room_price;
            $out .= '</p>';
            $out .= '<div class="space20"></div>';
            if(!empty($book_now_string)){
                $book_now_link_override = regal_wp_get_field('book_now_link_override');
                if(!empty($book_now_link_override)){
                    $link = esc_url($book_now_link_override);
                } else{
                    $link = regal_wp_reservation_page_id();
                }
                $out .= '<a href="'.$link.'" class="btn hvr-shutter-out-horizontal">'.$book_now_string.'</a>';
            }
            $out .= '<div class="clearfix"></div>';
            $out .= '<div class="room-facilities border">';
            if(!empty($services_included_string)){
                $out .= '<h4>'.$services_included_string.'</h4>';
            } if(have_rows('add_room_services')){
                $out .= '<ul>';
                while(have_rows('add_room_services')) : the_row('add_room_services');
                    $out .= '<li>'.get_sub_field('room_service').'</li>';
                endwhile;
                $out .= '</ul>';
            }
            $out .= '<a href="'.get_the_permalink().'" class="ms-regular">'.esc_html__('View More','regal-wp').'</a>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            if($count % 2 == 0 && has_post_thumbnail()){
                $out .= '<div class="col-md-7">';
                $out .= get_the_post_thumbnail();
                $out .= '</div>';
            }
            $out .= '<div class="clearfix"></div>';
            $out .= '<div class="space80"></div>';
        } else{
            $out .= '<div class="port-item cbp-item">';
            $out .= '<div class="inner cbp-caption">';
            if(has_post_thumbnail()){
                $out .= '<div class="cbp-caption-defaultWrap">';
                $out .= '<img src="'.regal_wp_get_feature_image_url(get_the_ID()).'" alt="'.get_the_title().'" />';
                $out .= '</div>';
            }
            $out .= '<a href="'.get_the_permalink().'" class="outer-overlay">&nbsp;</a>';
            $out .= '<div class="overlay">';
            $out .= '<div class="overlay-head">';
            $out .= '<h4>'.get_the_title().'</h4>';
            $out .= '</div>';
            $out .= '<div class="overlay-body">';
            $out .= get_the_excerpt();
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
        }
        $count++;
    endwhile;
    $out .= '</div>';
    if($hide_pagination != 'yes'){
        // Pagination
        $out .= '<div class="col-sm-12">';
        $out .= regal_wp_shortcode_pagination($rooms_loop->max_num_pages);
        $out .= '</div>';
    }
    wp_reset_postdata();
    return $out;
}
add_shortcode('rooms', 'rooms_shortcode');
// Theme Title Shortcode
function theme_title_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_alignment'])){
        $txt_alignment = $atts['txt_alignment'];
    } else {
        $txt_alignment = 'text-left';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    $out = '';
    $out .= '<h3 class="title '.$style.' '.$txt_alignment.'">'.$heading.'</h3>';
    return $out;
}
add_shortcode('theme_title', 'theme_title_shortcode');
// Featured Room Shortcode
function featured_room_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['room_id'])){
        $room_id = $atts['room_id'];
    } else {
        $room_id = '';
    }
    $rand = rand(9,999);
    $out = '';
    if ( FALSE === get_post_status($room_id) ) {
        $out .= '<p>'.esc_html__('Room not found! Please check your room ID.','regal-wp').'</p>';
    } else {
        $room_slider_images = regal_wp_get_field_by_id('room_slider_images',$room_id);
        $out .= '<div class="col-md-7">';
        if(is_array($room_slider_images)){
            $out .= '<div id="carousel-example-generic-'.$rand.'" class="carousel slide rooms-slider" data-ride="carousel">';
            $out .= '<div class="carousel-inner" role="listbox">';
            $i = 1;
            foreach($room_slider_images as $img){
                $class = '';
                if($i == 1){
                    $class = ' active';
                }
                $out .= '<div class="item'.$class.'">';
                $out .= '<img src="'.$img['url'].'" alt="">';
                $out .= '</div>';
                $i++;
            }
            $out .= '</div>';
            $out .= '<!-- Indicators -->';
            $out .= '<ol class="carousel-indicators">';
            $y = 0;
            foreach($room_slider_images as $img){
                $p_class = '';
                if($y == 0){
                    $p_class = 'class="active"';
                }
                $out .= '<li data-target="#carousel-example-generic-'.$rand.'" data-slide-to="'.$y.'" '.$p_class.'></li>';
                $y++;
            }
            $out .= '</ol>';
            $out .= '</div>';
        } else {
            $out .= get_the_post_thumbnail($room_id);
        }
        $out .= '</div>';
        $out .= '<div class="col-md-5">';
        $out .= '<div class="rooms-details">';
        $out .= '<h3>'.get_the_title($room_id).'</h3>';
        $room_price = regal_wp_get_field_by_id('room_price',$room_id);
        $currency_symbol = regal_wp_get_field_by_id('currency_symbol',$room_id);
        $starting_from_string = regal_wp_get_field_by_id('starting_from_string',$room_id);
        $out .= '<p class="font-18 mp-bold">'.$starting_from_string.'   '.$currency_symbol.$room_price.'</p>';
        $out .= '<div class="space20"></div>';
        $book_now_string = regal_wp_get_field_by_id('book_now_string',$room_id);
        if(!empty($book_now_string)){
            $book_now_link_override = regal_wp_get_field_by_id('book_now_link_override',$room_id);
            if(!empty($book_now_link_override)){
                $link = esc_url($book_now_link_override);
            } else{
                $link = regal_wp_reservation_page_id();
            }
            $out .= '<a href="'.$link.'" class="btn hvr-shutter-out-horizontal">'.$book_now_string.'</a>';
        }
        $out .= '<div class="clearfix"></div>';
        $out .= '<div class="room-facilities">';
        $services_included_string = regal_wp_get_field_by_id('services_included_string',$room_id);
        if(!empty($services_included_string)){
            $out .= '<h4>'.$services_included_string.'</h4>';
        } if(have_rows('add_room_services',$room_id)){
            $out .= '<ul>';
            while(have_rows('add_room_services',$room_id)) : the_row('add_room_services',$room_id);
                $out .= '<li>'.esc_attr(get_sub_field('room_service')).'</li>';
            endwhile;
            $out .= '</ul>';
        }
        $out .= '<a href="'.get_the_permalink($room_id).'" class="ms-regular">'.esc_html__('View More','regal-wp').'</a>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
    }
    return $out;
}
add_shortcode('featured_room', 'featured_room_shortcode');
// Testimonials Shortcode
function testimonials_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    if(!empty($atts['grp_slug'])){
        $grp_slug = $atts['grp_slug'];
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => $number,
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'testimonials_genre',
                    'field'    => 'slug',
                    'terms'    => $grp_slug,
                ),
            ),
        );
    } else {
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $testimonials_query = new WP_Query($args);
    $out .= '<div id="client-testimonials" class="carousel slide '.$style.'" data-ride="carousel">';
    $out .= '<div class="carousel-inner" role="listbox">';
    $count = 1;
    while($testimonials_query->have_posts()): $testimonials_query->the_post();
        $testimonials_author = regal_wp_get_field('testimonials_author');
        $author_designation_text = regal_wp_get_field('author_designation_text');
        $class = '';
        if($count == 1){
            $class = ' active';
        }
        $out .= '<div class="item'.$class.'">';
        $out .= '<div class="inner">';
        $out .= get_the_content();
        $out .= '<div class="clear clearfix"></div>';
        $out .= '<div class="test-author">';
        if(has_post_thumbnail()){
            $out .= get_the_post_thumbnail();
        }
        $out .= '<div>';
        if(!empty($testimonials_author)){
            $out .= '<h3>'.$testimonials_author.'</h3>';
        } if($author_designation_text){
            $out .= '<p>'.$author_designation_text.'</p>';
        }
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        $count++;
    endwhile;
    $out .= '</div>';
    $out .= '</div>';
    wp_reset_postdata();
    return $out;
}
add_shortcode('testimonials', 'testimonials_shortcode');
// Services Box
function services_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_desc'])){
        $txt_desc = $atts['txt_desc'];
    } else {
        $txt_desc = '';
    }
    if(!empty($atts['icon'])){
        $icon = $atts['icon'];
    } else {
        $icon = '';
    }
    if(!empty($atts['txt_align'])){
        $txt_align = $atts['txt_align'];
    } else {
        $txt_align = '';
    }
    

    $out = '';
    $out .= '<div class="col-md-4 col-sm-6 '.$txt_align.'">';
    $out .= '<i class="fa '.$icon.'"></i>';
    $out .= '<h4>'.$heading.'</h4>';
    $out .= '<p>'.$txt_desc.'</p>';
    $out .= '</div>';
    return $out;
}
add_shortcode('services_box', 'services_box_shortcode');
// Theme Button Shortcode
function theme_button_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['btn_txt'])){
        $btn_txt = $atts['btn_txt'];
    } else {
        $btn_txt = '';
    }
    if(!empty($atts['btn_link'])){
        $btn_link = $atts['btn_link'];
    } else {
        $btn_link = '';
    }
    if(!empty($atts['target'])){
        $target = 'target="'.$atts['target'].'"';
    } else {
        $target = '';
    }
    $out = '';
    $out .= '<a href="'.$btn_link.'" '.$target.' class="btn hvr-shutter-out-horizontal">';
    $out .= $btn_txt;
    $out .= '</a>';
    return $out;
}
add_shortcode('theme_button', 'theme_button_shortcode');
// Blog Posts Shortcode
function blog_posts_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['cat_slug'])){
        $cat_slug = $atts['cat_slug'];
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order,
            'category_name' => $cat_slug
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $blog_query = new WP_Query($args);
    $count = 1;
    while($blog_query->have_posts()): $blog_query->the_post();
        $out .= '<div class="col-md-4">';
        $out .= '<div class="blog-post">';
        if(has_post_thumbnail()){
            $out .= '<a href="'.get_the_permalink().'">';
            $out .= get_the_post_thumbnail();
            $out .= '</a>';
        }
        $out .= '<div class="inner">';
        $out .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a> </h4>';
        $out .= '<p>'.get_the_excerpt().'</p>';
        $out .= '<div class="meta-data">';
        $out .= '<p>'.get_the_time('M d, Y').' <span>'.esc_html__('By','regal-wp').' '.get_the_author().'</span></p>';
        $out .= '<a href="'.get_the_permalink().'" class="btn hvr-shutter-out-horizontal pull-right">'.esc_html__('READ MORE','regal-wp').'</a>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
        if($count % 3 == 0){
            $out .= '<div class="clear clearfix"></div>';
        }
        $count++;
    endwhile;
    wp_reset_postdata();
    return $out;
}
add_shortcode('blog_posts', 'blog_posts_shortcode');
// Featured Box
function featured_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['small_description'])){
        $small_description = $atts['small_description'];
    } else {
        $small_description = '';
    }
    if(!empty($atts['btn_txt'])){
        $btn_txt = $atts['btn_txt'];
    } else {
        $btn_txt = '';
    }
    if(!empty($atts['btn_link'])){
        $btn_link = $atts['btn_link'];
    } else {
        $btn_link = '';
    }
    $out = '';
    $out .= '<div class="book-overlay">';
    if(!empty($heading)){
        $out .= '<h3>ENJOY YOUR VACATION WITH US</h3>';
    } if(!empty($small_description)){
        $out .= '<p>'.$small_description.'</p>';
    } if(!empty($btn_txt)){
        $out .= '<a href="'.$btn_link.'" class="btn hvr-shutter-out-horizontal">'.$btn_txt.'</a>';
    }
    $out .= '</div>';
    return $out;
}
add_shortcode('featured_box', 'featured_box_shortcode');
// Theme Title With Border Shortcode
function theme_title_border_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_alignment'])){
        $txt_alignment = $atts['txt_alignment'];
    } else {
        $txt_alignment = 'text-center';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    
 $out = '';

    $out .= '<div class="why_choose_us_area">';
    $out = '<div class="container">';
    $out = '<div class="row">';
     $out .= '<div class="col-md-4 col-sm-6">';
    $out = '<div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms"">';
   
     
    $out .= '<h3 '.$style.' '.$txt_alignment.'>'.$heading.'</h3>';
    
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
          $out .= '</div>';
        $out .= '</div>';
    return $out;
}
add_shortcode('theme_title_border', 'theme_title_border_shortcode');