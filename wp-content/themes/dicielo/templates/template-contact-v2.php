<?php
/*
Template Name: Contact Us Version 2
*/

/* Header */
get_header(); ?>

 <div class="account-page">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<img src="images/image1.png" alt="" style="width:100%;">
			</div>
		
			<div class="col-2">
			
			   
				<div class="form-container">
				
					<?php

					if ( have_posts() ) {

					while ( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/content-cover' );
					}
					}

					?>
					<div class="form-btn">
						<span onclick="login()">Login</span>
						<span onclick="register()">Contact Us</span>
						<hr id="Indicator" style="transform: translateX(100px);">
					</div>
					
					<form id="LoginForm" style="transform: translateX(0px);">
						<input type="text" placeholder="Username">
						<input type="password" placeholder="Password">
						<button type="submit" class="btn">Login</button>
						<a href="#">Forgot Password&gt;</a>
					</form>
					
					<form id="RegForm" style="transform: translateX(0px);">
						<input type="text" placeholder="Username">
						<input type="email" placeholder="Email">
						<input type="password" placeholder="Password">
						<button type="submit" class="btn">Contact Us</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>