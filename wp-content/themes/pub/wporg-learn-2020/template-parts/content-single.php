<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPBBP
 */

$slides_url   = wporg_get_slides_url();
$download_url = wporg_get_download_slides_url();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section>
		<header class="row align-middle between section-heading section-heading--with-space">
			<h1 class="section-heading_title h2"><?php the_title(); ?></h1>
		</header>

		<div class="lp-content">
			<div class="lp-content-inner github-markdown">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wporg-learn' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
			<aside class="lp-sidebar">
				<div class="lp-details">
					<ul>
						<?php
						foreach ( wporg_get_custom_taxonomies( get_the_ID() ) as $detail ) {
							if ( ! empty( $detail['values'] ) ) {
								include locate_template( 'template-parts/component-taxonomy-item.php' );
							}
						}
						?>
					</ul>

					<ul class="lp-links">

					<?php if ( $slides_url ) : ?>
						<li>
							<a href="<?php echo esc_url( $slides_url ); ?>" target="_blank"><span class="dashicons dashicons-admin-page"></span> <?php esc_html_e( 'View Lesson Plan Slides', 'wporg-learn' ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( $download_url ) : ?>
						<li>
							<a href="<?php echo esc_url( $download_url ); ?>"><span class="dashicons dashicons-download"></span> <?php esc_html_e( 'Download Lesson Slides', 'wporg-learn' ); ?></a>
						</li>
					<?php endif; ?>
			
						<!-- <li>
							<a href="#" target="_blank"><span class="dashicons dashicons-admin-post"></span> <?php esc_html_e( 'Print Lesson Plan', 'wporg-learn' ); ?></a>
						</li> -->
					</ul>

					<div class="lp-suggestion">
						<h2 class="lp-suggestion_title h4"><?php esc_html_e( 'Suggestions', 'wporg-learn' ); ?></h2>
						<p><?php esc_html_e( 'Found a typo, grammar error,or outdated screenshot?', 'wporg-learn' ); ?></p>
						<p><?php esc_html_e( 'Used this lesson plan in your event and have some suggestions?', 'wporg-learn' ); ?></p>
						<a href="https://wordcampcentral.survey.fm/learn-wordpress-workshop-application"><?php esc_html_e( 'Let us know!', 'wporg-learn' ); ?></a>
					</div>
				</div>
			</aside>
			</div>
	</section>
</article><!-- #post-## -->
