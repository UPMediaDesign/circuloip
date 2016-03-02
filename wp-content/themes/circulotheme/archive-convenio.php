<?php get_header(); ?>

<?php get_template_part('searchbar'); ?>

<?php $bgid = get_post_thumbnail_id(165)?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>

<div class="heading-page" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <?php $postt = get_post(165); ?>
                <h2><?php echo $postt->post_title; ?></h2>
            </div>
        </div>
    </div>
</div>


<!-- Convenios -->
<section class="page">
    <div class="container convenios">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php $countconvenios = 0 ?>
                    <?php foreach ($posts as $convenio): ?>
                    <?php $countconvenios++ ?>
                    <figure class="convenio-element col-md-6 col-sm-6 col-xs-12"> 
                        <?php echo get_the_post_thumbnail( $convenio->ID , 'convenios', array('class' => 'img-responsive col-xs-4 col-esp')) ?>
                        <figcaption class="convenio-element side col-xs-8 col-esp">
                            <h3>
                            <a href="<?php echo get_permalink($convenio->ID);?>" title="<?php echo $convenio->post_title ?>"  rel="nofollow"><?php echo $convenio->post_title ?></a>
                            </h3>
                            <p><?php echo substr($convenio->post_excerpt , 0, 50)?>...</p>
                            <div></div>
                            <a href="<?php echo get_permalink($convenio->ID);?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i>
                            </a>
                        </figcaption>
                        <div class="clear miniseparator"></div> 
                    </figure>    

                    <?php endforeach?>
                </div> 
            </div>    
            <div class="col-md-6 clear separator">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-titleblue">
 <div class="container instituciones">
     <div class="row">
        <?php $postc = get_post(165); ?>
        <h3><?php echo $postc->post_excerpt; ?></h3>
        <p><?php echo $postc->post_content; ?></p>
        <?php $instituciones = get_field('convenio_institucion' , 165)?>
            <?php foreach($instituciones as $institucion):?>
                <div class="col-md-2 col-xs-6 institucion">
                    <a href="<?php echo $institucion['link_convenio']?>">
                        <img src="<?php echo $institucion['logo_convenio']?>" alt="">
                    </a>
                </div>
            <?php endforeach?>
     </div>
 </div>

</section>

<?php get_footer(); ?>