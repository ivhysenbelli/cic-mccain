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
<?php  
date_default_timezone_set('Europe/Rome');

$openMiday = "12:00:00";
$closeMiday = "15:00:00";
$openNoon = "19:00:00";
$closeNoon = "22:30:00";
$now = strtotime(date("H:i:s"));

if ($now >= strtotime($openMiday) && $now <= strtotime($closeMiday) || $now >= strtotime($openNoon) && $now <= strtotime($closeNoon)) {
  $order = get_field('cta_text'); 
}
else{
        $order = "Pre-ordina";
}

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
                                        <a class="button" href="<?php the_field('cta_link'); ?>"><?php echo $order ?></a>
                                    </div>    
                                </div>
                                
                            </div>
                        </div>
                    </section>

                    <section class="description d-flex align-items-center just-content-center">
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <div class="data">
                                    <h2><?php the_field('description_title') ?></h2>
                                    <p><?php the_field('description_text'); ?></p>
                                </div>
                                <?php if(have_rows('description_images')): ?>
                                    <div class="data-images">
                                        <?php while(have_rows('description_images')): the_row(); ?>
                                            <div class="single-image">
                                                <?php $singleImage = get_sub_field('image'); ?>
                                                <img src="<?php echo $singleImage['url']; ?>" alt="">
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </section>

                    <section class="two-columns">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $firstColumnImage = get_field('column_i_image'); ?>
                                <div class="image-col" style="background-image: url('<?php echo $firstColumnImage['url'] ?>')">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-col">
                                    <div class="data">
                                        <h2><?php the_field('section_i_title') ?></h2>
                                        <p><?php the_field('column_i_text') ?></p>
                                    </div>
                                                                        <div class="buttons">
                                        <a class="button" href="<?php the_field('cta_link'); ?>"><?php echo $order ?></a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                    </section>

                    <section class="two-columns">
                        <div class="row row-reverse">
                            <div class="col-md-6">
                                <?php $secondColumnImage = get_field('column_ii_image'); ?>
                                <div class="image-col" style="background-image: url('<?php echo $secondColumnImage['url'] ?>')">
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-col">
                                    <div class="data">
                                        <h2><?php the_field('section_ii_title') ?></h2>
                                        <p><?php the_field('column_ii_text') ?></p>
                                    </div>
                                                                        <div class="buttons">
                                        <a class="button" href="<?php the_field('cta_link'); ?>"><?php echo $order ?></a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                    </section>
                </main><!-- #main -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
