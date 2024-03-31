<?php 
    wp_nav_menu(
        array(
            'theme_location' => 'Main Navigation',
            'items_wrap' => '<ul class="Nav__ul">%3$s</ul>', //what is %3$s
            'before' => '<div class="Nav__anchor-p-container"><p>',
            'after' => '</p></div>',
        )
    ) 
?>
