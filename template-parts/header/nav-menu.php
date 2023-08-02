<?php 
/**
 * Header Menu Template
 * 
 * @package Finanza
 * 
**/
$menu_class = \FINANZA_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class-> get_menu_id('finanza-header-menu');
$header_menus = wp_get_nav_menu_items( $header_menu_id );


?>


<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">            
    <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
            echo '<img width="200" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        } else {
            echo '<h1 class="display-5 text-primary m-0">' . get_bloginfo('name') . '</h1>';
        }
    ?>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">

        <?php 
        if( ! empty( $header_menus ) && is_array( $header_menus ) ) {
        ?>
            <div class="navbar-nav ms-auto p-4 p-lg-0">
               <?php 
                    foreach( $header_menus as $menu_item ){
                        if( ! $menu_item->menu_item_parent ){ 
                        $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                        $has_children = ! empty( $child_menu_items ) && is_array( $child_menu_items );

                        if( ! $has_children ){ ?>
                            <a href="<?php echo esc_url( $menu_item->url ); ?>" class="nav-item nav-link"><?php echo esc_html( $menu_item->title ); ?></a>
                        <?php 
                        }else {
                            ?>
                            <div class="nav-item dropdown">
                                <a href="<?php echo esc_url( $menu_item->url ); ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo esc_html( $menu_item->title ); ?></a>
                                <div class="dropdown-menu border-light m-0">
                                    <?php 
                                        foreach($child_menu_items as $child_menu_item ) { 
                                        ?>
                                            <a href="<?php echo esc_url( $child_menu_item->url ); ?>" class="dropdown-item"><?php echo esc_html( $child_menu_item->title ); ?></a>
                                       <?php }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                            
                            
                       <?php }
                    }
               ?>                
            </div>
        <?php 
        }
        ?>


        <div class="d-none d-lg-flex ms-2">
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-facebook-f text-primary"></small>
            </a>
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-twitter text-primary"></small>
            </a>
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-linkedin-in text-primary"></small>
            </a>
        </div>
    </div>
</nav>
