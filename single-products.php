<?php 

get_header();






?>

<h1>single product</h1>


 <?php  while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_title( '<h1>','</h1>' );  ?>
            <div class="post-thumbnail"><?php the_post_thumbnail(array(250, 250)); ?> </div>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>





<?php 




















get_footer();