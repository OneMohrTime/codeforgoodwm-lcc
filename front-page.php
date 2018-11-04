<?php
get_header(); ?>

    <div class="container-fluid">
	<div class="row">
		<?php echo do_shortcode('[metaslider id="233"]'); ?>
	</div>
    <div class="row hero-text" style="padding: 60px;">
		<div class="col text-center">
			<h4 style="max-width: 800px; display: inline-block;">
				<?php 

				$banner = get_field('banner');
				echo $banner['tagline']; 
				?>
			</h4>
		</div>
    </div>
    </div>

	<div class="container-fluid mt-3 mb-3">
		<div class="row">
			<div class="col-md-6 p-3">
				<?php 
				$intro = get_field('intro'); ?>
				<h1 style="padding: 10px;">
					<?php echo $intro['title']; ?>
				</h1>
				<h5 style="font-weight: normal; padding: 10px;">
					<?php echo $intro['content']; ?>
				</h5>
			</div>
			<div class="col-md-6">
				<?php 
				$featured_card = get_field('featured_card'); ?>
				<div class="card orange">
					<img class="card-img-top img-responsive" alt="Card image cap" src="<?php echo $featured_card['image']['url']; ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-8">
								<h2 class="card-text text-uppercase center-block">
									<?php echo $featured_card['content']; ?>
								</h2>
							</div>
							<div class="col-lg-2">
								<p class="text-uppercase center-block">
									<a href="<?php echo $featured_card['button_link']; ?>" class="btn btn-light active font-weight-bold" style="background-color: #fff;"><?php echo $featured_card['button_title']; ?></a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-3 mb-3 p-5 gray">
	<?php if( have_rows('cards') ): ?>

		<div class="card-deck">

		<?php 
        // Initialize the iterator.
		$i = 0;
		while( have_rows('cards') ): the_row(); 

			// vars
			$color = get_sub_field('color');
			$content = get_sub_field('content');
			$button_title = get_sub_field('button_title');
			$button_link = get_sub_field('button_link'); 
			$image = get_sub_field('image');
			?>
				<div class="card <?php echo $color; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="card-img-top img-fluid" style="border:none"/>
					<div class="card-body">
						<?php echo $content; ?>
					</div>
					<div class="card-footer text-center text-uppercase <?php echo $color; ?>">
						<a href="<?php echo $button_link; ?>" class="btn active font-weight-bold">
							<?php echo $button_title; ?>
						</a>
					</div>
				</div>

		<?php 
		// Increment the iterator.
		$i ++;

		if ($i % 2 === 0) {
			// Wrap card deck for small displays on every second card.
			echo '<div class="w-100 d-none d-md-block d-sm-block d-lg-none m-2"></div>';
		}

		endwhile; 
		?>

		</div>

	<?php endif; ?>
	</div>

<?php
get_footer();
