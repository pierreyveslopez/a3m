<?php
/**
 *  Template Name: Cours métaux
 */
 
    get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar(); ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2 class="titlePAge"><?php the_title(); ?></h2>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
          <div class="select--custom" style="min-width:80%">
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option>Synthèse</option>
              <?php 
              query_posts('post_type=cours-des-metaux&orderby=title&order=ASC'); 
              while ( have_posts() ) : the_post();
              ?>
                <option value="<?php the_permalink();?>"><?php the_title(); ?></option>
              <?php 
                endwhile; wp_reset_query(); 
              ?>
            </select>
          </div>
          <table>
            <tbody>
             <tr>
                <th>Intitulé</th>
               <th>Date</th>
               <th>Cours</th>
             </tr>
             <?php 
              query_posts('post_type=cours-des-metaux&orderby=title&order=ASC'); 
              while ( have_posts() ) : the_post();
              $date = get_field('date');
              $cours = get_field('cours');
            ?>
              <tr>
                <td><a style="text-decoration:none;" href="<?php the_permalink();?>"><strong style="color:#000;"><?php the_title(); ?></strong></a></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $cours; ?></td>
             </tr>
            <?php 
              endwhile; wp_reset_query(); 
            ?>
            </tbody>
           </table>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>