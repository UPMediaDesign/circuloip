<?php get_header('single'); ?>

<?php $bgid = get_post_thumbnail_id()?>
<?php $bg = wp_get_attachment_image_src( $bgid, 'singleenc' ); ?>

<div class="heading-single" style="background-image: url(<?php echo $bg[0]?>);">
    <div class="container-fluid gradient">
        <div class="row">

            <div class="jumbotron">
                <h2><?php echo $post->post_title; ?></h2>
				<p class="single-excerpt"><?php echo substr($post->post_content , 0, 101)?>...</p>
            </div>
        </div>
    </div>
</div>

<article class="single-content">
	<div class="container">
		<div class="row">

			<div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
				<div class="clear separator"></div>
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">Usted esta en:','</p>');
				} ?>
			</div>

			<div class="col-md-1 col-sm-2 col-md-offset-1  date-single col-xs-12">
				<span class="first"><?php echo the_time('j')?> </span><br/>
				<span class="second"><?php echo the_time('M')?></span>
				
				<div class="place">
					<p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo get_field('sede',$post->ID); ?></p>
				</div>

			</div>

			<div class="col-md-8 col-sm-9">
				
				<?php echo apply_filters('the_content' , $post->post_content)?>

				<ul class="nav nav-pills nav-stacked row">

				<?php $gallery = get_field('slide_gallery') ?>
	           	<?php $imgcount = 0?>
	            <?php foreach($gallery as $image):?>
	            	<?php $imgcount++?>
					<li class="col-md-3 col-xs-3"><a data-target="#lightbox" data-toggle="modal" data-slide-to="<?php echo $imgcount?>"><img src="<?php echo $image['sizes']['thumbnail'] ?>" class="img-responsive" alt="..."></a></li>

		       	<?php endforeach;?> 

		       	
			  	<div class="modal fade and carousel slide" id="lightbox">
				    <div class="modal-dialog">
				      <div class="modal-content">
				      	<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    </div>
				        <div class="modal-body">

				          <div class="carousel-inner">
				          	<?php $modalcount = 0 ?>
				          	<?php foreach($gallery as $modal):?>
							<?php $modalcount++?>
				            <div class="item <?php if($modalcount == 1){echo 'active';}?>">

				              <img src="<?php echo $modal['sizes']['modal']?>" class="img-responsive" alt="<?php echo $modal['alt'];?>">
				            </div>
				           	<?php endforeach;?> 
				          </div><!-- /.carousel-inner -->

			          	  <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
				            <span class="glyphicon glyphicon-chevron-left"></span>
				          </a>

				          <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
				            <span class="glyphicon glyphicon-chevron-right"></span>
				          </a>

				         </div><!-- /.modal-body -->
				      </div><!-- /.modal-content -->
				    </div><!-- /.modal-dialog -->
				  </div><!-- /.modal --> 



			   </ul>
			</div>

			<div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2 col-xs-12 share-article">

			    <ul>
			    	<p>Compartir:</p>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin"></i></a></li>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://twitter.com/share?text=<?php echo get_bloginfo('name')?>&nbsp;-&nbsp;<?php echo $post->post_title?>"><i class="fa fa-twitter"></i></a></li>
			    </ul>
			</div>

			<div class="clear separator"></div>

		</div>
	</div>
</article>

<!-- Calendario Actividades -->
<section class="actividades low-list">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            		<h4 class="titled">Artículos Relacionados</h4>

                     <?php $actividades = get_posts(array('post_type' => 'actividades', 'numberposts' => 4 , 'post__not_in')) ?>
                    <?php $countactividades = 0?>
                    <?php foreach($actividades as $actividad):?>
                    <?php $countactividades++?>

                    <figure class="second col-md-6 col-sm-6 col-xs-12">
                            <div class="act-date">
                                <span class="day"><?php echo the_time('d')?></span>
                                <span class="month"><?php echo the_time('M')?></span>
                            </div>
                            <a class="heading col-md-4 col-sm-4 col-xs-12" href="<?php echo get_permalink($actividad->ID)?>"><?php echo get_the_post_thumbnail($actividad->ID , 'actilista' , array('class' => 'img-responsive'))?></a>
                            <figcaption class="second col-md-8 col-sm-8 col-xs-12">
                                <h4><a href="<?php echo get_permalink($actividad->ID)?>" ><?php echo $actividad->post_title?></a></h4>
                                <p><?php echo substr($actividad->post_content , 0, 65)?>...</p>
                                <section class="asignment">
                                    <a class="vermas" href="<?php echo get_permalink($actividad->ID)?>" title="Ver más" rel="blog">Ver más <i class="fa fa-arrow-right"></i></a>
                                </section>
                                <div class="separator"></div>
                            </figcaption>
                    </figure>
                    <?php endforeach;?>                

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
