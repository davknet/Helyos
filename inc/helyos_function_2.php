<?php 


function helyos_define_product_type_taxonomy()
{
    $labels = array(
    'name' => _x( 'Sales', 'helyos' ),
    'singular_name' => _x( 'Sale', 'helyos' ),
    'search_items' =>  __( 'Search Sales' , 'helyos' ),
    'all_items' => __( 'All Sales' , 'helyos' ),
    'parent_item' => __( 'Parent Sale' ),
    'parent_item_colon' => __( 'Parent Sale:' ),
    'edit_item' => __( 'Edit Sale' ), 
    'update_item' => __( 'Update Sale' ),
    'add_new_item' => __( 'Add New Sale' ),
    'new_item_name' => __( 'New Sale Name' ),
    'menu_name' => __( 'Sales' )
  );    
 
// Now register the taxonomy
 
  register_taxonomy('sales',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'sales' ),
     'show_in_rest'          => true,
    'rest_base'             => 'Sales',
    'rest_controller_class' => 'WP_REST_Terms_Controller'
  ));


$labels = array(
    'name' => _x( 'Benefits', 'helyos' ),
    'singular_name' => _x( 'Benefit', 'helyos' ),
    'search_items' =>  __( 'Search Benefits' , 'helyos' ),
    'all_items' => __( 'All Benefits' , 'helyos' ),
    'parent_item' => __( 'Parent Benefits' ),
    'parent_item_colon' => __( 'Parent Benefits:' ),
    'edit_item' => __( 'Edit Benefit' ), 
    'update_item' => __( 'Update Benefit' ),
    'add_new_item' => __( 'Add New Benefit' ),
    'new_item_name' => __( 'New Benefit Name' ),
    'menu_name' => __( 'Benefit' )
  );    
 
// Now register the taxonomy
 
  register_taxonomy('Benefits',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Benefits' ),
     'show_in_rest'          => true,
    'rest_base'             => 'Benefits',
    'rest_controller_class' => 'WP_REST_Terms_Controller'
  ));


$labels = array(
    'name' => _x( 'Outlets', 'helyos' ),
    'singular_name' => _x( 'Outlet', 'helyos' ),
    'search_items' =>  __( 'Search Outlets' , 'helyos' ),
    'all_items' => __( 'All Outlets' , 'helyos' ),
    'parent_item' => __( 'Parent Outlet' ),
    'parent_item_colon' => __( 'Parent Outlet:' ),
    'edit_item' => __( 'Edit Outlet' ), 
    'update_item' => __( 'Update Outlet' ),
    'add_new_item' => __( 'Add New Outlet' ),
    'new_item_name' => __( 'New Outlet Name' ),
    'menu_name' => __( 'Outlet' )
  );    
 
// Now register the taxonomy
 
  register_taxonomy('Outlets',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Outlets' ),
      'show_in_rest'          => true,
    'rest_base'             => 'outlet',
    'rest_controller_class' => 'WP_REST_Terms_Controller'
  ));



register_taxonomy_for_object_type( 'sales', 'products' )  ;
register_taxonomy_for_object_type( 'Benefits', 'products' )  ;
register_taxonomy_for_object_type( 'Outlets', 'products' )  ;
 
}

add_action('init' , 'helyos_define_product_type_taxonomy');


add_post_type_support( 'products', 'post-formats' );















