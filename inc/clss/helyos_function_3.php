<?php 



add_action( 'rest_api_init', function () {
  register_rest_route( 'helyos', "/products", array(
    'methods' => 'POST',
    'callback' => 'getProductsByForUserByProdId',
  ) );
} );


function getProductsByForUserByProdId($data)
{
     $user_email  = $data['email'] ;
     $user_pass   = $data['password'] ;
     $category     = $data['category']  ;
    
    
     

     if( empty($user_email) || $user_email == null || empty($user_pass ) || $user_pass  == null ||
      empty( $category  ) ||  $category  == null )
     {
     	$message = "all data  is mandatory 'email:password:product_id' " ;

      

      
        return new WP_REST_Response(array('error' => $message), 400);

     }
     
     $user = get_user_by_email($user_email) ;
     //$wp_hasher = new PasswordHash(8, TRUE); 
    
     if(!wp_check_password(   $user_pass  ,  $user->user_pass, $user->ID   ))
     {
     	$message = "not authenticate user " ;

        return new WP_REST_Response(array('error' => $message), 400);
     }
    $user = null ;







    $resultdata = getAllProductsByCategoryName(  $category  ) ;
    

   


    
       $bin = new WP_REST_Response($resultdata);
       $bin->set_status(200);

        return ['products' => $bin ];



}

 
  

function getAllProductsByCategoryName($category)
{
	global $wpdb ;
	$sql ="SELECT VP.post_title , VP.post_content , VP.guid , PS.meta_value AS price  FROM helyos_product_view VP 
LEFT JOIN wp_terms TR ON( TR.name LIKE %s ) 
LEFT JOIN wp_term_taxonomy TX ON(TR.term_id = TX.term_taxonomy_id )
LEFT JOIN wp_postmeta PS ON(PS.post_id  = VP.ID AND PS.meta_key = 'price' )
WHERE VP.ID IN( SELECT TXR.object_id FROM wp_term_relationships TXR WHERE TXR.term_taxonomy_id = TX.term_taxonomy_id )";

$query = $wpdb->prepare($sql ,$category ) ;
$result = $wpdb->get_results($query);
return $result ;
}






