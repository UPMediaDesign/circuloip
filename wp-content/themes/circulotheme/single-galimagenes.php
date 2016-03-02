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
				<span class="first"><?php echo the_time('j') ?> </span><br/>
				<span class="second"><?php echo the_time('M')?></span>
				
				<div class="place">
					<p class="sede"><span class="fa fa-map-marker"></span> Sede <?php echo get_field('sede',$post->ID); ?></p>
				</div>

			</div>

			<div class="col-md-8 col-sm-9">
				<?php echo apply_filters('the_content' , $post->post_content)?>
				<?php echo get_field('tabla_convenio') ?>
				
				<?php $gallery = get_field('slide_gallery') ?>
	            <?php if($gallery){?>
	            <section class="galery">
	                <div class="clear separator"></div>
	                <div class="row">
	                    <?php $imgcount = 0?>
	                    <?php foreach($gallery as $image):?>
	                    <?php $imgcount++?>
	                        <div class="col-md-2 col-xs-4">
	                            <a href="<?php echo $image['url'] ?>" rel="Shadowbox['gal']">
	                              <img src="<?php echo $image['sizes']['thumbnail'] ?>" class="img-responsive" alt="...">
	                            </a>
	                        </div>
	                    <?php if($imgcount % 6 == 0){echo '<div class="clear separator desktop"></div>';}?>
	                    <?php if($imgcount % 3 == 0){echo '<div class="clear separator mobile"></div>';}?>
	                    <?php endforeach?>       
	                </div>
	                    
	                <div class="clear separator"></div>
	            </section>
	            <?php }?>

			</div>

			<div class="clear separator"></div>

			<div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2 col-xs-12 share-article">

			    <ul>
			    	<p>Compartir:</p>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin"></i></a></li>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
			        <li><a onclick="basicPopup(this.href);return false" target="_blank" href="http://twitter.com/share?text=<?php echo get_bloginfo('name')?>&nbsp;-&nbsp;<?php echo $post->post_title?>"><i class="fa fa-twitter"></i></a></li>
			    </ul>
			</div>

		</div>
	</div>
</article>

<?php get_footer(); ?>


			<div class="container">
				<?php $gallery = get_field('slide_gallery') ?>
	            <?php if($gallery){?>
	           	<?php $imgcount = 0?>
	            <?php foreach($gallery as $image):?>
	            <?php $imgcount++?>

				  <ul class="nav nav-pills nav-stacked">
				    <li><a data-target="#lightbox-<?php echo $imgcount?>" data-toggle="modal" data-slide-to="1"><img src="<?php echo $image['sizes']['thumbnail'] ?>" class="img-responsive" alt="..."></a></li>
				  </ul>
				  <?php if($imgcount % 6 == 0){echo '<div class="clear separator desktop"></div>';}?>
		          <?php if($imgcount % 3 == 0){echo '<div class="clear separator mobile"></div>';}?>
		          <?php endforeach?> 
	          <?php }?>

	          <?php foreach($gallery as $modal) ?>
			  
			  <div class="modal fade and carousel slide" id="lightbox-<?php echo $imgcount?>">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-body">

			          <div class="carousel-inner">
			            <div class="item active">
			              <img src="<?php echo $modal['sizes']['thumbnail'] ?>" class="img-responsive" alt="...">
			            </div>

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

			<?php endforeach ?>

			</div><!-- /.container -->
