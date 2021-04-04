























<?php

       //section 1 
  //section 1 
    vc_map(array(
    'name'=>__('First Section','text-donain'),
    'description'=>'This is First Addon',
    'base'=>'section_1_base',
    'category'=>'Consult',
    'icon'=> get_template_directory_uri().'/images/favicon.ico',
    'params'=>array(
    
       array(
       'param_name'=>'title_sec_1',
       'type'=>'textfield',
       'heading'=>'Section One Title ',
       'value'=>'Placeholder',

       ),
          
          
      array(
       'param_name'=>'title_sec_desc_1',
       'type'=>'textarea',
       'heading'=>'Section One Description ',
       'value'=>'Placeholder',

       ),
          
          
      array(
       'param_name'=>'title_sec_desc_1_color',
       'type'=>'colorpicker',
       'heading'=>'Section One Description color ',
       ),
       
       
      array(
       'param_name'=>'title_sec_1_image',
       'type'=>'attach_image',
       'heading'=>'Section One Image ',
       ),
       
    
    ),
    
   ));
    
    
  
 
 vc_map(array(
     'name'=>__('Third Section','text-donain'),
     'description'=>'This is Third Addon',
     'base'=>'section_2_base',
     'category'=>'Consult',
     'icon'=> get_template_directory_uri().'/images/favicon.ico',
     'params'=>array(
     
     array(
     
     'type'=>'param_group',
     'heading'=>'Section 3 Items',
     'param_name'=>'sec_3_grp',
     'params'=>array(
     
         array(
     
         'param_name'=>'icon_image',
         'heading'=>'Section 3 Dropdown',
         'type'=>'dropdown',
         'value'=>array(
           'Select a value'=>'',
           'Icon'=>'fontawesome',
           'Image'=>'custom',
         ),
     
     ),
    
     array(
         'param_name'=>'sec_3_icon',
         'heading'=>'Section 3 Icon',
         'type'=>'iconpicker',
        'dependency' => array(
                'element' => 'icon_image',
                'value' => 'fontawesome',
            ),
 
        ),          

     array(
         'param_name'=>'sec_3_image',
         'heading'=>'Section 3 Image',
         'type'=>'attach_image',
         'dependency'=>array(
           'element'=>'icon_image',
           'value'=>'custom',
         ),
         
     ),  
     
     array(
         'param_name'=>'sec_3_title',
         'heading'=>'Section 3 Title',
         'type'=>'textfield',
         'group'=>'Amit',
         
     ),  
     
     array(
         'param_name'=>'sec_3_desc',
         'heading'=>'Section 3 Description',
         'type'=>'textarea',
         'group'=>'Amit',
         
     ),
     
     
     )
     
     
     ),
     
     

 
     )

 ));
 
 


  //section 3
 
 
 vc_map(array(
    'name'=>__('Service Section','text-donain'),
    'description'=>'This is Fourth Addon',
    'base'=>'section_6_base',
    'category'=>'Consult',
    'icon'=> get_template_directory_uri().'/images/favicon.ico',
    'params'=>array(
    
     array(
    
    'type'=>'param_group',
    'heading'=>'Section 3 Items',
    'param_name'=>'sec_3_grp1',
    'params'=>array(
    
       array(
    
       'param_name'=>'icon_image1',
       'heading'=>'Section 3 Dropdown',
       'type'=>'dropdown',
       'value'=>array(
         'Select a value'=>'',
         'Icon'=>'fontawesome',
         'Image'=>'custom',
       ),
    
    ),
   
    array(
       'param_name'=>'sec_3_icon1',
       'heading'=>'Section 3 Icon',
       'type'=>'iconpicker',
      'dependency' => array(
             'element' => 'icon_image',
            'value' => 'fontawesome',
         ),
 
       ),         

    array(
       'param_name'=>'sec_3_image1',
       'heading'=>'Section 3 Image',
       'type'=>'attach_image',
       'dependency'=>array(
         'element'=>'icon_image',
         'value'=>'custom',
       ),
       
    ),    
    
    array(
       'param_name'=>'sec_3_title1',
       'heading'=>'Section 3 Title',
       'type'=>'textfield',
       'group'=>'Amit',
       
    ),    
    
    array(
       'param_name'=>'sec_3_desc1',
       'heading'=>'Section 3 Description',
       'type'=>'textarea',
       'group'=>'Amit',
       
    ),
    
    
    )
    
    
    ),
    
    

 
    )

 ));
 //Blog Options
 
 
 
 


 vc_map(array(
 'name'=>'Portfolio Section',
 'description'=>'This is Portfolio',
 'base'=>'section_5_portfolio',
 'category'=>'Consult',
 'icon'=> get_template_directory_uri().'/images/favicon.ico',
 'params'=>array(
 
     array(
    'param_name'=>'sec_portfolio_post_per_page',
    'heading'=>'Post Per Page',
    'type'=>'textfield', 
    )

   )
 
 ));
  
 vc_map(array(
 'name'=>'Contact Form 7 Section',
 'description'=>'This is Contact Form 7',
 'base'=>'section_cf',
 'category'=>'Consult',
 'icon'=> get_template_directory_uri().'/images/favicon.ico',
 'params'=>array(
 
     array(
    'param_name'=>'content',
    'heading'=>'Contact Form 7',
    'type'=>'textarea_html', 
    )
 )
 
 ));



 
 vc_map(array(
 'name'=>'Blog Section',
 'description'=>'This is Blog',
 'base'=>'section_4_blog',
 'category'=>'Consult',
 'icon'=> get_template_directory_uri().'/images/favicon.ico',
 'params'=>array(

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Visible", 'consult'),
         "param_name" => "cols",
         "value" => array(                        
                     esc_html__('3 Items', 'consult')   => '3',
                     esc_html__('2 Items', 'consult')   => '2',
                     esc_html__('4 Items', 'consult')   => '4',
                     ),
      ),

       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Text Read More", 'consult'),
         "param_name" => "rm",
         "value" => "",
      ),
 
     array(
     'param_name'=>'sec_blog_title',
     'heading'=>'Latest Title',
     'type'=>'textfield', 
     ),


     array(
                    "type" => "textfield",
                    "heading" => "Number of Posts",
                    "param_name" => "number_of_posts",
                    "admin_label" => true
                ),

   )
 
 ));
   

// Lastest Blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Latest Blog", 'consult'),
   "base" => "lastest_blog",
   "class" => "",
   "category" => 'Consult',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Visible", 'consult'),
         "param_name" => "cols",
         "value" => array(                        
                     esc_html__('3 Items', 'consult')   => '3',
                     esc_html__('2 Items', 'consult')   => '2',
                     esc_html__('4 Items', 'consult')   => '4',
                     ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Posts", 'consult'),
         "param_name" => "number",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Text Read More", 'consult'),
         "param_name" => "rm",
         "value" => "",
      ),
   )));
}


   // Icon box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Icon Box", 'consult'),
   "base" => "servicesbox",
   "class" => "",
   
   "category" => 'Consult',
  
   "params" => array(
      array(
         "type" => "dropdown",
         "heading" => esc_html__('Type Box', 'consult'),
         "param_name" => "style",
         "value" => array(
            esc_html__('Icon', 'consult')     => 'icon', 
            esc_html__('Number', 'consult')   => 'number',
         ), 
      ),  
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'consult'),
         "param_name" => "icon",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => 'icon' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number", 'consult'),
         "param_name" => "num",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => 'number' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'consult'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title of box", 'consult')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'consult'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("content right.", 'consult')
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Light Text", 'consult'),
         "param_name" => "light",
         "value" => "",
      ),   
    )
    ));
}