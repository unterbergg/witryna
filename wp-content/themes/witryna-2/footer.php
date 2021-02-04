<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Witryna_#2
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="center-wrapper">
            <div class="site-info">
                <div class="row">
                    <div class="footer-menu">
                        <nav id="footer-navigation" class="footer-navigation">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer_menu',
                                    'menu_id'        => 'footer-menu',
                                )
                            );
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="social-wrapper">
                        <?php foreach (get_field('socials', 'option') as $key => $item):?>
                            <a class="social-item" href="<?php echo $item;?>">
                                <i class="fab fa-<?php echo $key;?>"></i>
                            </a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="copyright">
                    <?php echo get_field('copyright', 'option')?>
                </div>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
    <section class="popup" data-item="About">
        <?php
            $post_id = 27;
            $post_content = get_post($post_id);
            $content = $post_content->post_content;
        ?>
        <div id="about" class="modal-window">
            <div class="modal-headline">
                <?php echo apply_filters('the_title',$post_content->post_title);?>
                <div class="modal-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="modal-content">
                <?php echo apply_filters('the_content',$content);?>
            </div>
        </div>
    </section>
    <section class="popup" data-item="Privacy Policy">
        <?php
            $post_id = 3;
            $post_content = get_post($post_id);
            $content = $post_content->post_content;
        ?>
        <div id="policy" class="modal-window">
            <div class="modal-headline">
                <?php echo apply_filters('the_title',$post_content->post_title);?>
                <div class="modal-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="modal-content">
                <?php echo apply_filters('the_content',$content);?>
            </div>
        </div>
    </section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
