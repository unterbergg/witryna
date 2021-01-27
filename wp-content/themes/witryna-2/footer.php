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
                        <a class="social-item" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="social-item" href="#"><i class="fab fa-facebook-square"></i></a>
                        <a class="social-item" href="#"><i class="fab fa-vk"></i></a>
                        <a class="social-item" href="#"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>
                <div class="copyright">
                    Copyright © 2020 «Indobu.news»<br>
                    Seluruh hak cipta. Untuk anak di atas 16 tahun
                </div>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
