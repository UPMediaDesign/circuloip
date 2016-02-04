<?php
/*
Template Name: Focos
*/
?>
<?php get_header(); ?>

<?php get_template_part('searchbar'); ?>

<?php $bgid = get_post_thumbnail_id($post->ID)?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>

<div class="heading-page" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <h2><?php echo $post->post_title; ?></h2>
            </div>
        </div>
    </div>
</div>


<section class="somos">
    <div class="container">
        <div class="row">

            <div class="col-md-12 who-excerpt">
                <p><?php echo $post->post_excerpt; ?></p>
            </div>
            <div class="col-md-12 who-content">
               <div class="row">
                    <?php echo get_the_content(); ?>
               </div>
            </div>

        </div>
    </div>
	
</section>

<?php $quienes = get_field('quienes_somos')?>
    <?php foreach($quienes as $quien):?>
        <section class="bg-orange">
            <div class="container">
                <div class="row">
                <div class="col-md-12 quienes">
                    <p>
                        <?php echo $quien['razon']?>
                    </p>
                </div>
            </div>
            </div>
        </section>
        <div class="quien-bg" style="background-image:url(<?php echo $quien['imagen']?>);"></div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 message">
                        <p>
                            <?php echo $quien['mensaje']?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach?> 

<?php get_footer(); ?>