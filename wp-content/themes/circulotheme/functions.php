<?php if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('slider', 1200, 440, true);
add_image_size('homesocial', 320, 252, true);
add_image_size('encabportadilla', 1200, 440, true);
add_image_size('actidestacado', 491, 241, true);
add_image_size('actilista', 200, 180, true);
add_image_size('testimonio', 300, 300, true);
add_image_size('convenios', 124, 135, true);
add_image_size('perftab', 325, 221, true);
add_image_size('singleautor', 96, 96, true);
add_image_size('singleenc', 1200, 510, true);
add_image_size('singleimg', 660, 390, true);
add_image_size('singledestacado', 320, 171, true);
}
/* 
add_filter('image_size_names_choose', 'my_image_sizes');
	function my_image_sizes($sizes) {
	$addsizes = array(
		"col-6" => 'Media columna'
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
*/
add_post_type_support('page', 'excerpt', 'excerpt', 'thumbnail');
;?>
<?php 
/* Add support for wp_nav_menu() */
function register_my_menu() {
	register_nav_menu( 'primary', 'Menú principal');
	register_nav_menu( 'secondary', 'Menú footer');
    register_nav_menu( 'third', 'Menú footer inferior');
}
add_action( 'init', 'register_my_menu' );
?>
<?php 
function call_scripts() {
	wp_deregister_script('jquery');
  wp_enqueue_script('jquery' , 'http://code.jquery.com/jquery-1.10.0.min.js' , array() , '1.10' , true);
  wp_enqueue_script('core' , get_template_directory_uri() . '/js/core.js' , array() , '1.0' , true);
} 
add_action('wp_enqueue_scripts', 'call_scripts');
?>
<?php
//Post type register
add_action('init', 'actividades_register');
function actividades_register() {
    $args = array(
        'label' => 'Actividades',
        'singular_label' => 'Actividad',
        'public' => true,
		    'menu_position' => 5, 
        '_builtin' => false,
        'capability_type' => 'post',
		    'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'actividad'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('actividades', $args);
    flush_rewrite_rules();
}

add_action('init', 'vida_social_register');
function vida_social_register() {
    $args = array(
        'label' => 'Vida Social',
        'singular_label' => 'Vida Social',
        'public' => true,
        'menu_position' => 6, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'vida-social'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('vida-social', $args);
    flush_rewrite_rules();
}

add_action('init', 'oferta_laboral_register');
function oferta_laboral_register() {
    $args = array(
        'label' => 'Oferta Laboral',
        'singular_label' => 'Oferta Laboral',
        'public' => true,
        'menu_position' => 6, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'oferta-laboral'),
        'supports' => array('title', 'editor' , 'excerpt' )
    );
    register_post_type('oferta-laboral', $args);
    flush_rewrite_rules();
}

add_action('init', 'tips_laborales_register');
function tips_laborales_register() {
    $args = array(
        'label' => 'Tips Laborales',
        'singular_label' => 'Tip Laboral',
        'public' => true,
        'menu_position' => 6, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'tip-laboral'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('tip-laboral', $args);
    flush_rewrite_rules();
}

add_action('init', 'convenios_register');
function convenios_register() {
    $args = array(
        'label' => 'Convenios',
        'singular_label' => 'Convenio',
        'public' => true,
        'menu_position' => 7, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'convenios'),
        'supports' => array('title', 'editor' , 'excerpt' , 'thumbnail' )
    );
    register_post_type('convenio', $args);
    flush_rewrite_rules();
}

add_action('init', 'testimonios_register');
function testimonios_register() {
    $args = array(
        'label' => 'Testimonios',
        'singular_label' => 'Testimonio',
        'public' => true,
        'menu_position' => 7, 
        '_builtin' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'testimonios'),
        'supports' => array('title', 'excerpt' , 'thumbnail' )
    );
    register_post_type('testimonio', $args);
    flush_rewrite_rules();
}
register_taxonomy('ofertas', array('trabajos'), array("hierarchical" => true, "label" => "Ofertas", "singular_label" => "Trabajo", "rewrite" => 'hierarchical'));
?>
<?php 
function my_post_queries( $query ) {
  if (!is_admin() && $query->is_main_query()){

    if(is_home()){
      $query->set('posts_per_page', 3);
    }

    if(is_category()){
      $query->set('posts_per_page', 3);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );
?>
<?php //register sidebars

/* register_sidebar(array(
  'name' => __( 'Home' ),
  'id' => 'home',
  'description' => __( 'Widgets en esta área se mostrarán en el home, utlice esta área para agregar la mini encuesta' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>'
)); */


//add_filter('widget_text', 'do_shortcode');

?>
<?php 
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');?>
<?php 
function SuperAdmin() {
	echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">';
	//echo '<link href="'.get_bloginfo('template_directory').'/admin/bootstrap.css" rel="stylesheet">';
	echo "<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,800,400' rel='stylesheet' type='text/css'>";
	echo '<style type="text/css">
	body{ font-family: Open sans, helvetica neue, helvetica, arial , sans-serif}
	.wp-admin #adminmenu, .wp-admin #adminmenuback, .wp-admin #adminmenuwrap{ background-color:#436891 !important}
	#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu{background-color:#355272 !important}
	.wp-core-ui .button-primary{background-color:#355272 !important}
	</style>';
}
add_action('admin_head', 'SuperAdmin');
?>
<?php 

function get_type_for_attachment($post_id) {
  $type = get_post_mime_type($post_id);
  switch ($type) {
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
      return 'img'; break;
    case 'video/mpeg':
    case 'video/mp4': 
    case 'video/quicktime':
      return 'Vid'; break;
    case 'text/csv':
    case 'text/plain': 
    case 'text/xml':
      return 'Doc'; break;
	case 'application/pdf':
		return 'PDF'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	case 'application/msword':
		return '.Doc'; break;
	case 'application/vnd.ms-excel':
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
		return '.Xls'; break;
	case 'application/vnd.ms-powerpoint' :
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
		return 'Ppt'; break;
    default:
      return 'file';
  }
}
// call it like this:
//echo '<img src="'.get_icon_for_attachment($my_attachment->ID).'" />';

function get_icon_for_attachment($post_id) {
  $type = get_post_mime_type($post_id);
  switch ($type) {
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
      return 'fa-file-image-o'; break;
    case 'video/mpeg':
    case 'video/mp4': 
    case 'video/quicktime':
      return 'fa-file-video-o'; break;
    case 'text/csv':
    case 'text/plain': 
    case 'text/xml':
      return 'fa-file-text-o'; break;
	case 'application/pdf':
		return 'fa-file-pdf-o'; break;
	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
	case 'application/msword':
		return 'fa-file-word-o'; break;
	case 'application/vnd.ms-excel':
	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
		return 'fa-file-excel-o'; break;
	case 'application/vnd.ms-powerpoint' :
	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
		return 'fa-file-powerpoint-o'; break;
    default:
      return 'fa-file-o';
  }
}
// call it like this:
//echo '<img src="'.get_icon_for_attachment($my_attachment->ID).'" />';


?>
<?php
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Página ".$paged." de ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
?>
<?php
/*******************************************************************
* @Author: Boutros AbiChedid
* @Date:   March 20, 2011
* @Websites: http://bacsoftwareconsulting.com/
* http://blueoliveonline.com/
* @Description: Numbered Page Navigation (Pagination) Code.
* @Tested: Up to WordPress version 3.1.2 (also works on WP 3.3.1)
********************************************************************/
 
/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}
 
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First Page');
    $pagenavi_options['last_text'] = ('Last Page');
    $pagenavi_options['next_text'] = 'Next &raquo;';
    $pagenavi_options['prev_text'] = '&laquo; Previous';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;
 
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval — Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
 
        //empty — Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
 
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
 
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
 
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
 
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi">'."\n";
 
            if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            previous_posts_link($pagenavi_options['prev_text']);
 
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
 
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
 
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            next_posts_link($pagenavi_options['next_text'], $max_page);
 
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}
?>
<?php 
/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
?>
<?php 
//add_filter( 'jpeg_quality', create_function( '', 'return 75;' ) );
?>