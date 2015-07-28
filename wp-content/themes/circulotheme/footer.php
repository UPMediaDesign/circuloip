<footer <?php if(is_home() || is_page(15) || is_page(17) || is_page(19) || is_page(23) || is_404()){?>class="navbar-fixed-bottom"<?php }?>>
	<div class="container">
    	<div class="row">
        
        	<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'footer-nav fl' , 'theme_location' => 'secondary' ) ); ?>
			
                       
            
            <div class="clear miniseparator hidden-sm hidden-md hidden-lg"></div>
            <div class="sociales fl">
            	<ul>
                    <li><a href="<?php echo get_field('facebook','options')?>"><span class="fa fa-fw fa-facebook"></span></a></li>
                    <li><a href="<?php echo get_field('youtube','options')?>"><span class="fa fa-fw fa-youtube"></span></a></li>
            	</ul>
            </div>
            <div class="otras-empresas fl">
                <ul>
                	<?php $esas = get_field('otras_empresas' , 'options');?>
                    <?php foreach($esas as $esa):?>
                	<li><a href="<?php echo $esa['link']?>" alt="<?php echo $esa['empresa']?>"><img src="<?php echo $esa['logo']?>" alt=""></a></li>
                    <?php endforeach?>
                </ul>
            </div>
            
        </div>
    </div>
</footer>


<div id="filis" style="display:none">
	<?php /* <div class="clsss pull-right"><span class="fa fa-close fa-fw fa-2x" style="color:#000"></span></div> */?>
    <div class="clear"></div>
	<?php $filiales = get_post(11)?>
    <h5><?php echo $filiales->post_title;?></h5>
    
    <?php echo apply_filters('the_content', $filiales->post_content)?>
</div>

</body>
<?php wp_footer()?>



<!-- scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>
jQuery(window).load(function() {
	jQuery("#loader-wrapper").fadeOut("slow");
})
</script>

<?php if(is_home() || is_404()){ //supersized?>
<?php $bgd = wp_get_attachment_image_src( get_field('default_background' , 'options') , 'full')?>
<script type="text/javascript">

jQuery(document).ready(function() {
	jQuery('body').append('<div id="supersized-loader"></div><div id="supersized"></div>');
});

			jQuery(function($){
				$.supersized({
					slideshow               :   1,		//Slideshow on/off
					autoplay				:	1,		//Slideshow starts playing automatically
					start_slide             :   1,		//Start slide (0 is random)
					random					: 	0,		//Randomize slide order (Ignores start slide)
					slide_interval          :   8000,	//Length between transitions
					transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	300,	//Speed of transition
					new_window				:	1,		//Image links open in new window/tab
					pause_hover             :   0,		//Pause slideshow on hover
					keyboard_nav            :   0,		//Keyboard navigation on/off
					performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,		//Disables image dragging and right click with Javascript
					image_path				:	'img/', //Default image path
					min_width		        :   0,		//Min width allowed (in pixels)
					min_height		        :   0,		//Min height allowed (in pixels)
					vertical_center         :   0,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					fit_portrait         	:   1,		//Portrait images will not exceed browser height
					fit_landscape			:   0,		//Landscape images will not exceed browser width
					navigation              :   1,		//Slideshow controls on/off
					thumbnail_navigation    :   0,		//Thumbnail navigation
					slide_counter           :   0,		//Display slide numbers
					slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
					slides 					:  	[		//Slideshow Images
														{image : '<?php echo $bgd[0] ?>', title : '',},  
														 
												]
				}); 
		    });
</script>
<?php }?>

<?php if(is_page(19)){ //bigvideo?>
<script>
	jQuery(function() {
		var BV = new $.BigVideo();
		BV.init();
		  BV.show('<?php echo get_field('video_loop' , 19)?>',{doLoop:true});
	});
</script>
<?php }?>

<?php /* if(is_page(502)){ //bigvideo?>
<script>
	jQuery(function() {
		var BV = new $.BigVideo();
		BV.init();
		  BV.show('<?php echo get_field('video_loop' , 502)?>',{doLoop:true});
	});
</script>
<?php } */?>

<script>
jQuery(function(){
    $("#menu-item-1281 a").popover({
        html : true, 
        placement: 'top',
        content: function() {
          return $('#filis').html();
        }
    });

	 $('.clsss').click(function(event) {
		 $('#menu-item-1281 a').popover('hide');
	}); 

});

/* jQuery(function () {
  $('[data-toggle="popover"]').popover();
}) */

	  
/*jQuery('.popover').on('shown.bs.popover', function () {
  	var pcon = $('#filis').html();
	  console.log(pcon);
	  $('.popover-content').html(pcon);
})	  
*/
</script>

</html>