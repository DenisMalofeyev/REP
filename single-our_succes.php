<?php
/*
Template Name: New Template
*/

get_header(); ?>

<div id="primary">
	<div id="content" role="main">
	<?php query_posts(array('post_type'=>'our_success')); ?>
	<?php $mypost = array( 'post_type' => 'our_success' );
	$loop = new WP_Query( $mypost ); ?>
	<!-- Cycle through all posts -->
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">

				<!-- Display featured image in right-aligned floating div -->
				<div style="float:top; margin: 10px">
					<?php the_post_thumbnail( array(100,100) ); ?>
				</div>

				<!-- Display Title and Author Name -->
				<strong> <?php the_title(); ?></strong><br />
				

				

			</header>

			<!-- Display movie review contents -->
			<div class="entry-content"><?php the_content(); ?></div>

		</article>

		<hr/>
	<?php endwhile; ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
