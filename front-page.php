<?php 

get_header();


$args  = array( 'posts_per_page' => '-1' ,  'post_type' => 'Products');

$helyosProducts = new WP_Query($args);?>



<div class="row">


  <?php while ($helyosProducts->have_posts()): $helyosProducts->the_post();
    $imag_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    $price    = get_post_meta(get_the_ID() , 'price');
    $price    = isset($price[0])?$price[0] : 'no price' ;
    $discount = get_post_meta(get_the_ID() , 'discount');
    $discount =  isset($discount[0])? $discount[0]:'' ;
    $the_price = empty($discount)?$price .' $' : '<s>'.$price .' $ </s> ' .' <span>' .$discount .'$</span>' ;
    ?>

   <div class="card" style="width: 18rem;">

   <img src="<?php echo  esc_url( $imag_url) ;?>" class="card-img-top" alt="...">
  
    <div class="card-body">
           <h5 class="card-title"> <?php  the_title(); ?></h5>

           <p class="card-text"> <?php  echo trim(excerpt(15)); ?></p> 
           <p class="card-text" > price : <?php echo  $the_price  ;  ?> </p>
            <a href="<?php the_permalink(); ?>">More</a>
     </div>
   </div>

  <?php endwhile ; ?>
 

</div>








<?php 




wp_reset_postdata();















get_footer();