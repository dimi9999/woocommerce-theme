<?php
/*
Template Name: FAQs
*/

/* Header */
get_header(); ?>


<!-- Frequently Asked Questions -->
<section class="block openclose">
  <div class="container">
    <ul>
      <?php 
        $args = array( 'post_type' => 'faqs' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
      ?> 	
      
        <?php the_title(); ?>
      
      <?php endwhile; ?>
    </ul>
  </div>
</section>

 
<?php get_footer(); ?>