<?php
/**
 * Template Name: Upcoming Tours
 * Description: Upcoming Tours template
 */
?>
<?php get_header()?>

    <?php if (has_post_thumbnail()):?>
        <img src="<?php the_post_thumbnail_url('blog-large')?>" alt="post-thumbnail" class="img-fluid">
    <?php endif;?>

    <div><?php the_title();?></div>

    <p><?php echo get_the_date('l jS F, Y')?></p>

    <div>
        <?php 
            add_filter( 'the_content', function( $content ) {
                return $content; // Simply return content unaltered for debugging.
            }, 20 );
            the_content();
        ?>
    </div>

    <?php //comments_template()?>
    <?php wp_link_pages()?>
<?php get_footer();?>
<?php get_footer();?>