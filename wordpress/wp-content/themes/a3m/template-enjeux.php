<?php
/**
 *  Template Name: Pages enjeux
 */
 
    get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar(); ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php $subtitle = get_field('sous_titre');
            if($subtitle != ''){
          ?>
            <h2 class="titlePAge twoline">
              <?php the_title(); ?>
              <?php
                echo '<br/><span class="subtitle">'.$subtitle.'</span>';
              ?>
            </h2>
            <?php }else{?>
              <h2 class="titlePAge"><?php the_title(); ?></h2>
            <?php } ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
          <div class="articlesRelatifs">
            <h3>Liste des articles relatifs :</h3>
              <ul>
                <li><span class="date">26/02/2014 :</span> <span class="title"><a href="#" title="">La certification des installations de recyclage progresse</a></span></li>
                <li><span class="date">13/01/2014 :</span> <span class="title"><a href="#" title="">ADEME - premières conclusions de l’étude sur la compétitivité des filières de recyclage</a></span></li>
                <li><span class="date">22/11/2013 :</span> <span class="title"><a href="#" title="">Les acteurs de la filières du recyclage s’engagent</a></span></li>
                <li><span class="date">30/09/2013 :</span> <span class="title"><a href="#" title="">Feuille de route de la conférence environnementale 2013</a></span></li>
                <li><span class="date">17/07/2013 :</span> <span class="title"><a href="#" title="">Réunion d’information FEDEM - Recyclage - 4 juillet 2013</a></span></li>
                <li><span class="date">27/02/2013 :</span> <span class="title"><a href="#" title="">ADEME - Lancement de l’étude compétitivité et filières de recyclage</a></span></li>
                <li><span class="date">25/10/2012 :</span> <span class="title"><a href="#" title="">Colloque ADEME Filières et Recyclage : L’économie circulaire porteuse d’avenir</a></span></li>
                <li><span class="date">10/07/2012 :</span> <span class="title"><a href="#" title="">Réunion d’échanges et de travail sur le recyclage et les conditions d’une meilleure compétitivité pour l’industrie des métaux non ferreux - 9 juillet 2012</a></span></li>
                <li><span class="date">20/04/2012 :</span> <span class="title"><a href="#" title="">Observatoire du recyclage</a></span></li>
                <li><span class="date">25/01/2012 :</span> <span class="title"><a href="#" title="">Indicateurs de recyclage : Les propositions d’Eurometaux</a></span></li>
                <li><span class="date">15/12/2011 :</span> <span class="title"><a href="#" title="">L’Union des industries du recyclage : Les déchets, matières premières de nos industries</a></span></li>
              </ul>            
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>