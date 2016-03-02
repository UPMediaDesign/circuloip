<?php get_header(); ?>

<?php get_template_part('searchbar'); ?>

<?php $bgid = get_post_thumbnail_id(6)?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>

<div class="heading-page" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <?php $postt = get_post(6); ?>
                <h2><?php echo $postt->post_title; ?></h2>
            </div>

        </div>
    </div>
</div>

<section class="selectplace">
    <div class="container">
        <div class="row">

                <div class="col-md-12 col-sm-12">
                    <h2>Búsqueda de artículos</h2>
                    <p>Puedes buscar a través de nuestras sedes y años artículos relacionados a las actividades que Círculo de Egresados IPCHILE dispone para ti.</p>
                </div>
   
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="btn btn-default dropdown-toggle instructor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sede <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php get_bloginfo('url');?>/actividad/?sede=la-serena">La Serena</a></li>
                        <li><a href="<?php get_bloginfo('url');?>/actividad/?sede=republica">República</a></li>
                        <li><a href="<?php get_bloginfo('url');?>/actividad/?sede=san-joaquin">San Joaquín</a></li>
                        <li><a href="<?php get_bloginfo('url');?>/actividad/?sede=rancagua">Rancagua</a></li>
                        <li><a href="<?php get_bloginfo('url');?>/actividad/?sede=temuco">Temuco</a></li>
                    </ul>
                </div>

        </div>
    </div>
</section>

<section class="actividades">
    <div class="container">
        <div class="row">
                    <?php if($_GET['sede']){
                        $posts = get_posts(array(
                            'post_type' => 'actividades', 'meta_query' => array(array('key' => 'sede', 'value' => $_GET['sede'], 'compare' => 'LIKE') ), ) );
                    } ?>

                    <?php $countactividades = 0?>
                    <?php foreach($posts as $actividad):?>
                    <?php $countactividades++?>
                    
                    <?php if($countactividades == 1 || $countactividades == 2)
                        {
                            $actsize = 'actidestacado';
                            $actclass = 'principales col-md-6';
                            $actsocial = 'soc-visible';
                            $actcolimg = 'heading col-md-12 col-sm-12 col-xs-12';
                            $actcolcaption = 'col-md-12 col-sm-12 col-xs-12';
                            $actseparator = '<div style="margin-bottom:30px;"></div>';
                        }

                        else{
                            $actsize = 'actilista';
                            $actclass = 'second col-md-6 col-sm-6 col-xs-12';
                            $actsocial = 'soc-invisible';
                            $actcolimg = 'heading col-md-4 col-sm-12 col-xs-12';
                            $actcolcaption = 'col-md-8 col-sm-12 col-xs-12';                        
                        }

                    ?>
                        <figure class="<?php echo $actclass?>">
                            <div class="act-date">
                                <span class="day"><?php echo the_time('d')?></span>
                                <span class="month"><?php echo the_time('M')?></span>
                            </div>
                            <a class="<?php echo $actcolimg?>" href="<?php echo get_permalink($actividad->ID)?>"><?php echo get_the_post_thumbnail($actividad->ID , $actsize , array('class' => 'img-responsive'))?></a>
                            <figcaption class="<?php echo $actcolcaption ?>">
                                <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                                <p><?php echo substr($actividad->post_content , 0, 65)?>...</p>
                                
                                <?php $ss = get_field('sede', $actividad->ID)?>
                                <?php if($ss == 'la-serena'){
                                    $lugar = 'La Serena';
                                    }
                                elseif($ss == 'republica'){
                                    $lugar = 'República';
                                    }
                                elseif($ss == 'san-joaquin'){
                                    $lugar = 'San Joaquín';
                                    }
                                elseif($ss == 'rancagua'){
                                    $lugar = 'Rancagua';
                                    }
                                elseif($ss == 'temuco'){
                                    $lugar = 'Temuco';
                                    }
                                ?>
                                
                                <section class="asignment">
                                    <a class="vermas" href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                                    <p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo $lugar?>
                                    </p>
                                </section>

                                <ul class="<?php echo $actsocial?>">
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin"></i></a></li>
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://twitter.com/share?text=<?php echo get_bloginfo('name')?>&nbsp;-&nbsp;<?php echo $post->post_title?>"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                                <div class="separator"></div>
                            </figcaption>
                            <?php echo $actseparator?>
                        </figure>

                    
                    <?php endforeach?>                
                    <div class="clear separator"></div>
                    <div class="clear separator"></div>
                    <div class="clear separator"></div>
                    <div class="col-md-6">
                        <?php wp_pagenavi(); ?>
                    </div>            
        </div>
    </div>
</section>

<?php get_footer(); ?>