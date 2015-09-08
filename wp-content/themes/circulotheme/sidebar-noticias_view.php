<div class="col-md-4 sidebar-news">
    <!-- Actividades -->
    <h4 class="actividades">Actividades </h4>
    <div class="row">
        <?php $actividades = get_posts(array('post_type' => 'actividades', 'numberposts' => 4 , 'post__not_in')) ?>
        <?php $countactividades = 0?>
        <?php foreach($actividades as $actividad):?>
        <?php $countactividades++?>
                    
        <?php if($countactividades == 1){?>
            <figure class="principal col-md-12 col-sm-12">
                <a class="heading" href="<?php echo get_permalink($actividad->ID)?>"><?php echo get_the_post_thumbnail($actividad->ID , 'homesocial' , array('class' => 'img-responsive'))?></a>
                <figcaption>
                    <span>
                        <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                    </span>
                    <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                    <p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo get_field('sede',$post->ID); ?></p>
                    <a href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                    <div class="clear"></div>
                </figcaption>
            </figure>

            <?php }else{?>
            <figure class="principal col-md-12 col-sm-12">
                <figcaption>
                    <span>
                        <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                    </span>
                    <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                    <p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo get_field('sede',$post->ID); ?></p>
                    <a href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver info <i class="fa fa-arrow-right"></i></a>
                    <div class="clear"></div>
                </figcaption>
            </figure>
            <?php }?>
                    
        <?php endforeach;?>  
    </div>

    <div class="clear separator"></div>

    <!-- Banner -->
    <div class="row banner">
        <div class="col-md-12 col-sm12">
            <?php $banners = get_field('banner-bolsa'); ?>
            <?php foreach($banners as $banner):?>
            <?php echo $banner()?>
            <?php endforeach ?>
            <a href=""></a>
        </div>
    </div>
        
    <!-- Vida Social -->
    <h4 class="vida-social">Vida Social</h4>  

    <div class="row">
        <?php $sociales = get_posts(array('post_type' => 'vida-social', 'numberposts' => 4 )); ?>
        <?php $countsociales = 0?>
        <?php foreach($sociales as $social):?>
        <?php $countsociales++?>
              
        <?php if($countsociales == 1){?>            
            <figure class="principal col-md-12 col-sm-12">
                <a class="heading" href="<?php echo get_permalink($social->ID)?>"><?php echo get_the_post_thumbnail($social->ID , 'homesocial' , array('class' => 'img-responsive'))?></a>
                <figcaption class="transparent">
                    <h4><a href="<?php echo get_permalink($social->ID)?>" ><?php echo $social->post_title?></a></h4>
                    <span>
                        <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                    </span>
                    <a class="vermas" href="<?php echo get_permalink($social->ID)?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                    <div class="clear"></div>
                </figcaption>
            </figure>

            <?php }else{?>
            <figure class="principal col-md-12 col-sm-12">
                <figcaption class="transparent">
                    <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                    <span>
                        <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                    </span>
                    <a href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver info <i class="fa fa-arrow-right"></i></a>
                    <div class="clear"></div>
                </figcaption>
            </figure>
            <?php }?>

        <?php endforeach;?>                     
    </div>

    
</div>