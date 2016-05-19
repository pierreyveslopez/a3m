<?php

// ADD FEATURED IMAGES
add_theme_support( 'post-thumbnails' );

// Enable custom menus
add_theme_support( 'menus' ); 

function theme_styles(){
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'mystyle', get_template_directory_uri() . '/css/style.min.css' );
}

function theme_js(){

	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
	wp_enqueue_script('modernize', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '', true);
	wp_enqueue_script('script', get_template_directory_uri() . '/js/scriptjs', array('jquery'), '', true);
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );


if ( function_exists('register_sidebar') )
    register_sidebar();
	
function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');


function new_excerpt_length($length) {
 return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

function et_excerpt_more($more) {
    global $post;
    return '[...]<br/><a href="'. get_permalink($post->ID) . '" class="default">Lire la suite --></a>';
}
add_filter('excerpt_more', 'et_excerpt_more');

function sidebar_menu($origin){
	global $post;
	$actualPost = $post->ID; 
	query_posts('post_parent='.$origin.'&post_type=page&order=ASC');
	
	echo '<ul>';
	if($origin == 159){
		if($origin == $post->ID){
		$classLi = "class='actif'";
		}else{
			$classLi = "";
		}
		echo '<li '.$classLi.'><a href="'.get_permalink($origin).'">Accueil</a></li>';

	}
    while ( have_posts() ) : the_post();
    	if($actualPost == $post->ID){
		$classLi = "class='actif'";
		}else{
			$classLi = "";
		}
    	$page_id = $post->ID;
    	if(!hasChild($page_id)){
    		echo '<li '.$classLi.'><a href="'.get_permalink().'">';
    	}else{
    		echo '<li '.$classLi.'><a href="#">';
    	}
    	the_title();
    	echo '</a>';
    	if(hasChild($page_id)){get_child($page_id, $actualPost);}
    	echo '</li>';
		
    endwhile; wp_reset_query(); 
    echo '</ul>';
}
	function hasChild($page_id){
		//global $post; // required
		$args = array('post_parent' => $page_id, 'post_type' => 'page'); // exclude category 9
		$custom_posts = get_posts($args);
			$count = 0;
			foreach($custom_posts as $post) : setup_postdata($post);
			 $count++;
			endforeach;
		if($count == 0){return false;}

		return true;
	}
	function get_child($page_id, $currentPage){
		//$actualPost = $post->ID; 
		//global $post; // required
		$args = array('post_parent' => $page_id, 'post_type' => 'page', 'order' => 'ASC', 'posts_per_page' => '-1'); // exclude category 9
		$custom_posts = get_posts($args);
		echo '<ul class="subsubmenu">';
			$count = 0;
			foreach($custom_posts as $post) : setup_postdata($post);
			//print_r($post);
			if($currentPage == $post->ID){
			$classLi = "class='actif'";
			}else{
				$classLi = "";
			}
			 echo '<li '.$classLi.'><a href="'.$post->guid.'">';
			 echo $post->id;
			 echo $post->post_title;
			 echo '</a></li>';
			 $count++;
			endforeach;
		echo '</ul>';

		if($count == 0){return false;}
		$test = 'ouaaaa';
		return true;
	}

// Breadcrumbs
function custom_breadcrumbs($queryPost) {
	$page_parent = $queryPost->post_parent;
	$enfant = '<a href="'.$queryPost->guid.'" title="'.$queryPost->post_title.'- A">'.$queryPost->post_title.'</a>';
    if($page_parent != 0){
      query_posts('page_id='.$page_parent);
      while ( have_posts() ) : the_post();
        /* Check if the page has grand parent */
        $parent = '<a class="parent" href="#" title="'.get_the_title().'- M">'.get_the_title().'</a>';
        $page_grandParent = wp_get_post_parent_id( $page_parent );
      endwhile; wp_reset_query();
      if($page_grandParent){
  		query_posts('page_id='.$page_grandParent);
  		while ( have_posts() ) : the_post();
     	 $grand_parent = '<a class="grandParent" href="#" title="'.get_the_title().'- 3">'.get_the_title().'</a>';
      	endwhile; wp_reset_query();
      }
    }
    $breadcrumb = '<div class="breadcrumb">'.$grand_parent.''.$parent.''.$enfant.'</div>';
    echo $breadcrumb;
}

// Vérouiller l'accès à une page
add_action( 'template_redirect', 'private_page' );
function private_page() {
    global $post;
    $absoluteUrl = "$_SERVER[REQUEST_URI]";
    $notSecurePage = strpos($absoluteUrl, 'espace-adherents');
	if ( (is_page(159) OR $post->post_parent == '159' OR $notSecurePage !== FALSE) && ! is_user_logged_in() ) {
		wp_redirect( wp_login_url(get_permalink(159)) );
		exit();
	}
    else {

    }
}


