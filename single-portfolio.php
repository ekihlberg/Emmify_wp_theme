

<?php get_header();



 ?>
<div class="content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

  <section>

    <?php
    $facbookLink = get_post_meta( $post->ID, 'custom_image_data', true);

    if (has_term('toptumbnail', 'posttype')) {
    ?>
        <?php if ($facbookLink): ?>

<img class="attachment-post-thumbnail red" src="<?php print_r($facbookLink['src']) ; ?>" alt="">
<?php else:
  the_post_thumbnail();?>
<?php endif; ?>
<?php  };
if (has_term('imggrid', 'posttype')) {
?>
  <div class="block forsta imggrid">

    <img class="half" src="<?php echo extra_content_get_meta( 'extra_content_image_url' ); ?>" alt="me">
    <img class="half" src="<?php echo extra_content_get_meta( 'extra_content_image_url_2' ); ?>" alt="me">
  </div>

  <?php   }; ?>




<?php

if (has_term('centercontent', 'posttype')):
?>

<h2 class="heading-single"><?php the_title(); ?></h2>

    <div class="text">  <?php the_content();?></div>
<?php  endif;?>


<?php

if (has_term('contentbox', 'posttype')):
?>
<div class="contentbox">

<h2 class="heading-single"><?php the_title(); ?></h2>
    <div class="streck"></div>

    <div class="text">  <?php the_content();?></div>

  </div>
<?php  endif;?>


    <?php
    if (has_term('doublegrid', 'posttype')) {
    ?>
      <div class="block forsta">
        <img class="half" src="<?php echo extra_content_get_meta( 'extra_content_image_url' ); ?>" alt="me">
        <div class="ft-text">
          <h3> <?php echo extra_content_get_meta( 'extra_content_header_1' ); ?></h3>
          <div class="strecket"></div>
          <p><?php echo extra_content_get_meta( 'extra_content_text_1' ); ?></p>
        </div>
      </div>
      <div class="block andra">
        <img class="half" src="<?php echo extra_content_get_meta( 'extra_content_image_url_2' ); ?>" alt="me">
        <div class="ft-text">
          <h3> <?php echo extra_content_get_meta( 'extra_content_header_2' ); ?></h3>
          <div class="strecket"></div>
          <p><?php echo extra_content_get_meta( 'extra_content_text_2' ); ?></p>
        </div>
      </div>
      <?php   }; ?>

      <?php
      if (has_term('singlegrid', 'posttype')) {
      ?>
        <div class="block forsta">
          <img class="half" src="<?php echo extra_content_get_meta( 'extra_content_image_url' ); ?>" alt="me">
          <div class="ft-text">
            <h3> <?php echo extra_content_get_meta( 'extra_content_header_1' ); ?></h3>
            <div class="strecket"></div>
            <p><?php echo extra_content_get_meta( 'extra_content_text_1' ); ?></p>
          </div>
        </div>

        <?php   }; ?>
    </div>


  </section>




  <?php



endwhile; ?>

  <?php else: ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
