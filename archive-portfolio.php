<?php get_header(); ?>
<div class="content portfolio">
  <!-- <div class="toptext">
    <h1>Jag är Emma Kihlberg</h1>
    <div class="streck"></div>

    <p>Det här är min portfolio. Jag är en person som ser det positiva i varje aspekt av livet. Det finns många saker som jag vill göra, se och uppleva. Min passion i livet är att vara kreativ, både på ett tekniskt och grafiskt plan.
    Med mina 23 år i bagaget tittat jag nu fram mot ett liv av spännande upplevelser och utmaningar.</p>
</div> -->
  <div class="grid">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <section class="port">
      <?php if ( has_post_thumbnail() ):?>
        <a class="portfolio-image" href="<?php the_permalink() ?>"><div class="post-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');">
          <div class="overlay">
            <h3>  <?php the_title();?></h3>
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
