<?php get_header(); ?>
<div class="content portfolio">
  <div class="toppart">
    <div class="toptext">
    <?php if( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        /* Post */

   ?>
      <h1><?php the_title(); ?></h1>
      <div class="streck"></div>

      <p> <?php the_content(); ?></p>
<?php     }
  }  ?>
  </div>
  <i class="fa fa-angle-down" id="arrow" aria-hidden="true"></i>
  </div>
    <h2 class="heading" id="portfolio">Mina Godbitar</h1>
  <div class="grid">

<?php
    query_posts(array('post_type' => 'portfolio'
  ));

    if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <section class="port" id="port">
      <?php



      if ( has_post_thumbnail() ):?>
        <a class="portfolio-image" href="<?php the_permalink() ?>"><div class="post-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');">
          <div class="overlay">
            <p>
              <?php
            // Get terms for post
            $terms = get_the_terms( $post->ID , 'types' );
            // Loop over each item since it's an array
            if ( $terms != null ){
            foreach( $terms as $term ) {
            $term_link = get_term_link( $term, 'types' );
             // Print the name and URL
            echo  $term->name;
            // Get rid of the other data stored in the object, since it's not needed
            unset($term); };
            ;
            };

            ?>
          </p>
            <h3>  <?php the_title();?></h3>

      </div>
        </div></a>
      <?php else: ?>
        <a class="portfolio-image" href="<?php the_permalink() ?>"><div class="post-image" style="background-image:url('<?php bloginfo('stylesheet_directory'); ?>/img/foil.jpg');"></div></a>
      <?php endif; ?>
    </section>



    <?php endwhile; ?>

    <?php else: ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
