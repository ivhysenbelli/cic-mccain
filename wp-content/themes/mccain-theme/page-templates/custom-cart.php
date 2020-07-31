<?php
/**
 * Template Name: Custom Cart Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="full-width-page-wrapper">

    <div class="container">

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">

                    <section class="description d-flex align-items-center just-content-center">
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                    <div class="data">
                                        <h2><?php the_field('section_title') ?></h2>
                                        <p><?php the_field('section_description'); ?></p>
                                    </div>
                            </div>
                        </div>
                    </section>


                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row end -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
