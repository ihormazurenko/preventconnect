<?php
 $social_links = get_field('social_links', 'option');
?>

<form action="" class="subscribe-form">
	<ul class="form-list">
		<li>
			<input disabled type="text" class="input-style" placeholder="<?php esc_attr_e('Join our mailing list','pc'); ?>">
		</li>
		<li>
            <a href="https://visitor.r20.constantcontact.com/d.jsp?llr=occzzmoab&amp;p=oi&amp;m=1114973702222&amp;sit=zm4kg5eib&amp;f=2825a9d7-1b5a-4569-bc33-4d5aa86b98e1" class="btn" target="_blank" rel="nofollow" title="<?php esc_attr_e('Join','pc'); ?>"><?php _e('Join','pc'); ?></a>
		</li>
	</ul>
</form>
<?php
/*
 <form action="" class="subscribe-form">
	<ul class="form-list">
		<li>
			<input disabled type="text" class="input-style" placeholder="Join our mailing list">
		</li>
		<li>
            <a href="https://visitor.r20.constantcontact.com/d.jsp?llr=occzzmoab&amp;p=oi&amp;m=1114973702222&amp;sit=zm4kg5eib&amp;f=2825a9d7-1b5a-4569-bc33-4d5aa86b98e1" class="btn" title=""></a>
<!--			<input type="submit" class="btn" value="Join">-->
		</li>
	</ul>
</form>
 */
?>
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