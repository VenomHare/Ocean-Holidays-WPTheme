<?php
    /**
 * Template Name: Checkout Template
 * Description: Checkout template
 */
?>
<?php get_header()?>

    <section class="min-h-[57svh] w-[75svw] py-10 max-sm:w-[95svw]">
        <?php echo do_shortcode("[yatra_checkout]")?>
    </section>

<?php get_footer();?>