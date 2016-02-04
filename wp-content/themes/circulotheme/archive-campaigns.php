<?php get_header(); ?>

<?php get_template_part('searchbar'); ?>

<?php $bgid = get_post_thumbnail_id(278)?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>

<div class="heading-page" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <?php $postt = get_post(278); ?>
                <h2><?php echo $postt->post_title; ?></h2>
            </div>
        </div>
    </div>
</div>

<section class="">
    <div class="container-fluid">
        <div class="row">

        <div class="col-md-12 who-excerpt">
            <p><?php echo $postt->post_excerpt; ?></p>
        </div>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
        <?php $campaigns = get_posts(array('post_type' => 'campaigns' , 'posts_per_page' => 16 , 'paged' => $paged)); ?>
            <?php $countcampaigns = 0 ?>
            <?php foreach ($campaigns as $campaign): ?>
            <?php $countcampaigns++ ?>
            <figure class="testimonio-element col-md-3 col-sm-3 col-xs-6 col-esp" data-toggle="modal" data-target="#modal-v-<?php echo $campaign->ID?>">
               <?php echo get_the_post_thumbnail( $campaign->ID , 'testimonio', array('class' => 'img-responsive')) ?>
              <figcaption class="testimonio-element side">
                <h4><?php echo $campaign->post_title ?></h4>
                <p><?php echo $campaign->post_excerpt ?></p>
                <a data-toggle="modal" data-target="#modal-video" href="">
                    Ver Más
                </a>
              </figcaption>
            </figure>

            <?php endforeach;?>
        
        <?php foreach ($campaigns as $modal):?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-v-<?php echo $modal->ID?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-content">
                    <img src="<?php echo get_field('afiche_campana')?>" alt="" class="img-responsive">
                </div>
              </div>
            </div>
        
        <?php endforeach?>

            <div class="col-md-6 clear separator">
                <?php wp_pagenavi(); ?>
            </div>

        </div>
    </div>
</section>

<section class="testimonial-content">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-6">
               <div class="row">
                <?php $postt = get_post(278); ?>
                   <p><?php echo $postt->post_content; ?></p>
               </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
        <?php $countcampaigns = 0 ?>
        <?php foreach ($campaigns as $script): ?>
         <?php $countcampaigns++ ?>
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