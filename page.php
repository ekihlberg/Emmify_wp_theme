

<?php get_header();



 ?>
<div class="content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <div class="contentbox">

    <h2 class="heading-single"><?php the_title(); ?></h2>
        <div class="streck"></div>

        <div class="text"> <?php the_content();?></div>

    </div>


  <?php



endwhile; ?>

  <?php else: ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
