

<?php
/* Template Name: Kontakt */


get_header();



 ?>
<div class="content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <div class="contentbox">
      <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_post_thumbnail(); ?>
      </a>
  <?php endif; ?>
  <div class="about-content">
    <h2 class="heading-single"><?php the_title(); ?></h2>
        <div class="streck"></div>

        <div class="text"> <?php the_content();?></div>

    </div>
  </div>

  <?php
endwhile; ?>

  <?php else: ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
