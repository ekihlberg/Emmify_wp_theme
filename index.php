<?php get_header(); ?>
<div class="content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

  <section class="post">
    <?php if ( has_post_thumbnail() ):?>
      <a class="post-image" href="<?php the_permalink() ?>"><div class="post-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' );?>');"></div></a>
    <?php else:?>
      <a class="post-image" href="<?php the_permalink() ?>"><div class="post-image" style="background-image:url('<?php bloginfo('stylesheet_directory'); ?>/img/foil.jpg');"></div></a>
    <?php endif; ?>

    <div class="post-text">
      <h3>
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      </h3>

      <?php the_excerpt();?>

    </div>
  </section>



  <?php endwhile; ?>

  <?php else: ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
