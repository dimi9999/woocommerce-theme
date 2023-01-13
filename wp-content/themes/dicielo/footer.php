<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
			 
			<footer id="footer">
				<div class="container">
					  <div class="footerWidgets">
						<?php 
						/* Footer */
						get_template_part('template-parts/footer-menus-widgets'); ?>
					  </div>
					  <div class="row">
						   <div class="footer-col-1">
								<h3>Download Our App</h3>
								<p>Download App for Android and ios mobile phone.</p>
								<div class="app-logo">
									<img alt="" src="<?php bloginfo('template_directory');?>/assets/images/play-store.png">
									<img alt="" src="<?php bloginfo('template_directory');?>/assets/images/app-store.png">
								</div>
							</div>
							<div class="footer-col-2">
								<img src="<?php bloginfo('template_directory');?>/assets/images/logo-white.png" alt="">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis vehicula ex. 
								Fusce at purus et tellus aliquet egestas. Maecenas eu risus in sapien aliquam dictum quis sed arcu.</p>
							</div>
							<div class="footer-col-3">
								<h3>Useful Links</h3>
								<ul>
									<li><a href="#">Coupons</a></li>
									<li><a href="#">Blog Post</a></li>
									<li><a href="#">Return Policy</a></li>
									<li><a href="#">Join Affiliate</a></li>
								</ul>
							</div>
							<div class="footer-col-4">
								<h3>Follow Us</h3>
								<ul>
									<li><a href="#">Facebook</a></li>
									<li><a href="#">Twitter</a></li>
									<li><a href="#">Instagram</a></li>
									<li><a href="#">Youtube</a></li>
								</ul>
							</div>
						</div>
					 
					<hr>
					<p class="copyright">&copy;
						<?php
						echo date_i18n(
							/* translators: Copyright date format, see https://www.php.net/date */
							_x( 'Y', 'copyright date format', 'twentytwenty' )
						);
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					</p><!-- .footer-copyright -->
					</div>
				</div>
			</footer>
			


		<?php wp_footer(); ?>
		
		<!-- 1.jquery 3 cdn -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<!-- 2.slick js -->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<!-- 3.custom js -->
		<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/main.js"></script>
		
	</body>
</html>
