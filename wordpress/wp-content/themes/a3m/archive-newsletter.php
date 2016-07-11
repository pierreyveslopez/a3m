<?php
/*
Template Name: Archives des Newsletters
*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>A3M</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php bloginfo(template_url); ?>/css/main.css">
  <link rel="stylesheet" href="<?php bloginfo(template_url); ?>/css/style.min.css">
  <!-- endinject -->
    <!-- inject:js -->
  <script src="<?php bloginfo(template_url); ?>/js/main.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/modernizr.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/script.js"></script>
  <!-- endinject -->
</head>
<body>

	<div class="wrapper bluePage espaceAdherents">

	    <header>
	      <div class="pure-g">
	        <div class="pure-u-1 pure-u-md-1-4">
	          <div id="logo">
	            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo(template_url); ?>/img/a3m-logo.jpg" class="pure-img"></a>
	          </div>
	        </div>
	        <div class="pure-u-1 pure-u-md-1-4"></div>
	        <div class="pure-u-1 pure-u-md-1-4"></div>
	        <div class="pure-u-1 pure-u-md-1-4">
	          <div id="login" class="login--on bluegradient">
	            <a href="<?php echo get_home_url(); ?>"><strong>Revenir sur le site A3M</strong></a><br/>
	            <?php echo '<a href="' . wp_logout_url( site_url( '/' ) ) .'">déconnexion</a>'; ?>
	          </div>
	        </div>
	      </div>
	      <h1>Espace Adhérents</h1>
	      <p class="subtitle">Archives des newsletters</p>
	    </header>

	    <div id="mainContent">
			<div class="sidebar">
				<div class="submenu green">
	        		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				        $pages = get_pages(array(
							'post_type' => 'newsletter'
						));
					?>
			        <ul>
		                <?php 
		                	foreach($pages as $page){
								$pageID = $page->ID;
								echo '<li><a href="'.get_permalink($pageID).'">'.$page->post_title.'</a></li>';
							}
						?>
		                </li>
			        </ul>
			        <?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>

	      	<div class="pageContent">

				<div class="col3--espaceAdherents">

		          <?php
		            //Ramdom colors for articles elements
		            function random($max){
		              $random = rand(1, $max);
		              $bgClass = "randomClass".$random;
		              return $bgClass;
		            }
		          ?>
		        
		          <?php 
		          	$theQuery = query_posts( 'post_type=newsletter&order=DESC&orderby=date' );
		            while ( have_posts() ) : the_post();
		              $nbTotal = $wp_query->post_count;
		              $nbNews = $nbTotal/$nbTotal;
		              $test = ceil($nbNews/3); ?>

		              <?php 
		                for($i = 0; $i < $nbNews; $i++){

		                  if( $i == 0 || $i == $test || $i == $test*2 ){
		                    echo '<div class="col">';
		                  } 
		              ?>
		                  <div class="blc">
		                    <h2 class="angle <?php echo random(4); ?>"><?php the_title(); ?></h2>
		                    <a href="<?php the_permalink(); ?>" class="btn">Voir plus  --></a>
		                  </div>
		                  <?php 

		                  if( $i == ($test-1) || $i == ($test*2-1) || $i == ($nbNews-1) ){
		                    echo '</div>';
		                  }
		                }

		            endwhile; wp_reset_query(); 
		          ?>


		        </div>

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>