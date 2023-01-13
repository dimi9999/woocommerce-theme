<?php
/*
Template Name: Homepage
*/

/* Header */
get_header(); ?>

<!-- 1. Homepage Carousel -->
<section class="heroBlock">
	<?php 
		$args = array( 'post_type' => 'hero','order' => 'asc' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

		// get the image url (as the background image)
		$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	?> 
	<div class="row">
		<div class="col-2">
			<h1><?php the_title(); ?></h1>
			<p><?php the_content();?></p>
			<a href="http://dimpa.eu/shop/shop" class="btn">Explore now →</a>
		</div>
		<div class="col-2">
		  <img src="<?php echo $backgroundImg[0]; ?>" alt="Dicielo.eu">
		</div>
	</div>
	<?php endwhile; ?>
</section>
 
<!-- 3. Recent Products -->
<section class="block products">
  <div class="container recent">
    <div class="titleHolder">
      <h2><span>Latest Products</span></h2>
    </div>
    <?php echo do_shortcode('[recent_products]'); ?>
  </div>
</section>

<!-- 2. Product Categories 
< ?php echo do_shortcode('[product_categories columns="3"]'); ? -->
   
<section class="block productCategories">
  <div class="container">
	<div class="titleHolder">
      <h2><span>Pick a category</span></h2>
    </div>
    <div class="row">
      <?php
        $taxonomyName = "product_cat";
        $prod_categories = get_terms($taxonomyName, array(
          'orderby'=> 'name',
          'order' => 'ASC',
          'hide_empty' => 1
        ));  
      
        foreach( $prod_categories as $prod_cat ) :
          if ( $prod_cat->parent != 0 )
            continue;
            $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
            $cat_thumb_url = wp_get_attachment_image_src( $cat_thumb_id, 'thumbnail-size' )[0];
            $term_link = get_term_link( $prod_cat, 'product_cat' );
          ?>
          <div class="col-3">
            <a href="<?php echo $term_link; ?>"> 
              <div class="image" style="background: url('<?php echo $cat_thumb_url; ?>');">
                <h3><?php echo $prod_cat->name; ?></h3>
              </div>
            </a> 
          </div>
        <?php endforeach; 
        wp_reset_query(); 
      ?>
    </div>
  </div>
</section>

<!-- 5. Sales Products -->
<section class="block products">
  <div class="container sales">
    <div class="titleHolder">
      <h2><span>Sales</span></h2>
    </div>
    <?php echo do_shortcode('[sale_products]'); ?>
  </div>
</section>

<!-- 8. Brands Carousel -->
<section class="block brandBlock brands">
  <div class="container">
    <ul>
      <?php 
        $args = array( 'post_type' => 'brands' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
      ?> 	
      <li>
        <?php the_post_thumbnail(); ?>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</section>
 

<!-- 9. Homepage Testimonial -->
<div class="home-testimonial">
    <div class="small-container">
	    <div>
			<h2>What our clients say</h2>
			<i class="fa fa-quote-left"></i>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida lectus ac ipsum mattis, vehicula bibendum urna lobortis. 
			Suspendisse ullamcorper viverra vulputate. Pellentesque ornare tellus id leo vulputate, eget dignissim enim sodales.</p>
			<i class="fa fa-quote-right"></i>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			 
			<h3>San Parker</h3>
		</div>
	</div>
</div>

<?php get_footer(); ?>