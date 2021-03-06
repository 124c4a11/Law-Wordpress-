<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$number = abs( (int)$atts['post_number'] ) ? $atts['post_number'] : 3;
$query = new WP_Query( array(
	'posts_per_page' => $number,
	'ignore_sticky_posts' => true,
) );
?>


<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<div class="col-lg-4 col-md-4">
		<div class="fh5co-blog animate-box">
			<a href="<?php the_permalink(); ?>">
				<?php
					$img_url = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url() : 'https://picsum.photos/800/570';
				?>
				<img class="img-responsive" src="<?php echo $img_url; ?>" alt="<?php the_title(); ?>">
			</a>
			<div class="blog-text">
				<span class="posted_on"><?php echo get_the_date('j M Y'); ?></span>
				<span class="comment"><?php echo get_comments_number(); ?> <i class="icon-speech-bubble"></i></span>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e('Read More', 'law'); ?></a>
			</div>
		</div>
	</div>
<?php endwhile; endif; wp_reset_postdata(); ?>