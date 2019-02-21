        </main>

        <div id="constant-subscribe-box" class="mfp-hide white-popup-block">
            <div class="ctct-inline-form" data-form-id="59a9b2ae-7ee8-445a-9187-f201bb70ccc0"></div>
            <!-- End Constant Contact Inline Form Code -->
        </div>

        <?php
            if ( has_custom_logo() ) {
                $custom_logo = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full' );
                $logo_url = $custom_logo[0];
            } else {
                $logo_url = get_bloginfo('template_url') . '/img/logo@2x.png';
            }

            $current_year = date("Y");
            $copyright = '';

            if ($current_year > 2018) {
	            $copyright = 'All rights reserved © 2018 - '.$current_year.' PreventConnect';
            } else {
                $copyright = 'All rights reserved © 2018 PreventConnect';
            }

            $footer_contact = get_field('footer_contact', 'option');
            $footer_contact_arr = [];
        ?>

        <footer id="footer">
            <div class="container">
                <ul class="footer-list">
                    <li>
                        <a href="<?php echo home_url(); ?>" title="<?= esc_attr(strip_tags(get_bloginfo('name'))); ?>" class="footer-logo">
                            <img src="<?php echo $logo_url; ?>" alt="<?= esc_attr(get_bloginfo('name')); ?>">
                        </a>
	                    <?php
                            if ($copyright) {
	                            echo '<p class="copyright">' . $copyright . '</p>';
                            }
                        ?>
                    </li>
                    <?php
                        if ($footer_contact && is_array($footer_contact) && count($footer_contact) > 0 ) {
	                        $footer_contact_arr = [
	                                'phone' => $footer_contact['phone'],
	                                'fax' => $footer_contact['fax'],
	                                'address' => $footer_contact['address'],
	                                'privacy_policy' => $footer_contact['privacy_policy'],
                            ];

	                        if ($footer_contact_arr && is_array($footer_contact_arr) && count($footer_contact_arr) > 0) {
                                ?>
                                <li class="footer-box">
                                    <ul class="footer-info-list">
                                        <?php
                                            foreach ($footer_contact_arr as $key => $value) {
                                                $label = trim($value['label']);
                                                $link = trim($value['link']);
                                                $icon = '';

                                                if ($key == 'phone') {
                                                    $icon = 'icon-phone';
                                                } elseif ($key == 'fax') {
                                                    $icon = 'icon-print';
                                                } elseif ($key == 'address') {
                                                    $icon = 'icon-marker';
                                                } elseif ($key == 'privacy_policy') {
                                                    $icon = 'icon-guard';
                                                }

                                                if ($label && empty($link)) {
                                                    echo '<li><p class="footer-info-link"><span class="icon '.$icon.'"></span><span class="info-text">'.$label.'</span></p></li>';
                                                } elseif ($label && $link) {
	                                                $link = ($key == 'phone' || $key == 'fax') ? 'tel:'.$link : $link ;
                                                    echo '<li><a href="'.esc_url($link).'" title="'.esc_attr($label).'" class="footer-info-link"><span class="icon '.$icon.'"></span><span class="info-text">'.$label.'</span></a></li>';
                                                }
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                       }
                    ?>
                    <li>
                        <div class="footer-box">
	                        <?php wp_nav_menu(array(
		                        'theme_location'  => 'footer-menu',
		                        'menu'            => 'Footer Menu',
		                        'container'       => false,
		                        'menu_class'      => 'footer-menu',
		                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		                        'depth'           => 1
	                        )); ?>
                        </div>
                    </li>
                </ul>
	            <?php
	            if ($copyright) {
		            echo '<p class="copyright mobile">' . $copyright . '</p>';
	            }
	            ?>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>
</body>
</html>