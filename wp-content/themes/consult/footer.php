<?php  if(cs_get_option('footer')!= ''):?>
    <footer class="footer_area" style="background-color: <?php echo cs_get_option('footer_color_bg'); ?>">
        <div class="container">
          
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer_widget">
                        <h4 class="widget_title">Our Headquarters</h4>
                        <div class="footer_widget_content para_default">
                          
                               <?php wp_nav_menu(array(
                 'theme_location' => 'footer3',
                 'menu_class'=>'contact_info',
                  'before_link'=>'<span>'
               
                 
                
                 
                 
                
               
                 
                ));
                ?>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer_widget">
                        <h4 class="widget_title">Company</h4>
                        <div class="footer_widget_content para_default">
                                     <?php wp_nav_menu(array(
                 'theme_location' => 'footer1',
               
                 'container' => '<ul>',

                  'link_before'    => '<span class="my-special-class">',
      'link_after'     => '</span>'
                 
                
               
                 
                ));
                ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer_widget">
                        <h4 class="widget_title">Useful Links</h4>
                        <div class="footer_widget_content para_default">
                         <?php wp_nav_menu(array(
                 'theme_location' => 'footer2',
               
                 'container' => '<ul>',
                 
                
               
                 
                ));
                ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <div class="footer_widget_content para_default">
                              <?php  $posts = new WP_Query( array( 'post_type' => 'newsletter' , 'order' => 'ASC','post_per_page' =>'-1') );
while($posts->have_posts()) : $posts->the_post();?>
                <p><?php the_content();?></p>
                
            <?php endwhile ;?>
                            <div class="Newsletter_mail_search">
                                <form action="#" method="post">
                                  <?php echo do_shortcode( '[contact-form-7 id="248" title="quote"]' );?>
                                </form>
                            </div>
                            <ul class="footer_social_icon">
                       
               <?php // dynamic_sidebar( 'sidebar-1' ); ?></p>


                                <li>
                                    <a href="<?php  echo esc_attr(get_option( 'twitter_field' )); ?> "><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="<?php  echo esc_attr(get_option( 'facebook_field' )); ?> "><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?php  echo esc_attr(get_option( 'pinterest_field' )); ?> "><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li>
                                    <a href="<?php  echo esc_attr(get_option( 'pinterest_field' )); ?>"><i class="fa fa-vimeo"></i></a>
                                </li>
                                <li>
                                    <a href="<?php  echo esc_attr(get_option( 'instagram_field' )); ?> "><i class="fa fa-instagram"></i></a>
                                </li>
                            
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php endif;?>




        <?php 
        if(cs_get_option('footer1')!= ''):?>
            <?php $menu1=cs_get_option('select_footer');
   if( $menu1 === 'footer_menu_1'){ ?>
        <div class="footer_bottom text-center" style="background-color: <?php echo cs_get_option('bottom_footer_color_bg'); ?>">
            <div class="container">

     <p style="color: <?php echo cs_get_option('bottom_footer_color_text'); ?>">  <?php  echo esc_attr(get_option( 'footer_field' )); ?> </p>
      <p>  <?php  echo esc_attr(get_option( 'logo' )); ?> </p>
              
          
            </div>
            <?php }
        else { ?>

             <div class="footer_bottom text-left" style="background-color: <?php echo cs_get_option('bottom_footer_color_bg1'); ?>">
            <div class="container">

     <p style="color: <?php echo cs_get_option('bottom_footer_color_text1'); ?>">  <?php  echo esc_attr(get_option( 'footer_field' )); ?> </p>
      <p>  <?php  echo esc_attr(get_option( 'logo' )); ?> </p>
              
          
            </div>
        </div>
        </div>
    </footer>
<?php }?>
<?php endif;?>


	<?php wp_footer();?>
</body>
</html>