        </main>

        <?php
            if ( has_custom_logo() ) {
                $custom_logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
                $logo_url = $custom_logo[0];
            } else {
                $logo_url = get_bloginfo('template_url') . '/img/logo@2x.png';
            }
        ?>

        <footer id="footer">
            <div class="container">
                <ul class="footer-list">
                    <li>
                        <a href="<?php echo home_url(); ?>" title="<?= esc_attr(strip_tags(get_bloginfo('name'))); ?>" class="footer-logo">
                            <img src="<?php echo $logo_url; ?>" alt="<?= esc_attr(get_bloginfo('name')); ?>">
                        </a>
                        <p class="copyright">All rights reserved © 2018 PreventConnect</p>
                    </li>
                    <li>
                        <div class="footer-box">
                            <ul class="footer-info-list">
                                <li><a href="#" title="916-446-2520"><span class="icon icon-phone"></span><span class="info-text">916-446-2520</span></a></li>
                                <li><a href="#" title="916-446-8166"><span class="icon icon-print"></span><span class="info-text">916-446-8166</span></a></li>
                                <li><a href="#" title="1215 K St., Suite 1850 Esquire Plaza"><span class="icon icon-marker"></span><span class="info-text">1215 K St., Suite 1850  Esquire Plaza</span></a></li>
                                <li><a href="#" title="Privacy policy"><span class="icon icon-guard"></span><span class="info-text">Privacy policy</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="footer-box">
                            <ul class="footer-menu">
                                <li>
                                    <a href="#"  title="Home">Home</a>
                                    <a href="#"  title="About Us">About Us</a>
                                    <a href="#"  title="CALCASA Main Site">CALCASA Main Site</a>
                                    <a href="#"  title="Contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <p class="copyright mobile">All rights reserved © 2018 PreventConnect</p>
            </div>
        </footer>
        </footer>
    </div><!--/wrap-->

    <?php wp_footer(); ?>
</body>
</html>