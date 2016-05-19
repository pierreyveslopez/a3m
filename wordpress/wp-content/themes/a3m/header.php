<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>A3M</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <?php wp_head(); ?>
  
  <!-- inject:js -->
  <script src="<?php bloginfo(template_url); ?>/js/main.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/modernizr.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/script.js"></script>
  <!-- endinject -->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
  <?php 
    $page_parent = $post->post_parent;
    if($page_parent != 0){

      $firstParent = $page_parent;

      query_posts('page_id='.$page_parent);
      while ( have_posts() ) : the_post();
        /* Check if the page has grand parent */
        $page_grandParent = $post->post_parent;
        if($page_grandParent != 0){
          $firstParent = $page_grandParent;
        }
      endwhile; wp_reset_query(); 
    }else{
      $firstParent = $post->ID;
    }
    if($post->post_type == 'adherents'){
      $firstParent = 5;
    }
    if($post->post_type == 'cours-des-metaux'){
      $firstParent = 14;
    }  
  ?>
  var currentPage = <?php echo $firstParent; ?>;
  var el;
  if(currentPage==5){el = 1;}
    else if(currentPage==8){el = 2}
      else if(currentPage==10){el = 3}
        else if(currentPage==12){el = 4}
          else if(currentPage==14){el = 5}
            else if(currentPage==16){el = 6}
              else if(currentPage==18){el = 7}
  $(document).ready(function(){
    $('#menu-menu-principal li:nth-child('+el+')').addClass('current-menu-item');
  });
  

  </script>
</head>
<body class="homepage">
<?php 
  //CONFIG -- COLOR PAGE
  $page_color = get_field('couleur_de_la_page');
  $class_page_color = 'blueLightPage';

  if($page_color == 'Blue Light'){
    $class_page_color = 'blueLightPage';
  }elseif ($page_color == 'Vert') {
    $class_page_color = 'greenPage';
  }elseif ($page_color == 'Jaune') {
    $class_page_color = 'yellowPage';
  }elseif ($page_color == 'Violet' || $post->post_type == 'cours-des-metaux') {
    $class_page_color = 'purplePage';
  }
?>
  <div class="wrapper <?php echo $class_page_color; ?>">
    <header>
      <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="logo">
           <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo(template_url); ?>/img/a3m-logo.jpg" class="pure-img"></a>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4"></div>
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="searchbar">
            <span class="iconSprite">Recherche</span>
            <?php //get_search_form(); ?>
            <form class="pure-form pure-form-stacked" action="http://localhost:8888/a3m/wordpress/">
              <input type="text" name="s" id="search" placeholder="Recherche">
            </form>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4">
          
            <?php 
              if ( ! is_user_logged_in() ) {
            ?>
            <div id="login" class="bluegradient">
            <span class="iconSprite">Mon compte</span>
            <form  method="post" action="<?php echo get_site_url(); ?>/wp-login.php?from=index" id="login-form" name="login-form" class="pure-form pure-form-stacked">
                <fieldset>
                  <input id="user-login" name="log" type="text" placeholder="Identifiant">
                  <input id="user-pass" name="pwd" type="password" placeholder="Password">
                  <button id="wp-submit" name="wp-submit" type="submit" class="pure-button pure-button-primary">OK</button>
                  <input type="hidden" value="<?php echo get_site_url(); ?>/espace-adherent/" name="redirect_to">
                </fieldset>
            </form>
            </div>
            <?php 
              } else {
            ?>         
          <div id="login" class="login--on bluegradient">
            <a href="<?php echo get_site_url(); ?>/espace-adherent/"><strong>Espace Adhérents</strong></a><br/>
            <?php echo '<a href="' . wp_logout_url( site_url( '/' ) ) .'">déconnexion</a>'; ?>
          </div>
          <?php }
            ?>
        </div>
      </div>

      <div class="pure-g">
        <div class="pure-u-1">
          <nav class="pure-menu pure-menu-horizontal" id="mainNavigation">
            
            <?php 
            $param = array('menu_class' => 'pure-menu-list');
            wp_nav_menu($param); 

            ?>
          </nav>
        </div>
      </div>
    </header>