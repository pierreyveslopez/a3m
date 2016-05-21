    <?php get_header();?>

    <div id="mainContent">
    <div class="breadcrumb">
      <a href="index.php">A3M</a> <a href="liste-adherents.php">Adhérents</a> <a href="#">Le bronze industriel</a>
    </div>
		<?php get_sidebar();?>
      <div class="pageContent singleAdherent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <h2 class="titlePAge"><?php the_title(); ?></h2>

          <?php
            $path_logo = get_field('logo');
            if($path_logo){ 
                echo '<p><br/><img src="'.$path_logo.'" alt="'.get_the_title().' - A3M"></p>';
            }
          ?>
          <div class="accordion">
            <?php
                $ca = get_field('chiffre_daffaire');
                $effectif = get_field('effectif');
                $content_information = get_field('informations');
                if($content_information){
            ?>
            <div class="accordion-section">
                <a class="accordion-section-title active" href="#informations">Informations</a>
                 
                <div id="informations" class="accordion-section-content open" style="display:block;">
                    <div class="headerInformations">
                        <?php
                            if($ca){
                                echo '<span class="ca"><strong>CA : </strong>'.$ca.'</span> ';
                            }
                            if($effectif){
                                echo '<span class="effectif"><strong>Effectif : </strong>'.$effectif.'</span>';
                            }
                        ?>
                    </div>
                    <?php echo $content_information; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
                $content_activite = get_field('activite');
                if($content_activite){
            ?>
            <div class="accordion-section">
                <a class="accordion-section-title" href="#activite">Activité</a>
                 
                <div id="activite" class="accordion-section-content">
                   <?php echo $content_activite; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
            ?>
             <div class="accordion-section">
                <a class="accordion-section-title" href="#matieres">Matières</a>
                 
                <div id="matieres" class="accordion-section-content">
                    <ul>
                         <?php
                            $matieres = wp_get_post_terms($post->ID, 'matieres', '' );
                            foreach ( $matieres as $matiere ) {
                                echo '<li>' . $matiere->name . '</li>';
                            }
                          ?>
                    </ul> 
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
             <div class="accordion-section">
                <a class="accordion-section-title" href="#produits">Produits</a>
                 
                <div id="produits" class="accordion-section-content">
                    <ul>           
                       <?php
                            $produits = wp_get_post_terms($post->ID, 'produit', '' );
                            foreach ( $produits as $produit ) {
                                echo '<li>' . $produit->name . '</li>';
                            }
                          ?>
                    </ul> 
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                $content_outils = get_field('outils');
                if($content_outils){
            ?>
            <div class="accordion-section">
                <a class="accordion-section-title" href="#outils">Outils</a>
                 
                <div id="outils" class="accordion-section-content">
                    <?php echo $content_outils; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
                $content_segment_de_chaine = get_field('segment_de_chaine');
                if($content_segment_de_chaine){
            ?>    
            <div class="accordion-section">
                <a class="accordion-section-title" href="#segment">Segment de chaîne valeur</a>
                 
                <div id="segment" class="accordion-section-content">
                    <?php echo $content_segment_de_chaine; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
                $content_qualifications_certifications = get_field('qualifications_certifications');
                if($content_qualifications_certifications){
            ?>
            <div class="accordion-section">
                <a class="accordion-section-title" href="#qualifications">Qualifications / Certifications</a>
                 
                <div id="qualifications" class="accordion-section-content">
                    <?php echo $content_qualifications_certifications; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
                $content_commentaires = get_field('commentaires');
                if($content_commentaires){
            ?>
             <div class="accordion-section">
                <a class="accordion-section-title" href="#commentaires">Commentaires</a>
                 
                <div id="commentaires" class="accordion-section-content">
                    <?php echo $content_commentaires; ?>
                </div><!--end .accordion-section-content-->
            </div><!--end .accordion-section-->
            <?php
                }
            ?>

        </div><!--end .accordion-->

        </div>
      </div>
    </div>
  </div>
 <?php get_footer();?>