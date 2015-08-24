<?php
/*
Template Name: Perfeccionamiento
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

<section class="bg-pearlwhite perf-intro">
	<div class="container">
		<div class="row">
			<h2><?php echo $post->post_excerpt; ?></h2>
		</div>
	</div>
</section>

<section class="perf-tabs">
	<div class="container">
		<div class="row">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<?php $tabs = get_field('pestana__perfeccionamiento' , $post->ID)?>
            <?php $ctoabs = 0?>
            <?php foreach( $tabs as $tab):?>
			<?php $ctoabs++?>
            <?php if($ctoabs == 1)
	            {
	            	$tabclass = 'active col-md-4 col-sm-4 col-xs-4';
	            	$tabcontactive = 'tab-pane fade in active';
	            }

	            else{
	            	$tabclass = 'col-md-4 col-sm-4 col-xs-4';
	            	$tabcontactive = 'tab-pane fade';
	            }
            ?>

			    <li role="presentation" style="background-image:url(<?php echo $tab['fondo_pestana']?>);" class="<?php echo $tabclass?>">
			    	<a href="#tab-<?php echo $ctoabs?>" aria-controls="home" role="tab" data-toggle="tab">
						<img src="<?php echo $tab['icono_pestana']?>" alt="">
						<span><?php echo $tab['nombre_pestana']?></span>
			    	</a>
			    </li>

			<?php endforeach;?>
			</ul>
			<div class="tab-content">
			<?php $ctoabs = 0?>
			<?php foreach ($tabs as $inside):?>
			<?php $ctoabs++?>

			  <div role="tabpanel" class="tab-pane fade<?php if($ctoabs == 1){echo 'in active';} ?>" id="tab-<?php echo $ctoabs?>">
			  	<div class="row antirow">

			  		<div class="col-md-4 col-sm-12 col-xs-12 quote">
			  			<h4><?php echo $inside['cita_perfeccionamiento']?></h4>
			  			<div class="profile">
			  				<?php echo get_avatar('perftab'); ?>
			  				<p class="author">Por: <a class="author" href="<?php echo get_the_author()?>"><?php echo get_the_author()?></a></p>
			  			</div>
			  		</div>
			  		<div class="col-md-8 col-sm-12 col-xs-12 perf-content">
			  			<p><?php echo $inside['contenido']?></p>
			  		</div>

			  	</div>
			  </div>
			

			<?php endforeach;?>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>