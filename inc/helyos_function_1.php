<?php 

 require_once( get_stylesheet_directory(). '/inc/helyos_function_2.php' );
 require_once( get_stylesheet_directory(). '/inc/clss/helyos_function_3.php' );

 
function heloys_register_and_enqueue_styles_and_scripts() {
 



wp_enqueue_style( 'helyos-bootstrap-style'  ,  "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" , array() , false , 'all' );
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );


wp_enqueue_style( 'helyos-first-style', get_stylesheet_directory_uri() . '/css/helyos_style_1.css',
 array() , null ,  'all' );

wp_enqueue_script(  'helyos-bootstrap-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"  , '', '', true  );
wp_register_script( 'helyos-first-script-js',  get_stylesheet_directory_uri().'/js/helyos_first_script.js'  , '', null, true );

wp_enqueue_script(  'helyos-first-script-js', );


}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'heloys_register_and_enqueue_styles_and_scripts' );

add_filter( 'wpex_gallery_metabox_post_types', function( $types ) {
    $types[] = 'products';
    return $types;
} );



/******
 * 
 * 
 * 
 * 
 * short code !!!!
 * 
 * 
 * *****/




add_shortcode('special_page' , 'make_spacial_page_for_customers');


 function  make_spacial_page_for_customers($id , $background = null )
 {
    $product_id = $id  ; 
    $bg_color   = ($background != null )? $background : '#fff' ;
    
    global $wpdb ;
    $sql = 'SELECT  p.ID , p.post_title , c.meta_value AS price , ct.meta_value AS imag_id FROM helyos_product_view p LEFT JOIN  wp_postmeta c ON( p.ID = c.post_id and c.meta_key = "price" ) left join wp_postmeta ct on(p.ID = ct.post_id and ct.meta_key = "_thumbnail_id") WHERE id = %s LIMIT 1 ' ;
    $query =  $wpdb->prepare($sql , $id );
    $result = $wpdb->get_row($query);
    $output =  array(
        
        'product_img'   => wp_get_attachment_image_url($result->imag_id , ''),
        'product_title' => $result->post_title ,
        'product_price' =>  $result->price ,
        'backGround'    => $bg_color 
    );

    $output = apply_filters( 'helyos_spacial_page_for_customers',  $output ) ;
 
   return $output  ;

     
 }

