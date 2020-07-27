<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

                <div class="row">
                    <div class="col-12">
                        <div class="legal-elem">
                            <a href="/legal-discalimer">Legal Disclaimer</a>
                        </div>
                        <div class="social-links">
                            <div class="links">
                                <?php while(have_rows('social_links','options')) : the_row(); ?>
                                    <a href="<?php the_sub_field('social_link','options') ?>"><i class="fa fa-<?php the_sub_field('social_icon','options') ?>"></i></a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        
                    </div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

