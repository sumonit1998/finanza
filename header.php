<?php 
/**
 * Header file
 * 
 * @package Finanza
 */

$phone_number = get_theme_mod('custom_phone_number', '');
$email_address = get_theme_mod('custom_email_address', '');
$location = get_theme_mod('custom_location', '');
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <!-- Favicon -->
    <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();  ?>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <?php if ($location) : ?>
                    <small><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo esc_html($location); ?></small>
                <?php else : ?>
                    <small><i class="fa fa-map-marker-alt text-primary me-2"></i>1900 Tangail, Bangaldesh</small>
                <?php endif; ?>
               
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>9.00 am - 9.00 pm</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                
                <?php if ($email_address) : ?>
                    <small><i class="fa fa-envelope text-primary me-2"></i><?php echo esc_html($email_address); ?></small>
                <?php else : ?>
                    <small><i class="fa fa-envelope text-primary me-2"></i>info@example.com</small>
                <?php endif; ?>
                
                <?php if ($phone_number) : ?>
                    <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i><?php echo esc_html($phone_number); ?></small>
                <?php else : ?>
                    <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 6789</small>
                <?php endif; ?>
            </div>
        </div>

        <?php get_template_part( 'template-parts/header/nav-menu' ); ?>
    </div>
    <!-- Navbar End -->