function helyos_product_post_type_init() {
    $labels = array(
        'name'                  => _x( 'Products', 'General Name  ', 'helyos' ),
        'singular_name'         => _x( 'Product', ' Singular name', 'helyos' ),
        'menu_name'             => _x( 'Products', 'helyos' ),
        'name_admin_bar'        => _x( 'Products', 'Add New on Products', 'helyos' ),
        'add_new'               => __( 'Add New', 'helyos' ),
        'add_new_item'          => __( 'Add New Product', 'helyos' ),
        'new_item'              => __( 'New Product', 'helyos' ),
        'edit_item'             => __( 'Edit Product', 'helyos' ),
        'view_item'             => __( 'View Product', 'helyos' ),
        'all_items'             => __( 'All Products', 'helyos' ),
        'search_items'          => __( 'Search Products', 'helyos' ),
        'parent_item_colon'     => __( 'Parent Product:', 'helyos' ),
        'not_found'             => __( 'No Products found.', 'helyos' ),
        'not_found_in_trash'    => __( 'No Products found in Trash.', 'helyos' ),
        'featured_image'        => _x( 'Product Cover Image', 'Overrides the “Featured Image"', 'helyos' ),
        'set_featured_image'    => _x( 'Set Cover image', 'Overrides the “Set featured image” ', 'helyos' ),
        'remove_featured_image' => _x( 'Remove Cover image', 'Overrides the “Remove featured image”  ', 'helyos' ),
        'use_featured_image'    => _x( 'Use as Cover image', 'Overrides the “Use as featured image”', 'helyos' ),
        'archives'              => _x( 'Product Archives', 'The post type archive label used in nav menus. ',  'helyos' ),
        'insert_into_item'      => _x( 'Insert Into Product', 'helyos' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Product', 'helyos' ),
        'filter_items_list'     => _x( 'Filter Products list', 'helyos' ),
        'items_list_navigation' => _x( 'Products List Navigation',  'helyos' ),
        'items_list'            => _x( 'Products List', 'helyos' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Products Custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-welcome-add-page',
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' , 'excerpt' , 'custom-fields' , 'post-format' ),
      
        'taxonomies'         => array( 'sales' , 'category', 'post_tag'  ),
        'show_in_rest'       => true ,
         'rest_base'          => 'products',
         'rest_controller_class' => 'WP_REST_Posts_Controller'
    );
     
    register_post_type( 'products', $args );
}
add_action( 'init', 'helyos_product_post_type_init' );



function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );



 
/*
add_action( 'template_redirect','redirectUserFromAdminPage', 10 );

 function redirectUserFromAdminPage() {
    if(is_admin() && get_current_user_id() == 2 ) 
    {
     
    }
}*/


add_action( 'admin_init', 'disallowed_admin_pages' );

function disallowed_admin_pages()
{

   global $pagenow;


   echo  ' -----------------------------------------  '.$pagenow . '-------' ; //. $_GET['post_type'] ;
    # Check current admin page.
    if ( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'page' ) {


      if( get_current_user_id() == 2 && is_admin()) 
    {

      echo WP_SITEURL  ;
       wp_redirect( WP_SITEURL );
        exit;
     
    }  

    }



  if ( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'products' ) {


      if( get_current_user_id() == 2 && is_admin()) 
    {

      echo WP_SITEURL  ;
       wp_redirect( WP_SITEURL );
        exit;
     
    }  

    }







     if ( $pagenow == 'index.php'  ) {


      if( get_current_user_id() == 2 && is_admin() ) 
    {

     
       wp_redirect( WP_SITEURL );
        exit;
     
    }

     
       

    }



   if ( $pagenow == 'upload.php'  ) {
      if( get_current_user_id() == 2 && is_admin() ) 
      {

    
       wp_redirect( WP_SITEURL );
        exit;
     
      }
    }




   if ( $pagenow == 'edit.php'  ) {
      if( get_current_user_id() == 2 && is_admin() ) 
      {

      
       wp_redirect( WP_SITEURL );
        exit;
     
      }
    }



   if ( $pagenow == 'tools.php'  ) {
      if( get_current_user_id() == 2 && is_admin() ) 
      {

      
       wp_redirect( WP_SITEURL );
        exit;
     
      }
    }



   if ( $pagenow == 'edit-comments.php'  ) {
      if( get_current_user_id() == 2 && is_admin() ) 
      {

     
       wp_redirect( WP_SITEURL );
        exit;
     
      }
    }



     if ( $pagenow == 'profile.php'  ) {
      if( get_current_user_id() == 2 && is_admin() ) 
      {

     
       wp_redirect( WP_SITEURL );
        exit;
     
      }
    }





}


if ( ! isset( $show_admin_bar ) ) {
    if (  is_user_logged_in() &&  get_current_user_id() == 2  ) {
      $show_admin_bar = false;
    }else {
      $show_admin_bar = _get_admin_bar_pref();
    }
  }


add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && is_admin() && get_current_user_id() == 2  ) {
  show_admin_bar(false);
}
}






function my_theme_rest_route_for_post( $route, $post ) {

    if ( $post->post_type === 'products' ) {
        $route = '/wp-json/v2/products/' . $post->ID;
    }

    return $route;
}
add_filter( 'rest_route_for_post', 'my_theme_rest_route_for_post', 10, 2 );















