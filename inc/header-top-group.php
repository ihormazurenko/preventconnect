<?php
 $social_links = get_field('social_links', 'option');
?>

<?php
/*
if (get_current_user_id() == 46) {
    ?>
    <!-- Begin Constant Contact Active Forms -->
    <!--                    <script> var _ctct_m = "969daaf2a8d7a815656056fe8506a375"; </script>-->
    <!--                    <script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>-->
    <!-- End Constant Contact Active Forms -->


    <!-- Begin Constant Contact Inline Form Code -->
    <div class="ctct-inline-form" data-form-id="59a9b2ae-7ee8-445a-9187-f201bb70ccc0"></div>
    <!-- End Constant Contact Inline Form Code -->


    <?php
} else {
    ?>

    <form action="" class="subscribe-form">
        <ul class="form-list">
            <li>
                <input type="text" class="input-style"
                       placeholder="<?php esc_attr_e('Join our mailing list', 'pc'); ?>">
            </li>
            <li>
                <a href="https://visitor.r20.constantcontact.com/d.jsp?llr=occzzmoab&amp;p=oi&amp;m=1114973702222&amp;sit=zm4kg5eib&amp;f=2825a9d7-1b5a-4569-bc33-4d5aa86b98e1"
                   class="btn" target="_blank" rel="nofollow"
                   title="<?php esc_attr_e('Join', 'pc'); ?>"><?php _e('Join', 'pc'); ?></a>
            </li>
        </ul>
    </form>
    <?php

}
 */
?>
<div class="subscribe-form-box">
     <form action="" class="subscribe-form" method="post">
        <ul class="form-list">
            <li>
                <input type="email" class="input-style" placeholder="Join our mailing list" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </li>
            <li>
                <a href="#constant-subscribe-box" class="btn constant-popup-form no-display" title="Join">Join</a>
                <input type="submit" class="btn" value="Join">
            </li>
        </ul>
    </form>
    <span class="ajax-loader"></span>
</div>
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