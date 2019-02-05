<?php
 $social_links = get_field('social_links', 'option');


?>
<form action="" class="subscribe-form">
	<ul class="form-list">
		<li>
			<input type="email" class="input-style" placeholder="Join our mailing list">
		</li>
		<li>
			<input type="submit" class="btn" value="Join">
		</li>
	</ul>
</form>
<?php
    if ($social_links && is_array($social_links) && count($social_links) > 0) {
        ?>
            <div class="social-box">
                <ul class="social-list">
                    <?php
                        foreach ($social_links as $value) {
	                        $social_link = $value['link'];
	                        $social_type = $value['social'];

	                        if ( $social_type && $social_link ) {
	                            if ($social_type == 'facebook') {
		                            $social_name = 'Facebook';
		                            $social_icon = 'icon-facebook';
                                } elseif ($social_type = 'twitter') {
		                            $social_name = 'Twitter';
		                            $social_icon = 'icon-twitter';
                                }
		                        ?>
                                <li>
                                    <a href="<?php echo esc_url($social_link); ?>" target="_blank" rel="nofollow"
                                       title="<?php echo esc_attr($social_name); ?>"><span class="icon <?php echo $social_icon; ?>"></span></a>
                                </li>
		                        <?php
	                        }
                        }
                        ?>
                </ul>
            </div>
        <?php }?>
<?php get_search_form(); ?>