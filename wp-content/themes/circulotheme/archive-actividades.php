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

<section class="actividades">
    <div class="container">
        <div class="row">
                    <?php $actividades = get_posts(array('post_type' => 'actividades', 'numberposts' => 10 , 'post__not_in')) ?>
                    <?php $countactividades = 0?>
                    <?php foreach($actividades as $actividad):?>
                    <?php $countactividades++?>
                    
                    <?php if($countactividades == 1 || $countactividades == 2)
                        {
                            $actsize = 'actidestacado';
                            $actclass = 'principales col-md-6';
                            $actsocial = 'soc-visible';
                            $actcolimg = 'heading col-md-12 col-sm-12 col-xs-12';
                            $actcolcaption = 'col-md-12 col-sm-12 col-xs-12';
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
                            <a class="<?php echo $actcolimg ?>" href="<?php echo get_permalink($actividad->ID)?>"><?php echo get_the_post_thumbnail($actividad->ID , $actsize , array('class' => 'img-responsive'))?></a>
                            <figcaption class="<?php echo $actcolcaption ?>">
                                <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                                <p><?php echo substr($actividad->post_content , 0, 65)?>...</p>
                                
                                <a class="vermas" href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>

                                <ul class="<?php echo $actsocial?>">
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin"></i></a></li>
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://twitter.com/share?text=<?php echo get_bloginfo('name')?>&nbsp;-&nbsp;<?php echo $post->post_title?>"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                                <div class="separator"></div>
                            </figcaption>
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