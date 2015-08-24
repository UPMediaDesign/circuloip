<?php
/*
Template Name: Preguntas Frecuentes
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

<section class="faq-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php $barras = get_field('barra_preguntas' , $post->ID)?>
		        <?php $countbarras = 0?>
		        <?php foreach($barras as $barra):?>
				<?php $countbarras++?>


				  <div class="panel panel-default">

				    <div class="panel-heading" role="tab" id="heading<?php echo $barra['titulo_pregunta']?>">
				      <h4 class="panel-title">
				      	<span><?php echo $countbarras ?> - </span>
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $countbarras ?>" aria-expanded="true" aria-controls="collapseOne <?php echo $barra['titulo_pregunta']?>">
				         <?php echo $barra['titulo_pregunta']?>
				        </a>
				      </h4>
				    </div>

				    <div id="collapse-<?php echo $countbarras?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $barra['titulo_pregunta']?>">
				      <div class="panel-body">
				        <?php echo $barra['respuesta_pregunta']?>
				      </div>
				    </div>

				  </div>
				
				<?php endforeach;?>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
