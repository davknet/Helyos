<?php 

get_header();








/*

$args  = array( 
    'posts_per_page' => '-1' , 
    'post_type'      => 'Products',
    'tax_query'      =>  array('taxonomy' => 'category' , 'field' => 'slug' , 'terms'  => 'specials');

);



$helyosProducts = new WP_Query($args);


while ($helyosProducts->have_posts()){

    $helyosProducts->the_post();
    ?>
<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
    <?php 
	
}


wp_reset_postdata();
*/


if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Display post content
    endwhile;
endif;


















get_footer();