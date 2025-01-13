<?php
/**
 * Template Name: Upcoming Tours
 * Description: Upcoming Tours template
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Pacific Holidays</title>
    <?php wp_head()?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="min-h-svh w-svw overflow-x-hidden ">

    <?php get_template_part( 'sections/section', "page-nav")?>

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