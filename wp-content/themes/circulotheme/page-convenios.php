<?php
/*
Template Name: Convenios
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


<!-- Convenios -->
<section class="page">
    <div class="container convenios ">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                        
                    <?php $convenios= query_posts(array('post_type' => 'convenio' , 'numberposts' => 8, 'paged' => $paged)); ?>

                    <?php $countconvenios = 0 ?>
                    <?php foreach ($convenios as $convenio): ?>
                    <?php $countconvenios++ ?>
                    <figure class="convenio-element col-md-6 col-sm-6 col-xs-12"> 
                        <?php echo get_the_post_thumbnail( $convenio->ID , 'convenios', array('class' => 'img-responsive')) ?>
                        <figcaption class="convenio-element side">
                            
                            <h3>
                            <a href="<?php the_permalink();?>" title="<?php echo $convenio->post_title ?>"  rel="nofollow"><?php echo $convenio->post_title ?></a>
                            </h3>
                            <p><?php echo substr($convenio->post_content , 0, 65)?>...</p>
                            <a href="<?php the_permalink();?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i>
                            </a>
                        </figcaption>
                    </figure>       
                    <?php endforeach?>
                </div>    

                <?php //if (function_exists("pagination")) {
                    //pagination($additional_loop->max_num_pages);
                //} ?>

                <?php //wp_paginate();?>

                <?php echo get_next_posts_link( ); ?>
                <?php echo get_previous_posts_link( ); ?>

        </div>
    </div>
</section>

<section class="bg-titleblue">
 <div class="container instituciones">
     <div class="row">
        <h3><?php echo $post->post_excerpt; ?></h3>
        <p><?php echo get_the_content(); ?></p>
        <?php $instituciones = get_field('convenio_institucion')?>
            <?php foreach($instituciones as $institucion):?>
                <div class="col-md-2 institucion">
                    <a href="<?php echo $institucion['link_convenio']?>">
                        <img src="<?php echo $institucion['logo_convenio']?>" alt="">
                    </a>
                </div>
            <?php endforeach?>
     </div>
 </div>

</section>

<?php get_footer(); ?>