<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php if(is_home()){?>
	<title><?php wp_title();?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<meta name="viewport" content="width=device-width, initial-scale=0.75 , minimum-scale=1.0 ,  maximum-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>?ver=3.8.1" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<!--Otros -->
<?php call_scripts()?>
<?php wp_head()?>

</head>

<body <?php body_class()?>>

<!-- Loader de sitio -->
<!-- <div id="loader">
    <div class="loader-inner ball-scale-ripple-multiple">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div> -->

<!-- Navegación del sitio -->
<header class="navbar navbar-default navbar-fixed-top bg-titleblue" role="navigation">
      <div class="container">
      	<div class="row">
      	
            <div class="navbar-header">
            	<a class="navbar-brand logo" href="<?php bloginfo('url')?>"><img src="<?php bloginfo('template_directory')?>/images/logo_circulo.png" alt="" width="150" /></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
              
              <?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav navbar-nav' , 'theme_location' => 'primary' ) ); ?>
              <div class="outlogged nav">
                  <span>Tienes una cuenta circulo.trabajando.com</span>
                  <a class="acc" href="/">Ingresar</a>
                  <p>¿Aún no te registras? <a href="/">Ingresa aquí</a></p>
              </div>
              
            </div><!--/.nav-collapse -->

           
                        
      	</div>
      </div>
</header>