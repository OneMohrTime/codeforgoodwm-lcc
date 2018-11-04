<?php
get_header(); ?>

	<div class="row mx-0">
		<?php 
		$banner = get_field('banner'); ?>
		
		<img src="<?php echo $banner['image']['url']; ?>" alt="<?php echo $banner['image']['alt']; ?>" />
		<div class="row text-center hero-text">
			<h4><?php echo $banner['tagline']; ?></h4>
		</div>
	</div>

	<div class="container mt-3 mb-3">
		<div class="col-lg-4">
			<?php 
			$intro = get_field('intro'); ?>
			<h1><?php echo $intro['title']; ?></h1>
			<?php echo $intro['content']; ?>
		</div>
		<div class="col-lg-8">
			<?php 
			$featured_card = get_field('featured_card'); ?>
			<div class="card orange">
				<img class="card-img-top img-responsive" alt="Card image cap" src="<?php echo $featured_card['image']['url']; ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<h2 class="card-text">
								<?php echo $featured_card['content']; ?>
							</h2>
						</div>
						<div class="col-lg-6">
							<p class="text-right">
								<a href="<?php echo $featured_card['button_link']; ?>" class="btn btn-light active"><?php echo $featured_card['button_title']; ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-3 mb-3 p-5 gray">
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
			?>
				<div class="card <?php echo $color; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="card-img-top img-fluid" />
					<div class="card-body">
						<?php echo $content; ?>
					</div>
					<div class="card-footer text-center <?php echo $color; ?>">
						<a href="<?php echo $button_link; ?>" class="btn active">
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
