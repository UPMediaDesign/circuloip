<?php get_header()?>

<?php get_template_part('searchbar'); ?>

<!-- Slider Noticias -->
<section id="slider">
    
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  	<div class="carousel-inner" role="listbox">
    <?php $idds = array();?>
    <?php $count = 0;?>
    <?php foreach($posts as $post):?>
    <?php $count++?>
    <?php if($count <= 5){?>
    <?php $bgid = get_post_thumbnail_id($post->ID)?>
    <?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>
        <div class="item <?php if($count == 1){?>active<?php }?>" style="background-image:url(<?php echo $bg[0]?>);">
            <div class="col-md-7 clr-1 base antiskw">
                <div class="inside col-lg-11 col-md-offset-1 antinskw">
                    <h2 class=""><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h2>
                    <p class="">"<?php echo substr($post->post_content , 0, 90)?>..."</p>
                </div>
            </div>
            <div class="col-md-1 skk desktop"></div>
            <div class="clear"></div>
        </div>
    <?php array_push($idds , $post->ID)?>
	<?php }?>
    <?php endforeach;?>
    
  	</div>
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
 
</div>
    
</section>

<!-- Ofertas Laborales -->
<section class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 offer">
            <h2><img src="<?php bloginfo('template_directory')?>/images/laboraloffer.png" alt="Ofertas Laborales Icono">Ofertas Laborales</h2>
            
            <!-- Ofertas Laborales -->
            <?php $ofertas= get_posts(array('post_type' => 'oferta-laboral', 'numberposts' => 5 , 'trabajos' => 'destacado')); ?>
                <?php $countofertas = 0 ?>
                <?php foreach ($ofertas as $oferta): ?>
                <?php $countofertas++ ?>
                <div class="offer-element">    
                    <span>
                        <strong><?php echo the_time('d') ?></strong>
                        <?php echo the_time('M') ?>
                    </span>
                    <div class="offer-element side">
                        <h3>
                        <a href="<?php echo get_field('link_oferta', $oferta->ID); ?>" title="<?php echo $oferta->post_title ?>" target="_blank" rel="blog"><?php echo $oferta->post_title ?></a>
                        </h3>
                        <p><?php echo get_field('area_oferta',$oferta->ID)?></p>
                        <a href="<?php echo get_field('link_oferta', $oferta->ID); ?>" title="Ver oferta" target="_blank" rel="nofollow">Ver Oferta <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div> 
                <div class="clear separator hide-on-mobile"></div>                        
                <?php endforeach?>
                
                <a class="acc" href="http://www.ipchile.trabajando.com/index.cfm">Ver Ofertas Laborales</a>

        </div>
        <div class="col-md-5 col-md-offset-1 col-sm-6 tips">
            <h2>Tips Laborales <i class="fa fa-circle"></i></h2>

            <!-- Ofertas Laborales -->
            <?php $tips= get_posts(array('post_type' => 'tip-laboral', 'numberposts' => 5)); ?>
                <?php $counttips = 0 ?>
                <?php foreach ($tips as $tip): ?>
                <?php $counttips++ ?>
                <div class="tip-element"> 
                    <div class="tip-element side">
                        <h3>
                        <a href="<?php the_permalink();?>" title="<?php echo $tip->post_title ?>"  rel="nofollow"><?php echo $tip->post_title ?></a>
                        </h3>
                        <p><?php echo substr($tip->post_content , 0, 147)?>...</p>
                        <a href="<?php the_permalink();?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>       
                <?php endforeach?>
                
                <a class="acc" href="<?php echo get_page_link()?>">Ver Ofertas Laborales</a>

        </div>
    </div>
</section>

<!-- Convenios -->
<section class="bg-convenios">
    <div class="container convenios">
        <div class="row">
            <div class="col-md-10">
                <h2><img src="<?php bloginfo('template_directory')?>/images/contract-icon.png" alt="Ofertas Laborales Icono">Convenios</h2>
                <p class="hide-on-mobile">Nunc lacus omari nisi, egestas rutrum magna est id nunc</p>
                <div class="row">
                    <?php $convenios= get_posts(array('post_type' => 'convenio', 'numberposts' => 4)); ?>
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
                <a class="acc" href="<?php echo get_page_link()?>">Ir a Convenios</a>
            </div>
        </div>
    </div>
