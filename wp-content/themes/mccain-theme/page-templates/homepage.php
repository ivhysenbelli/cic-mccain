<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>




<div id="full-width-page-wrapper">
    <div class="container-fluid" id="content">
                <main class="site-main" id="main" role="main">
                    <?php $imageBanner = get_field('banner_image'); ?>
                    <section class="main-banner" style="background-image: url('<?php echo $imageBanner['url']; ?>');">
                        <div class="overlay"></div>
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="data">
                                    <h1><?php the_field('banner_title') ?></h1>
                                    <p><?php the_field('banner_description') ?></p>
                                    <div class="buttons">
                                        <a class="button" href="<?php the_field('cta_link'); ?>"><?php the_field('cta_text') ?></a>
                                    </div>    
                                </div>
                                
                            </div>
                        </div>
                    </section>

                    <section class="description">
                        
                    </section>

                    <section class="two-columns">
                        
                    </section>

                    <section class="two-columns row-reverse">
                        
                    </section>

                </main><!-- #main -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
