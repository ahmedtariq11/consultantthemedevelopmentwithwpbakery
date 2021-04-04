<?php

function consult_section_1($attr){
	

	
	
	extract(
	shortcode_atts(array(
		'title_sec_1' => 'Eta ekta value',
		'title_sec_desc_1' => 'Eta ekta Description',
		'title_sec_desc_1_color' => '',
		'title_sec_1_image' => '',
	
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	    <div class="looking_for_specific_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="looking_for_left para_default">
                        <h3><?php echo esc_html($title_sec_1);?></h3>
                        <p style="color:<?php echo esc_html($title_sec_desc_1_color);?>"><?php echo esc_html($title_sec_desc_1);?> </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="looking_for_right image_fulwidth wow fadeInRight" data-wow-delay="300ms">

						
						<?php
						$sce1_image =wp_get_attachment_image_src($title_sec_1_image,'full');
						
						if($sce1_image){?>
							
						
							 <img src="<?php echo esc_url($sce1_image[0]);?>">
							
						<?php }
						
						?>
						
						
						
                    </div>
					
                </div>
            </div><!--row -->
        </div><!--container -->
    </div><!--looking_for_specific_area -->
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_1_base','consult_section_1');

function bwewe($attr){

	extract(
	shortcode_atts(array(

	'fields_7'=>'',
	'fields_5'=>'',
	'fields_6'=>'',
	
	
	),$attr)
	);
	
	
	ob_start();
	?>
 
	<div class="why_choose_us_area">
        <div class="container">
            <div class="row">


    <?php 
    $grp_Sec1=cs_get_option('fields_group_1');
    if($grp_Sec1){
    foreach($grp_Sec1 as $grp_Sec1){?>

    
                <div class="col-md-4 col-sm-6">
                    <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
                       
                      <img src="<?php echo   wp_get_attachment_image_src($grp_Sec1['fields_7'],'full')[0];?>">
                       
                          <h3><?php echo esc_html($grp_Sec1['fields_5']);?></h3>
                        <p><?php echo esc_html($grp_Sec1['fields_6']);?></p>
                    </div>
                </div><!--col-md-4 -->

               <?php 
           }
       }
           ?>
            </div><!--row -->
        </div><!--container-fluid -->
    </div><!--about_section_area -->
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_11_base','bwewe');




function bwewe1($attr){

	extract(
	shortcode_atts(array(

	'fields_7'=>'',
	'fields_5'=>'',
	'fields_6'=>'',
	
	
	),$attr)
	);
	
	
	ob_start();
	?>
 
	<div class="why_choose_us_area">
        <div class="container">
            <div class="row">


    <?php 
    $grp_Sec1=cs_get_option('fields_group_1');
    if($grp_Sec1){
    foreach($grp_Sec1 as $grp_Sec1){?>

    
                <div class="col-md-4 col-sm-6">
                    <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
                       
                      <img src="<?php echo   wp_get_attachment_image_src($grp_Sec1['fields_7'],'full')[0];?>">
                       
                          <h3><?php echo esc_html($grp_Sec1['fields_5']);?></h3>
                        <p><?php echo esc_html($grp_Sec1['fields_6']);?></p>
                    </div>
                </div><!--col-md-4 -->

               <?php 
           }
       }
           ?>
            </div><!--row -->
        </div><!--container-fluid -->
    </div><!--about_section_area -->
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_12_base','bwewe1');




function consult_section_3($attr){
	

	
	
extract(
	shortcode_atts(array(

	'sec_3_grp'=>'',
	'sec_3_icon'=>'',
	'sec_3_title'=>'',
	'sec_3_desc'=>'',
	'sec_3_image'=>'',
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	    <div class="about_section_area">
        <div class="container-fluid">
            <div class="row">
       <?php 

           $sec_3_key =vc_param_group_parse_atts($sec_3_grp);
if($sec_3_key){
		   
		   foreach($sec_3_key as $sec_3_value){?>
			   
			     <div class="col-md-4 col-sm-6">
                    <div class="about_Single_item para_default text-center wow fadeInLeft" data-wow-delay="300ms">  
					
											
						<?php
						$sce3_image =wp_get_attachment_image_src($sec_3_value['sec_3_image'],'full');
						
						if($sce3_image){  ?>
							
						
							 <img src="<?php echo esc_url($sce3_image[0]);?>">
							
						<?php }
						
						?>



			
					
                         
                        <p><?php echo esc_html($sec_3_value['sec_3_title']);?></p>
                        <p><?php echo esc_html($sec_3_value['sec_3_desc']);?></p>
                    </div>
                </div><!--col-md-4 -->
			   
			  
		 
 <?php } } else {        ?>


<?php if(isset($sec_3_value['sec_3_icon'])) : ?>
 	<i class="<?php echo esc_attr($sec_3_value['sec_3_icon']);?>"></i>
					
                         
                        <h3><?php echo esc_html($sec_3_value['sec_3_title']);?></h3>
                        <p><?php echo esc_html($sec_3_value['sec_3_desc']);?></p>
                    </div>
                </div><!--col-md-4 -->
            <?php endif;?>
		 
		 	  <?php }
   ?>




			

				

            </div><!--row -->
        </div><!--container-fluid -->
    </div><!--about_section_area -->

	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_2_base','consult_section_3');



function consult_section_6($attr){
	

	
	
	extract(
	shortcode_atts(array(

	'sec_3_grp1'=>'',
	'sec_3_icon1'=>'',
	'sec_3_title1'=>'',
	'sec_3_desc1'=>'',
	'sec_3_image1'=>'',
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	 <div class="why_choose_us_area">
        <div class="container">
            <div class="row">
       <?php 

           $sec_3_key1 =vc_param_group_parse_atts($sec_3_grp1);
		   
		   foreach($sec_3_key1 as $sec_3_value1){?>
			   
			     <div class="col-md-4 col-sm-6">
			     	
			     	
			     	  <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
											
						<?php
						$sce3_image1 =wp_get_attachment_image_src($sec_3_value1['sec_3_image1'],'full');
						
						if($sce3_image1){?>
							
						
							 <img src="<?php echo esc_url($sce3_image1[0]);?>">
							
						<?php }
						
						?>
					
					
                      
                        <h3><?php echo esc_html($sec_3_value1['sec_3_title1']);?></h3>
                        <p><?php echo esc_html($sec_3_value1['sec_3_desc1']);?></p>
                    </div>
                </div><!--col-md-4 -->
			   
			   
		 <?php  }
		 
		 	   ?>



			

				
				

            </div><!--row -->
        </div><!--container-fluid -->
    </div><!--about_section_area -->

	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_6_base','consult_section_6');




function consult_section_cf($attr,$content=null){
	

	
	
	extract(
	shortcode_atts(array(
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	<div class="contact_page_get_start_area">
        <div class="container">
            <div class="row">
                <div class="make_an_appoinment_area get_start_areA">
                    <div class="col-md-12">
                        <h3 class="title_get_start text-center">Ready to Get Started?</h3>
                    </div>
					
					<?php 
					
					include_once( ABSPATH .'wp-admin/includes/plugin.php');
					
					if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){
						
						echo do_shortcode($content);
					}

					?>
					
					
					
					

					
					
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--contact_page_get_start_area-->
	
	
	
	
		<?php
	return ob_get_clean();
	
}
add_shortcode('section_cf','consult_section_cf');





//Blog



function consult_section_blog($atts,$content=null){
	

	
	
$args = array(
            "number_of_posts"=> "",
			"sec_blog_title"  => "",
			"rm"		=>	'',
		"cols"		=>	'3',
		
			
        );

        $params	= shortcode_atts($args, $atts);
	ob_start();
	
	?>
	
	    <div class="latest_blog_section_area removeBg_latest_blog">
        <div class="container">
		
            <div class="row">
			
				<div  class="item single_blog_item_div para_default text-center">
 <?php if (isset($sec_blog_title) && $sec_blog_title): ?>
					<h2><a><?php echo esc_html($sec_blog_title);?></a></h2>
<?php endif; ?>
				</div>
				
				<?php 
                      $consult_blog_post  =new WP_Query(array(
					  'post_type'=>'post',
					
					  
					  'posts_per_page' => $params['number_of_posts']
					  
					  ));
			  $query = new WP_Query(
            array( 'posts_per_page' => $params['number_of_posts']) 
        );

					  
                     if($consult_blog_post->have_posts()):while($consult_blog_post->have_posts()):$consult_blog_post->the_post();	
					
						 
  $format = get_post_format();

				?>
				
                <div class="col-md-4">
                    <div class="single_blog_h_active">
                        <div class="single_blog_item_area para_default image_fulwidth text-center">
                            <a href="#"><?php the_post_thumbnail();?></a>
                            <h4><?php echo get_the_date('F j Y');?></h4>
                            <h3><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
                            <p><?php// echo wp_trim_words(get_the_content(),15); ?></p>
                              <p>
	                <?php echo the_excerpt(15); ?>
					<br>
	                <a href="<?php the_permalink(); ?>" class="read_more mt10"><i class="fa fa-chevron-right id-color"></i></a>
	            </p>
                        </div>
					</div>
				</div>
				
				<?php endwhile; endif; ?>
				
            </div>
        </div><!-- container-->
    </div><!-- latest_blog_section_area-->

	
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_4_blog','consult_section_blog');




// Lastest Blog
add_shortcode('lastest_blog','lastest_blog_func');
function lastest_blog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'6',
		'rm'		=>	'',
		'cols'		=>	'3',
	), $atts));

	ob_start(); 
?>
  <div class="latest_blog_section_area removeBg_latest_blog">
        <div class="container">
		
            <div class="row">
			

	
	<?php		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $number,
		);
		$blogpost = new WP_Query($args);
		if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();
		$format = get_post_format();
	?>
	
<div class="col-md-4">
                    <div class="single_blog_h_active">
                        <div class="single_blog_item_area para_default image_fulwidth text-center">
                            <a href="#"><?php the_post_thumbnail();?></a>
	            
	       

	       
	            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	            <p>
	                <?php echo the_excerpt(15); ?>
					<br>
	                <a href="<?php the_permalink(); ?>" class="read_more mt10"><i class="fa fa-chevron-right id-color"></i></a>
	            </p>
	        </div>
	    </div>
	    </div>
	

	<?php endwhile; wp_reset_postdata(); endif; ?>
	    </div>
	    </div>
	    </div>

<?php
    return ob_get_clean();
}


function consult_section_portfolio($attr,$content=null){
	

	
	
	extract(
	shortcode_atts(array(
      'sec_portfolio_post_per_page'=>'',
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	<div id="consultancy_masonery" class="portfolio_section_area">
        <div class="container">
		
            <div class="consultancy_masonery_menu">
                <a class="active" data-filter="*"><span class="text">All</span></a>
				
<?php
				
				$terms = get_terms('Portfolio');
				
				foreach($terms as $term ){ ?>
					
					<a data-filter=".<?php echo $term->slug;?>"><span class="text"><?php echo $term->name;?></span></a>
					
					
				<?php }
				
				?>
            </div>

            <div class="consultancy_masonery text-center">
                <div class="consultancy_masonery_container text-center">
                    <div class="consultancy_masonery_sizer"></div>
					
					<?php 
					 $consult_portfolio_post =new WP_Query(
					  array(
					  'post_type'=>'portfolio',
					  'taxonomy'=>'Portfolio',
					  'post_per_page'=>$sec_portfolio_post_per_page,
					  ));
					  
					  if($consult_portfolio_post->have_posts()):while($consult_portfolio_post->have_posts()):$consult_portfolio_post->the_post();
					  ?>
					  
					  <?php
					  

					       $portfolio_var = get_post_meta(get_the_ID(), '_portfolio_setting', true );
                                                
                            $att_ID=get_post_thumbnail_id(get_the_ID());


					  $terms = get_the_terms( get_the_ID(), 'Portfolio' );
                         
						if ( $terms && ! is_wp_error( $terms ) ) : 
						 
							$draught_links = array();
						 
							foreach ( $terms as $term ) {
								$draught_links[] = $term->slug;
							}
												 
							$on_draught = join( " ", $draught_links );
											  
					
					 ?>

					
                    <div class="consultancy_masonery_item consultancy_masonery_item--<?php echo $portfolio_var['port_image_size'];?> <?php echo $on_draught; ?>">
                        <a href="<?php echo esc_url(wp_get_attachment_url($att_ID)); ?>">
						
                            <?php the_post_thumbnail();?>
							
                        </a>
                    </div><!-- consultancy_masonery_item -->
					
					<?php endif; ?>
					
					<?php endwhile; endif; ?>
					
					
                    

                </div><!--.consultancy_masonery_container-->
            </div><!--.portfolio2-->
        </div><!--#portfolio2-->
    </div><!--#portfolio2-->
	   
	
	
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_5_portfolio','consult_section_portfolio');





// Icon box
add_shortcode('servicesbox', 'servicesbox_func');
function servicesbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'num'		=>	'',
		'title'		=>	'',	
		'light'		=>	'',
		'style'		=>	'icon',
	), $atts));
	ob_start(); ?>

	 <div class="why_choose_us_area">
        <div class="container">
            <div class="row">

	<?php if($style == 'icon') { ?>


			     <div class="col-md-4 col-sm-6">
			     	
			     	
			     	  <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
											
	
       
        	<i class="<?php echo esc_attr($icon); ?>"></i>
       
        <div class="text">
            <h3><?php echo htmlspecialchars_decode($title); ?></h3>
            <?php echo htmlspecialchars_decode($content); ?>
        </div>
    </div>
</div>
    <?php }else{ ?>
   
			     <div class="col-md-4 col-sm-6">
			     	
			     	
			     	  <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
            <?php echo esc_html($num); ?>
           
                <h3><?php echo htmlspecialchars_decode($title); ?></h3>
                <?php echo htmlspecialchars_decode($content); ?>
           
        </div>
    </div>	
    <?php } ?>
</div>
</div>
</div>

<?php
    return ob_get_clean();
}


?>