</section>

<!-- Noticias -->
<section id="noticias">
    <div class="container">
        <div class="row">

            <h3>Noticias</h3>
            <div class="col-md-12">
                <div class="row">
                    
                    <?php $posts = get_posts(array('category' => 'noticias' , 'numberposts' => 6 , 'post__not_in'))?>
                    <?php $count = 0?>
                    <?php foreach($posts as $post):?>
                    <?php $count++?>
                    
                    <?php if($count == 1){?>
                        <figure class="principal col-md-4">
                            <a class="heading" href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'singledestacado' , array('class' => 'img-responsive'))?></a>
                            <figcaption>
                                <h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h4>
                                <div class="clear"></div>
                                <p class="sede"><span class="fa fa-map-marker"></span> <?php echo get_field('sede',$post->ID); ?></p>
                                <a href="<?php echo get_permalink($post->ID)?>" class="morelink">Ver Info <i class="fa fa-arrow-right"></i></a>
                                <div class="clear"></div>
                            </figcaption>
                        </figure>

                            <?php }else{?>
                                <article class="col-md-4">
                                    <div class="secundario noticias">
                                        <h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h4>
                                        <div class="clear"></div>
                                        <p class="sede"><span class="fa fa-map-marker"></span> <?php echo get_field('sede',$post->ID); ?></p>
                                        <a href="<?php echo get_permalink($post->ID)?>" class="morelink">Ver Info <i class="fa fa-arrow-right"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                </article>
                            <?php }?>
                    
                    <?php endforeach;?>                

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Calendario Actividades -->
<section class="actividades">
    <div class="container">
        <div class="row">
            <h3>Calendario Actividades</h3>
            <div class="col-md-12">
                <div class="row">
                     <?php $actividades = get_posts(array('post_type' => 'actividades', 'numberposts' => 8 , 'post__not_in')) ?>
                    <?php $countactividades = 0?>
                    <?php foreach($actividades as $actividad):?>
                    <?php $countactividades++?>
                    
                    <?php if($countactividades == 1){?>
                        <figure class="principal col-md-4">
                            <a class="heading" href="<?php echo get_permalink($actividad->ID)?>"><?php echo get_the_post_thumbnail($actividad->ID , 'homesocial' , array('class' => 'img-responsive'))?></a>
                            <figcaption>
                                <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                                <p><?php echo substr($actividad->post_content , 0, 65)?>...</p>
                                <span>
                                    <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                                </span>
                                <a href="<?php the_permalink();?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                            </figcaption>
                        </figure>

                            <?php }else{?>
                                <article class="col-md-4">
                                    <div class="secundario activity-date line row">
                                        <div class="date col-xs-2">
                                            <span class="day"><?php echo the_time('d')?></span>
                                            <span class="month"><?php echo the_time('M')?></span>
                                        </div>
                                        <div class="col-xs-10">
                                            <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                                            <p><?php echo substr($convenio->post_content , 0, 64)?>...</p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </article>
                            <?php }?>
                    
                    <?php endforeach;?>                

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vida Social -->
<section id="vidasocial">
    <div class="container">
        <div class="row">
            <h3>Vida Social</h3>
            <div class="col-md-12 vidasocial">
                <div class="row">
                    <?php $sociales = get_posts(array('post_type' => 'vida-social', 'numberposts' => 6 )); ?>
                    <?php $countsociales = 0?>
                    <?php foreach($sociales as $social):?>
                    <?php $countsociales++?>
                    
                        <figure class="principal col-md-4">
                            <a href="<?php echo get_permalink($social->ID)?>"><?php echo get_the_post_thumbnail($social->ID , 'homesocial' , array('class' => 'img-responsive'))?></a>
                            <figcaption>
                                <h4><a href="<?php echo get_permalink($social->ID)?>" ><?php echo $social->post_title?></a></h4>
                                <span>
                                    <?php echo the_time('j') ?> de <?php echo the_time('F, Y')?>
                                </span>
                                <a class="vermas" href="<?php the_permalink();?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                            </figcaption>
                        </figure>
                    
                    <?php endforeach;?>                

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>







