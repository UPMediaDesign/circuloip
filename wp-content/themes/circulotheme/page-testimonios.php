<?php
/*
Template Name: Testimonios
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

<section class="testimonial-excerpt">
    <div class="container">
        <div class="row">

            <div class="col-md-12 testimonial-excerpt">
                <p><?php echo $post->post_excerpt; ?></p>
            </div>

        </div>
    </div>
</section>

<section class="">
	<div class="container-fluid">
        <div class="row">

		<?php $testimonios = get_posts(array('post_type' => 'testimonio' , 'numberposts' => 16)); ?>
	        <?php $counttestimonios = 0 ?>
	        <?php foreach ($testimonios as $testimonio): ?>
            <?php $counttestimonios++ ?>
            <figure class="testimonio-element col-md-3 col-sm-3 col-xs-6 col-esp" data-toggle="modal" data-target="#modal-v-<?php echo $testimonio->ID?>">
               <?php echo get_the_post_thumbnail( $testimonio->ID , 'testimonios', array('class' => 'img-responsive')) ?>
              <figcaption class="testimonio-element side">
              	<h4><?php echo $testimonio->post_title ?></h4>
                <p><?php echo $testimonio->post_excerpt ?></p>
                <a data-toggle="modal" data-target="#modal-video" href="">
                	Ver Más
                </a>
              </figcaption>
            </figure>

            <?php endforeach;?>

        <?php foreach ($testimonios as $modal):?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-v-<?php echo $modal->ID?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-content embed-responsive embed-responsive-16by9" id="yt-player">
                  <iframe width="560" height="560" class="embed-responsive-item player" src="https://www.youtube.com/embed/<?php echo get_field('embed_video_testimonio' , $modal->ID)?>?rel=0&showinfo=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
        
    	<?php endforeach ?>

        <div class="pagination">
        	    <?php if (function_exists("pagination")) {
                    pagination($additional_loop->max_num_pages);
                } ?>    
        </div>

        </div>
    </div>
</section>

<section class="testimonial-content">
	<div class="container">
        <div class="row">

	        <div class="col-md-6 col-md-offset-6">
               <div class="row">
                   <p><?php echo get_the_content(); ?></p>
               </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>

        <?php foreach ($testimonios as $script): ?>
            <script>
                jQuery(document).ready(function($) {
                jQuery('#modal-v-<?php echo $script->ID?> .close').on('click', function() {
                    //$('#popup-youtube-player').stopVideo();
                  jQuery('#modal-v-<?php echo $script->ID?> .player')[0].contentWindow.postMessage('{"event":"command","func":"' +'stopVideo' + '","args":""}', '*');    
                });
                jQuery('#modal-v-<?php echo $script->ID?>').on('click', function() {
                    //$('#popup-youtube-player').stopVideo();
                  jQuery('#modal-v-<?php echo $script->ID?> .player')[0].contentWindow.postMessage('{"event":"command","func":"' +'stopVideo' + '","args":""}', '*');    
                });
                });
            </script> 

        <?php endforeach ?>