<?php 
/**
 * User: arthur
 * Date: 30/04/14
 * Time: 17:48
 * Template Name: Form To Post
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>
