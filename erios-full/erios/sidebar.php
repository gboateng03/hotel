<?php
$erios_sidebar = apply_filters( 'opal_theme_sidebar', '' );
if (!$erios_sidebar){
    return;
}

$erios_sidebar_id = 'secondary';
if( is_singular('hb_room') ){
    $erios_sidebar_id = 'secondary-room';
}
?>
<aside id="<?php echo esc_attr($erios_sidebar_id); ?>" class="widget-area" role="complementary">
    <div class="inner">
        <?php dynamic_sidebar( $erios_sidebar ); ?>
    </div>
</aside><!-- #secondary -->
